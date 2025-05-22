<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Order;
use App\Filament\Resources\OrderResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders'; // relasi di model User

    public function form(Form $form): Form
    {
        return $form->schema([
            // Kosong: bisa diisi jika ingin membuat/edit order dari relasi
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('id')
                    ->label('Order ID')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('grand_total')
                    ->money('IDR')
                    ->label('Total'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        'shipped', 'delivered' => 'success',
                        'cancelled' => 'danger',
                        default => 'secondary',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-check-badge',
                        'cancelled' => 'heroicon-m-x-circle',
                        default => 'heroicon-m-question-mark-circle',
                    })
                    ->sortable(),

                TextColumn::make('payment_method')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('payment_status')
                    ->badge()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Order Date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan jika ingin filter manual
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(), // Uncomment jika user bisa tambah order
            ])
            ->actions([
                Action::make('View')
                    ->url(fn (Order $record) => OrderResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye')
                    ->color('info'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
