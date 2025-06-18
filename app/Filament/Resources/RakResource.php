<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RakResource\Pages;
use App\Filament\Resources\RakResource\RelationManagers;
use App\Models\Rak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RakResource extends Resource
{
    protected static ?string $model = Rak::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // PASTIKAN NAMA INPUT DI SINI ADALAH 'nama_rak'
            Forms\Components\TextInput::make('nama_rak')
                ->required()
                ->label('Nama Rak'),
            Forms\Components\TextInput::make('lokasi')
                ->label('Lokasi/Lantai'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
           ->columns([
            // TAMBAHKAN KOLOM-KOLOM INI
            Tables\Columns\TextColumn::make('nama_rak')
                ->label('Nama Rak')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('lokasi')
                ->label('Lokasi/Lantai')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal Dibuat')
                ->dateTime('d M Y')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRaks::route('/'),
            'create' => Pages\CreateRak::route('/create'),
            'edit' => Pages\EditRak::route('/{record}/edit'),
        ];
    }
}
