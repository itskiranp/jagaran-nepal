<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicationResource\Pages;
use App\Models\Publication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class PublicationResource extends Resource
{
    protected static ?string $model = Publication::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Publications & Resources';

    protected static ?string $modelLabel = 'Publication / Resource';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Details')
                    ->schema([
                        Select::make('type')
                            ->label('Publication Type')
                            ->options([
                                'resource' => 'Resource (Downloadable)',
                                'report' => 'Report (Research/Annual)',
                            ])
                            ->default('resource')
                            ->required(),

                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(Publication::class, 'slug', ignoreRecord: true)
                            ->maxLength(255),

                        RichEditor::make('description')
                            ->label('Description / Abstract')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(3),

                Forms\Components\Section::make('Files & Links')
                    ->schema([
                        FileUpload::make('file_path')
                            ->label('Document File (PDF / Doc)')
                            ->directory('publications') // stored at storage/app/public/publications
                            ->visibility('public')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),

                        TextInput::make('external_link')
                            ->label('External Link (Optional)')
                            ->url()
                            ->maxLength(255),

                        DatePicker::make('published_at')
                            ->label('Publication Date')
                            ->default(now())
                            ->required(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->colors([
                        'primary' => 'resource',
                        'success' => 'report',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'resource' => 'Resource',
                        'report' => 'Report',
                        default => $state,
                    }),

                TextColumn::make('published_at')
                    ->label('Publication Date')
                    ->date('M d, Y')
                    ->sortable(),

                TextColumn::make('file_path')
                    ->label('File')
                    ->formatStateUsing(fn ($state) => $state ? '📄 View File' : 'No File')
                    ->url(fn ($record) => $record->file_path ? asset('storage/' . $record->file_path) : null)
                    ->openUrlInNewTab(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'resource' => 'Resource',
                        'report' => 'Report',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPublications::route('/'),
            'create' => Pages\CreatePublication::route('/create'),
            'edit' => Pages\EditPublication::route('/{record}/edit'),
        ];
    }
}
