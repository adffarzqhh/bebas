<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GudangResource\Pages;
use App\Filament\Resources\GudangResource\RelationManagers;
use App\Models\Gudang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GudangResource extends Resource
{
    protected static ?string $model = Gudang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([
                    Forms\Components\TextInput::make('kategori')
                    ->label('Kategori Barang')
                    ->placeholder('Masukkan Kategori Barang')
                    ->required(),

                    Forms\Components\TextInput::make('namabarang')
                    ->label('Nama Barang')
                    ->placeholder('Masukkan Nama Barang')
                    ->required(),

                    Forms\Components\TextInput::make('stok')
                    ->label('Stok Barang')
                    ->numeric()
                    ->required(),

                    Forms\Components\Select::make('status')
                    ->label('Status Barang')
                    ->options([
                        'dipinjam'      =>      'Dipinjam',
                        'dikembalikan'  =>      'Selesai',
                        'tersedia'      =>      'Tersedia'
                    ])
                    ->default('tersedia')
                    ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')->label('Kategori Barang'),
                Tables\Columns\TextColumn::make('namabarang')->label('Nama Barang'),
                Tables\Columns\TextColumn::make('stok')->label('Stok Barang'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGudangs::route('/'),
            'create' => Pages\CreateGudang::route('/create'),
            'edit' => Pages\EditGudang::route('/{record}/edit'),
        ];
    }
}
