<?php

namespace App\Filament\Juri\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use App\Models\InovasiMasyarakat;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Juri\Resources\InovasiMasyarakatResource\Pages;
use App\Filament\Juri\Resources\InovasiMasyarakatResource\RelationManagers;

class InovasiMasyarakatResource extends Resource
{
    protected static ?string $model = InovasiMasyarakat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Proposal";

    protected static ?string $navigationLabel = 'Inovasi Masyarakat';

    protected static ?string $breadcrumb = "Inovasi";

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
                ->openable()
                ->deletable(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->wrap(),
                Tables\Columns\TextColumn::make('tahapan'),
                Tables\Columns\TextColumn::make('nama_inisiator'),
                Tables\Columns\TextColumn::make('waktu_ujicoba'),
                Tables\Columns\TextColumn::make('waktu_penerapan'),
                Tables\Columns\TextColumn::make('tahun')
                ->sortable(),
            ])
            ->emptyStateHeading('Tidak ada data inovasi')
            ->recordUrl(null)
            ->recordAction(null)
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Indikator')
                    ->url(fn($record): string => InovasiMasyarakatResource::getUrl('indikator', ['record' => $record]))
                    ->icon('heroicon-s-folder')
                    ->button()
                    ->outlined(),
                Tables\Actions\Action::make('Pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-document-text')
                    ->color('success')
                    ->action(function (InovasiMasyarakat $record) {
                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('pdf', ['record' => $record])
                            )->stream();
                        }, $record->nama . '.pdf');
                    }),
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                    ->after(function (InovasiMasyarakat $record) {
                        // delete single
                        if ($record->penghargaan) {
                            Storage::disk('public')->delete($record->penghargaan);
                        }
                        if ($record->skt) {
                            Storage::disk('public')->delete($record->skt);
                        }
                    }),
                ])
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
            'indikator' => Pages\Indikator::route('/{record}/indikator'),
        ];
    }
}
