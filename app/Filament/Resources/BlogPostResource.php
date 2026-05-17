<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Blog Posts';

    protected static ?string $modelLabel = 'Blog Post';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post Details')
                    ->schema([
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
                            ->unique(BlogPost::class, 'slug', ignoreRecord: true)
                            ->maxLength(255),

                        Textarea::make('excerpt')
                            ->label('Excerpt / Brief Summary')
                            ->placeholder('Leave blank to auto-generate from content')
                            ->rows(2)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label('Content / Post Body')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Media & Settings')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Cover Image')
                            ->image()
                            ->directory('blog') // stored at storage/app/public/blog
                            ->visibility('public')
                            ->preserveFilenames()
                            ->required(),

                        DatePicker::make('published_at')
                            ->label('Publish Date')
                            ->default(now())
                            ->required(),

                        Toggle::make('is_published')
                            ->label('Is Published')
                            ->default(true),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Cover')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('published_at')
                    ->label('Publish Date')
                    ->date('M d, Y')
                    ->sortable(),

                ToggleColumn::make('is_published')
                    ->label('Published'),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Only'),
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
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
