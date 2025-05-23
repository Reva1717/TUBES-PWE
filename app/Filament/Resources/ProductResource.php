<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Group;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Group::make()->schema([
                Section::make('Product Information')->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Set $set) =>
                            $operation === 'create'
                                ? $set('slug', Str::slug($state))
                                : null
                        ),

                    TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->disabled()
                        ->dehydrated()
                        ->unique(Product::class, 'slug', ignoreRecord: true),

                    MarkdownEditor::make('description')
                        ->columnSpanFull()
                        ->fileAttachmentsDirectory('products'),
                ])->columns(2),

                Section::make('Images')->schema([
                    FileUpload::make('images')
                        ->multiple()
                        ->directory('products')
                        ->maxFiles(5)
                        ->reorderable(),
                ]),
            ])->columnSpan(2),

            Group::make()->schema([
                Section::make('Price')->schema([
                    TextInput::make('price')
                        ->numeric()
                        ->required()
                        ->minValue(0)
                        ->maxValue(500000000)
                        ->prefix('Rp')
                        ->step(1000)
                        ->rules(['regex:/^\d*0{3}$/'])
                        ->formatStateUsing(fn ($state) => $state ? number_format($state, 0, ',', '.') : null)
                        ->dehydrateStateUsing(fn ($state) => str_replace('.', '', $state)),

                    TextInput::make('stok')
                        ->numeric()
                        ->required()
                        ->minValue(0)
                        ->default(0)
                        ->label('Stok')
                        ->helperText('Jumlah stok produk yang tersedia'),
                ]),

                Section::make('Associations')->schema([
                    Select::make('category_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('category', 'name'),

                    Select::make('brand_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('brand', 'name'),
                ]),

                Section::make('Status')->schema([
                    Toggle::make('is_active')
                        ->required()
                        ->default(true),

                    Toggle::make('is_featured')
                        ->required(),

                    Toggle::make('on_sale')
                        ->required(),
                ]),
            ])->columnSpan(1),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),

                TextColumn::make('category.name')->sortable(),

                TextColumn::make('brand.name')->sortable(),

                TextColumn::make('price')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable(),

                TextColumn::make('stok')
                    ->label('Stok')
                    ->sortable(),

                IconColumn::make('is_featured')->boolean(),

                IconColumn::make('on_sale')->boolean(),

                IconColumn::make('is_active')->boolean(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')->relationship('category', 'name'),
                SelectFilter::make('brand')->relationship('brand', 'name'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
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
