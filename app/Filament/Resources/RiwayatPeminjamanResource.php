<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiwayatPeminjamanResource\Pages;
use App\Models\PeminjamanHeader;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

// --- USE STATEMENTS ---
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\BadgeEntry;
use Filament\Infolists\Components\RepeatableEntry;
// ------------------------------------

class RiwayatPeminjamanResource extends Resource
{
    protected static ?string $model = PeminjamanHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $modelLabel = 'Riwayat Peminjaman';
    protected static ?string $pluralModelLabel = 'Riwayat Peminjaman';
    protected static ?string $navigationLabel = 'Riwayat Peminjaman';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['user', 'pengembalian', 'details.buku.kategori'])
            ->where('status_peminjaman', 'Selesai');
    }
    
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Peminjam')->searchable(),
                Tables\Columns\TextColumn::make('tgl_pinjam')->date('d M Y')->sortable(),
                Tables\Columns\TextColumn::make('pengembalian.tgl_pengembalian')
                    ->label('Tanggal Kembali')
                    ->date('d M Y')
                    ->placeholder('-')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_peminjaman')->badge()->color('success'),
                Tables\Columns\TextColumn::make('total_denda')->money('IDR'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
    }
    
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Peminjam')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('user.name')->label('Nama Peminjam'),
                        TextEntry::make('user.nim')->label('NIM Peminjam'),
                    ]),

                Section::make('Detail Transaksi')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('tgl_pinjam')->date('d F Y')->label('Tanggal Pinjam'),
                        TextEntry::make('tgl_wajib_kembali')->date('d F Y')->label('Jatuh Tempo'),
                        TextEntry::make('pengembalian.tgl_pengembalian')
                            ->label('Dikembalikan Pada')
                            ->placeholder('-')
                            ->date('d F Y'),
                        BadgeEntry::make('status_peminjaman')
                            ->color(fn (string $state): string => match ($state) {
                                'Selesai' => 'success',
                                default => 'gray',
                            })->label('Status'),
                        TextEntry::make('total_denda')->money('IDR')->label('Total Denda'),
                    ]),

                Section::make('Buku yang Dipinjam')
                    ->schema([
                        RepeatableEntry::make('details')
                            ->label('')
                            ->schema([
                                // FIX PALING AMAN: Menggunakan state() untuk mendefinisikan data secara manual
                                TextEntry::make('judul')
                                    ->label('Judul Buku')
                                    ->weight('bold')
                                    ->state(fn (Model $record): string => $record->buku?->judul ?? 'Data buku tidak ditemukan'),
                                    
                                TextEntry::make('penulis')
                                    ->label('Penulis')
                                    ->state(fn (Model $record): string => $record->buku?->penulis ?? '-'),

                                TextEntry::make('kategori')
                                    ->label('Kategori')
                                    ->state(fn (Model $record): string => $record->buku?->kategori?->nama ?? '-'),
                            ])
                            ->columns(3),
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
            'index' => Pages\ListRiwayatPeminjamans::route('/'),
        ];
    }    
}
