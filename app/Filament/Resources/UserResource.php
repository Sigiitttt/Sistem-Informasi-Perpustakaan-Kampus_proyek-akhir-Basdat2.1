<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash; // <-- Import Hash

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users'; // <-- Ganti Icon
    protected static ?string $modelLabel = 'Anggota';
    protected static ?string $navigationLabel = 'Anggota';
    protected static ?string $pluralModelLabel = 'Anggota';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('Nama Lengkap'),
                Forms\Components\TextInput::make('nim')->label('NIM/NIP')->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('prodi')->label('Program Studi'),
                Forms\Components\TextInput::make('no_telp')->label('No. Telepon'),
                // Forms.Components\Textarea::make('alamat')->columnSpanFull(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn (string $context): bool => $context === 'create') // Hanya wajib saat membuat baru
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)) // Enkripsi password
                    ->dehydrated(fn ($state) => filled($state)), // Hanya simpan jika diisi
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('nim')->label('NIM/NIP')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
