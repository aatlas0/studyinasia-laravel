<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Categories';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name_fr')
                ->label('Name (Français)')
                ->required()
                ->maxLength(100)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) =>
                    $operation === 'create' ? $set('slug', Str::slug($state)) : null
                ),

            Forms\Components\TextInput::make('name_ar')
                ->label('Name (العربية)')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('name_en')
                ->label('Name (English)')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(100)
                ->unique(Category::class, 'slug', ignoreRecord: true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_fr')->label('Français')->searchable(),
                Tables\Columns\TextColumn::make('name_ar')->label('عربي'),
                Tables\Columns\TextColumn::make('name_en')->label('English'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('posts_count')
                    ->label('Posts')
                    ->counts('posts'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit'   => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
