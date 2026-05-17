<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Team Members';

    protected static ?string $modelLabel = 'Team Member';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('position')
                            ->label('Position/Role')
                            ->required()
                            ->maxLength(255),

                        Select::make('type')
                            ->label('Member Type')
                            ->options([
                                'committee' => 'Working Committee Member',
                                'staff' => 'Staff Member',
                            ])
                            ->default('committee')
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Professional Details')
                    ->schema([
                        TextInput::make('qualification')
                            ->label('Qualification')
                            ->placeholder('e.g., MBA, MA (Sociology)')
                            ->maxLength(255),

                        TextInput::make('experience')
                            ->label('Experience (Years/Duration)')
                            ->placeholder('e.g., 17 years, 5 years')
                            ->maxLength(255),

                        Textarea::make('bio')
                            ->label('Biography/Description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Media & Ordering')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Profile Image')
                            ->image()
                            ->directory('team') // stored at storage/app/public/team
                            ->visibility('public')
                            ->preserveFilenames()
                            ->required(),

                        Repeater::make('specialties')
                            ->label('Specialties / Skill Bullets')
                            ->simple(
                                TextInput::make('specialty')
                                    ->placeholder('e.g., Account & Finance')
                                    ->required()
                            )
                            ->addActionLabel('Add specialty')
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Active Status')
                            ->default(true),

                        TextInput::make('order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Photo')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('position')
                    ->searchable(),

                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->colors([
                        'primary' => 'committee',
                        'success' => 'staff',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'committee' => 'Working Committee',
                        'staff' => 'Staff',
                        default => $state,
                    }),

                TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Active'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'committee' => 'Working Committee',
                        'staff' => 'Staff',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Only'),
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
            ->defaultSort('order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
