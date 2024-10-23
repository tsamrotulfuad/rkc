<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BukuPanduan;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BukuPanduanResource\Pages;
use App\Filament\Resources\BukuPanduanResource\RelationManagers;

class BukuPanduanResource extends Resource
{
    protected static ?string $model = BukuPanduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Panduan";

    protected static ?string $navigationLabel = 'Buku Panduan';

    protected static ?string $breadcrumb = "Buku Panduan";

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->columnSpanFull()
                ->label('Nama Panduan')
                ->required(),
                Forms\Components\FileUpload::make('file')
                ->preserveFilenames()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('file'),
            ])
            ->emptyStateHeading('Tidak ada data')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->after(function (BukuPanduan $record) {
                    // delete single
                    if ($record->file) {
                       Storage::disk('public')->delete($record->file);
                    }
                 }),
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
            'index' => Pages\ListBukuPanduans::route('/'),
            'create' => Pages\CreateBukuPanduan::route('/create'),
            'edit' => Pages\EditBukuPanduan::route('/{record}/edit'),
        ];
    }
}
