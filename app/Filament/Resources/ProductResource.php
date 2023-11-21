<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Catalog;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $pluralModelLabel = 'Ассортимент';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form //внедрение зависимостей (Form $form)
    {
        // $catalogs = Catalog::all();
        $catalogs = Catalog::orderBy('name')->pluck('name', 'id')->toArray(); //превращает объект в массив (вытягивает из БД)
        return $form
            ->schema([
                TextInput::make('name')->required(), //обязательное поле
                Select::make('catalog_id')->options($catalogs)->required(), //сделали поле catalog_id и добавили options из модели Catalog
                RichEditor::make('body')->columnSpan('full'),
                TextInput::make('price')->required(),
                TextInput::make('discount'),
                FileUpload::make('picture')->directory('products')->required(),
                TextInput::make('status'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('price'),
                TextColumn::make('discount'),
                ImageColumn::make('picture'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
