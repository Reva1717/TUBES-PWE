<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Number;
use Filament\Forms\Components\{
    Group,
    Hidden,
    Placeholder,
    Repeater,
    Section,
    Select,
    Textarea,
    TextInput,
    ToggleButtons
};
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Actions\{
    ViewAction,
    EditAction,
    DeleteAction
};

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Group::make()->schema([
                Section::make('Order Information')->schema([
                    Select::make('user_id')
                        ->label('Customer')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Select::make('payment_method')
                        ->options([
                            'stripe' => 'Stripe',
                            'cod' => 'Cash on Delivery',
                            'credit_card' => 'Credit Card',
                            'virtual_account' => 'Virtual Account',
                        ])
                        ->required(),

                    Select::make('payment_status')
                        ->options([
                            'pending' => 'Pending',
                            'paid' => 'Paid',
                            'failed' => 'Failed',
                        ])
                        ->default('pending')
                        ->required(),

                    ToggleButtons::make('status')
                        ->inline()
                        ->default('new')
                        ->required()
                        ->options([
                            'new' => 'New',
                            'processing' => 'Processing',
                            'shipped' => 'Shipped',
                            'delivered' => 'Delivered',
                            'cancelled' => 'Cancelled',
                        ])
                        ->colors([
                            'new' => 'info',
                            'processing' => 'warning',
                            'shipped' => 'success',
                            'delivered' => 'success',
                            'cancelled' => 'danger',
                        ])
                        ->icons([
                            'new' => 'heroicon-o-sparkles',
                            'processing' => 'heroicon-o-arrow-path',
                            'shipped' => 'heroicon-o-truck',
                            'delivered' => 'heroicon-o-check-badge',
                            'cancelled' => 'heroicon-o-x-circle',
                        ]),

                    Select::make('currency')
                        ->options([
                            'rp' => 'RP',
                            'usd' => 'USD',
                            'eur' => 'EUR',
                            'gbp' => 'GBP',
                        ])
                        ->default('rp')
                        ->required(),

                    Select::make('shipping_method')
                        ->options([
                            'fedex' => 'FedEx',
                            'ups' => 'UPS',
                            'dhl' => 'DHL',
                            'usps' => 'USPS',
                        ]),

                    Textarea::make('notes')->columnSpanFull(),
                ])->columns(2),

                Section::make('Order Items')->schema([
                    Repeater::make('items')
                        ->relationship()
                        ->schema([
                            Select::make('product_id')
                                ->label('Product')
                                ->relationship('product', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->columnSpan(4)
                                ->reactive()
                                ->afterStateUpdated(function ($state, Set $set) {
                                    $product = Product::find($state);
                                    $price = $product?->price ?? 0;
                                    $set('unit_amount', $price);
                                    $set('total_amount', $price);
                                })
                                ->rules([
                                    function (Get $get) {
                                        return function ($attribute, $value, $fail) use ($get) {
                                            $items = $get('../../items') ?? [];
                                            $count = 0;

                                            foreach ($items as $item) {
                                                if (($item['product_id'] ?? null) === $value) {
                                                    $count++;
                                                }
                                            }

                                            if ($count > 1) {
                                                $fail('This product is already selected in another item.');
                                            }
                                        };
                                    }
                                ]),

                            TextInput::make('quantity')
                                ->numeric()
                                ->required()
                                ->default(1)
                                ->minValue(1)
                                ->columnSpan(2)
                                ->reactive()
                                ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                    $set('total_amount', $state * $get('unit_amount'));
                                }),

                            TextInput::make('unit_amount')
                                ->numeric()
                                ->required()
                                ->disabled()
                                ->dehydrated()
                                ->columnSpan(3),

                            TextInput::make('total_amount')
                                ->numeric()
                                ->required()
                                ->dehydrated()
                                ->columnSpan(3),
                        ])
                        ->columns(12),

                    Placeholder::make('grand_total_placeholder')
                        ->label('Grand Total')
                        ->content(function (Get $get, Set $set) {
                            $total = 0;
                            $items = $get('items') ?? [];
                            foreach ($items as $item) {
                                $total += $item['total_amount'] ?? 0;
                            }
                            $set('grand_total', $total);
                            return Number::currency($total, 'IDR');
                        }),

                    Hidden::make('grand_total')->default(0),
                ])->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),

                    TextColumn::make('grand_total')
                    ->label('Grand Total')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => Number::currency($state, 'IDR'))
                    ->extraAttributes(['class' => 'max-w-[120px] truncate whitespace-nowrap overflow-x-auto']),
                

                TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('currency')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('shipping_method')
                    ->sortable()
                    ->searchable(),

                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ])
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AddressRelationManager::class
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'success' : 'danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
