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
                Forms\Components\TextInput::make('nama')
                ->columnSpanFull()
                ->label('Nama Inovasi')
                ->required(),
                Forms\Components\TextInput::make('nama_inisiator')
                ->columnSpanFull()
                ->label('Nama Inisiator')
                ->required(),
                Forms\Components\TextInput::make('no_hp')
                ->label('Nomor Handphone')
                ->tel()
                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                ->required(),
                Forms\Components\TextInput::make('ktp')
                ->label('KTP')
                ->maxLength(16)
                ->minLength(16)
                ->numeric()
                ->required(),
                Forms\Components\Select::make('bentuk')
                ->options([
                    'aplikasi_teknologi' => 'Aplikasi dan Teknologi',
                    'produk_jasa' => 'Produk dan Jasa',
                    'program_pergerakan' => 'Program dan Pergerakan',
                ])->native(false)->required(),
                Forms\Components\Select::make('tahapan')
                ->options([
                    'inisiatif' => 'Inisiatif',
                    'ujicoba' => 'Uji Coba',
                    'penerapan' => 'Penerapan',
                ])->native(false)->required(),
                Forms\Components\Select::make('jenis')
                ->options([
                    'digital' => 'Digital',
                    'non_digital' => 'Non Digital',
                ])->native(false)->required(),
                Forms\Components\DatePicker::make('waktu_ujicoba')->required(),
                Forms\Components\DatePicker::make('waktu_penerapan')->required(),
                Forms\Components\RichEditor::make('rancang_bangun')
                ->hint('Min. 300 Kata')
                ->minLength(300)
                ->columnSpan(2)
                ->required(),
                // ->hint(fn ($state, $component) => 'Jumlah: ' . str_word_count($state, 0)  . '')
                // // ->maxlength(3000)
                // ->live()
                Forms\Components\Textarea::make('tujuan')
                ->rows(5)
                ->columnSpan(2)
                ->required(),
                Forms\Components\Textarea::make('manfaat')
                ->rows(5)
                ->columnSpan(2)
                ->required(),
                Forms\Components\Textarea::make('hasil')
                ->rows(5)
                ->columnSpan(2)
                ->required(),
                Forms\Components\FileUpload::make('penghargaan')
                ->preserveFilenames()
                ->openable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->wrap(),
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
