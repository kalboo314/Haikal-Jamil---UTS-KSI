<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DokumenResource\Pages;
use App\Filament\Admin\Resources\DokumenResource\RelationManagers;
use App\Models\Dokumen;
use Filament\Forms\Set;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
           Forms\Components\Select::make('nama')
                ->label('Jenis Dokumen')
                ->options([
                    'Motivation Letter' => 'Motivation Letter',
                    'CV' => 'CV',
                    'KTP' => 'KTP',
                ])
                ->required()
                ->searchable(),
            Forms\Components\Select::make('mahasiswa_id')
                ->label('Nama Mahasiswa')
                ->relationship('mahasiswa', 'nama')
                ->searchable()
                ->required()
                ->reactive()
                ->afterStateUpdated(function (Set $set, $state) {
                    $pendaftar = \App\Models\Pendaftar::where('mahasiswa_id', $state)->first();
                    if ($pendaftar) {
                        $set('pendaftar_id', $pendaftar->id);
                    } else {
                        $set('pendaftar_id', null);
                    }
            }),

            Forms\Components\Hidden::make('pendaftar_id')
                ->required(),

            Forms\Components\FileUpload::make('file_path')
                ->label('Dokumen')
                ->disk('public')
                ->directory('dokumen')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Jenis Dokumen')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('pendaftar.id')
                    ->label('Pendaftar ID'),

                Tables\Columns\TextColumn::make('mahasiswa.nama')
                    ->label('Mahasiswa')
                    ->searchable(),

                Tables\Columns\TextColumn::make('file_path')
                    ->label('Path'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Uploaded')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDokumens::route('/'),
            'create' => Pages\CreateDokumen::route('/create'),
            'edit' => Pages\EditDokumen::route('/{record}/edit'),
        ];
    }
}
