<?php

namespace App\Filament\Masyarakat\Resources\InovasiResource\Pages;

use Filament\Forms;
use Filament\Tables;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\IndikatorMasyarakat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ManageRelatedRecords;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Masyarakat\Resources\InovasiResource;
use Schmeits\FilamentCharacterCounter\Forms\Components\Textarea;

class Indikator extends ManageRelatedRecords
{
    protected static ?string $model = IndikatorMasyarakat::class;

    protected static string $resource = InovasiResource::class;

    protected static string $relationship = 'indikator';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function getNavigationLabel(): string
    // {
    //     return 'Indikator';
    // }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                    Textarea::make('kemudahan_proses')
                    ->columnSpanFull()
                    ->characterLimit(3000)
                    ->required(),
                    Textarea::make('keterlibatan_aktor')
                    ->columnSpanFull()
                    ->characterLimit(3000)
                    ->required(),
                    Forms\Components\Select::make('sosialisasi')
                    ->options([
                        'Media Berita' => 'Media Berita',
                        'Konten Media Sosial' => 'Konten Media Sosial',
                        'Foto Sosialisasi' => 'Foto Sosialisasi',
                    ])
                    ->native(false)
                    ->columnSpanFull(),
                    Forms\Components\FileUpload::make('sosialisasi_upload')
                    ->label('Bukti Dukung Sosialisasi')
                    ->preserveFilenames()
                    ->downloadable()
                    ->columnSpanFull()
                    ->required(),
                    Textarea::make('kemanfaatan')
                    ->columnSpanFull()
                    ->characterLimit(3000)
                    ->required(),
                    Forms\Components\FileUpload::make('kemanfaatan_upload')
                    ->label('Bukti Dukung Kemanfaatan')
                    ->preserveFilenames()
                    ->columnSpanFull()
                    ->downloadable()
                    ->required(),
                    Forms\Components\FileUpload::make('kualitas')
                    ->preserveFilenames()
                    ->maxSize(25000)
                    ->downloadable()
                    ->acceptedFileTypes(['video/mp4'])
                    ->required()
                    ->columnSpanFull()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('kemudahan_proses')
                ->words(5),
                Tables\Columns\TextColumn::make('keterlibatan_aktor')
                ->words(5),
                Tables\Columns\TextColumn::make('sosialisasi')
                ->words(5),
                Tables\Columns\TextColumn::make('kemanfaatan')
                ->words(5),
            ])
            ->emptyStateHeading('Tidak ada data indikator')
            ->emptyStateDescription(false)
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('Tambah Indikator')
                ->createAnother(false)
                ->modalHeading('List Indikator'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->after(function (IndikatorMasyarakat $record) {
                    // delete file
                    if ($record->sosialisasi_upload) {
                        Storage::disk('public')->delete($record->sosialisasi_upload);
                    }
                    if ($record->kemanfaatan_upload) {
                        Storage::disk('public')->delete($record->kemanfaatan_upload);
                    }
                    if ($record->kualitas) {
                        Storage::disk('public')->delete($record->kualitas);
                    }
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DissociateBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
