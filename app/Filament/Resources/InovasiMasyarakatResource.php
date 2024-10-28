<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InovasiMasyarakatResource\Pages;
use App\Filament\Resources\InovasiMasyarakatResource\RelationManagers;
use App\Models\InovasiMasyarakat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InovasiMasyarakatResource extends Resource
{
    protected static ?string $model = InovasiMasyarakat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Inovasi";

    protected static ?string $navigationLabel = 'Masyarakat';

    protected static ?string $breadcrumb = "List Inovasi";

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
                Tables\Columns\TextColumn::make('nama_inisiator'),
                Tables\Columns\TextColumn::make('tahapan'),
                Tables\Columns\TextColumn::make('jenis'),
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('user.email'),
            ])
            ->emptyStateHeading('Tidak ada data inovasi')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListInovasiMasyarakats::route('/'),
            'create' => Pages\CreateInovasiMasyarakat::route('/create'),
            'edit' => Pages\EditInovasiMasyarakat::route('/{record}/edit'),
        ];
    }
}
