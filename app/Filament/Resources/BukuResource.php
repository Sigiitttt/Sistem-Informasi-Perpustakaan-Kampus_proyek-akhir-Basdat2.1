<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class BukuResource extends Resource
{
    protected static ?string $modelLabel = 'Buku';
    protected static ?string $navigationLabel = 'Buku';
    protected static ?string $pluralModelLabel = 'Buku';
    protected static ?string $model = Buku::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')->required(),
                Forms\Components\TextInput::make('penulis')->required(),
                Forms\Components\TextInput::make('penerbit'),
                // TAMBAHKAN DUA SELECT INI
                Select::make('kategori_id')
                    ->relationship('kategori', 'nama')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nama')->required(),
                    ])
                    ->label('Kategori'),
                Select::make('rak_id')
                    ->relationship('rak', 'nama_rak')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        // PASTIKAN NAMA INPUT DI SINI SUDAH BENAR
                        Forms\Components\TextInput::make('nama_rak') // <-- Harus 'nama_rak'
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('lokasi'),
                    ])
                    ->label('Lokasi Rak'),
                //----------------------------------
                Forms\Components\TextInput::make('tahun_terbit')->numeric(),
                Forms\Components\TextInput::make('stok')->numeric()->required(),
                Forms\Components\Textarea::make('deskripsi')->columnSpanFull(),
                Forms\Components\FileUpload::make('gambar_cover')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('penulis')->searchable(),
                Tables\Columns\TextColumn::make('stok'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
