<?php

namespace App\Filament\Masyarakat\Resources;

use App\Filament\Masyarakat\Resources\BukuPanduanResource\Pages;
use App\Filament\Masyarakat\Resources\BukuPanduanResource\RelationManagers;
use App\Models\BukuPanduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('file'),
            ])
            ->recordUrl(null)
            ->recordAction(null)
            ->emptyStateHeading('Tidak ada data')
            ->filters([
                //
            ])
            ->actions([
               // Tables\Actions\EditAction::make(),
               Tables\Actions\Action::make('file') 
               ->label('Unduh')
               ->action(fn (BukuPanduan $record) => response()->download(public_path('storage/'. $record->file))),
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
