<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamanHeaderResource\Pages;
use App\Models\PeminjamanHeader;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;


class PeminjamanHeaderResource extends Resource
{
    protected static ?string $model = PeminjamanHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-uturn-right'; // Icon untuk transaksi aktif
    protected static ?string $modelLabel = 'Peminjaman Aktif';
    protected static ?string $pluralModelLabel = 'Peminjaman Aktif';
    protected static ?string $navigationLabel = 'Peminjaman Aktif';

    // Baris ini akan memasukkannya ke grup "Transaksi"
    protected static ?string $navigationGroup = 'Transaksi';

    // Baris ini untuk mengaturnya di urutan pertama dalam grup
    protected static ?int $navigationSort = 1;
    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Anggota Peminjam')
                    ->relationship('user') // Hapus parameter kedua dari sini
                    // Gunakan method ini untuk membuat label custom
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->nim} - {$record->name}")
                    // Buat pencarian bisa berdasarkan nim dan nama
                    ->searchable(['nim', 'name'])
                    ->required(),

                DatePicker::make('tgl_pinjam')
                    ->label('Tanggal Pinjam')
                    ->default(now())
                    ->required(),

                DatePicker::make('tgl_wajib_kembali')
                    ->label('Tanggal Wajib Kembali')
                    ->default(now()->addDays(7))
                    ->required(),

                Repeater::make('details')
                    ->label('Buku yang Dipinjam')
                    ->relationship()
                    ->schema([
                        Select::make('id_buku')
                            ->label('Judul Buku')
                            ->options(Buku::where('stok', '>', 0)->pluck('judul', 'id_buku')->toArray())
                            ->searchable()
                            ->required()
                            ->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->addActionLabel('Tambah Buku'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Peminjam')->searchable(),
                Tables\Columns\TextColumn::make('tgl_pinjam')->date(),
                Tables\Columns\TextColumn::make('tgl_wajib_kembali')->date(),
                Tables\Columns\TextColumn::make('status_peminjaman')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Dipinjam' => 'warning',
                        'Selesai' => 'success',
                    }),
                Tables\Columns\TextColumn::make('total_denda')->money('IDR'),
            ])
            ->filters([ // <--- TAMBAHKAN BAGIAN INI
                SelectFilter::make('status_peminjaman')
                    ->options([
                        'Dipinjam' => 'Dipinjam',
                        'Selesai' => 'Selesai',
                    ]),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')->label('Dari Tanggal'),
                        DatePicker::make('created_until')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Action::make('Proses Pengembalian')
                    ->action(function (PeminjamanHeader $record) {
                        DB::statement('CALL ProsesPengembalian(?)', [$record->id_pinjam]);
                    })
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn(PeminjamanHeader $record): bool => $record->status_peminjaman === 'Dipinjam'),
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
            // Tambahkan relation managers jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeminjamanHeaders::route('/'),
            'create' => Pages\CreatePeminjamanHeader::route('/create'),
            'edit' => Pages\EditPeminjamanHeader::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('user')->where('status_peminjaman', 'Dipinjam');
         return parent::getEloquentQuery()->with('user')->where('status_peminjaman', 'Dipinjam');
    }
}
