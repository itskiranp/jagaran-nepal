<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselItemResource\Pages;
use App\Filament\Resources\CarouselItemResource\RelationManagers;
use App\Models\CarouselItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class CarouselItemResource extends Resource
{
    protected static ?string $model = CarouselItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->label('Title')
                ->required(),

            FileUpload::make('image_path')
                ->label('Carousel Image')
                ->image()
                ->directory('carousel') // stored at storage/app/public/carousel
                ->visibility('public')
                ->required(),

            TextInput::make('caption')->label('Caption'),
            
            Textarea::make('description')->label('Description'),

            TextInput::make('link_url')->label('Link URL')->url(),

            TextInput::make('link_text')->label('Link Text'),

            Toggle::make('is_active')->label('Active')->default(true),

            TextInput::make('order')->label('Display Order')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                ->label('Image')
                ->disk('public')
                ->circular(), // optional

            TextColumn::make('title')->searchable(),

            TextColumn::make('order')->label('Order'),

            ToggleColumn::make('is_active')->label('Active'),
            ])
            
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarouselItems::route('/'),
            'create' => Pages\CreateCarouselItem::route('/create'),
            'edit' => Pages\EditCarouselItem::route('/{record}/edit'),
        ];
    }
}
