<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Blog Posts';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Content')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) =>
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        ),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(Post::class, 'slug', ignoreRecord: true),

                    Forms\Components\RichEditor::make('content')
                        ->required()
                        ->columnSpanFull()
                        ->fileAttachmentsDirectory('blog/attachments'),

                    Forms\Components\Textarea::make('excerpt')
                        ->rows(3)
                        ->maxLength(500)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Settings')
                ->schema([
                    Forms\Components\Select::make('category_id')
                        ->label('Category')
                        ->options(fn () => Category::all()->mapWithKeys(fn ($c) => [$c->id => $c->name_fr]))
                        ->searchable()
                        ->nullable(),

                    Forms\Components\Select::make('language')
                        ->options([
                            'fr' => 'Français',
                            'ar' => 'العربية',
                            'en' => 'English',
                        ])
                        ->default('fr')
                        ->required(),

                    Forms\Components\Select::make('status')
                        ->options([
                            'draft'     => 'Draft',
                            'published' => 'Published',
                        ])
                        ->default('draft')
                        ->required(),

                    Forms\Components\DateTimePicker::make('published_at')
                        ->label('Publish Date')
                        ->nullable(),

                    Forms\Components\FileUpload::make('featured_image')
                        ->label('Featured Image')
                        ->image()
                        ->directory('blog/images')
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('1200')
                        ->imageResizeTargetHeight('675')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('SEO')
                ->schema([
                    Forms\Components\TextInput::make('meta_title')
                        ->maxLength(60)
                        ->helperText('Recommended: 50-60 characters'),

                    Forms\Components\TextInput::make('meta_description')
                        ->maxLength(160)
                        ->helperText('Recommended: 150-160 characters'),
                ])
                ->columns(2)
                ->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('Image')
                    ->square()
                    ->disk('public'),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('category.name_fr')
                    ->label('Category')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('language')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'fr'    => 'primary',
                        'en'    => 'success',
                        'ar'    => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'published' => 'success',
                        default     => 'gray',
                    }),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published']),

                Tables\Filters\SelectFilter::make('language')
                    ->options(['fr' => 'Français', 'ar' => 'العربية', 'en' => 'English']),
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
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
