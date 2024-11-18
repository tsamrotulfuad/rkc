<?php

namespace App\Filament\PerangkatDaerah\Resources\InovasiResource\Pages;

use Filament\Forms;
use Filament\Tables;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Storage;
use App\Models\IndikatorPerangkatDaerah;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ManageRelatedRecords;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\PerangkatDaerah\Resources\InovasiResource;

class Indikator extends ManageRelatedRecords
{

    protected static ?string $model = IndikatorPerangkatDaerah::class;

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
                Section::make()->schema([
                    Forms\Components\Select::make('regulasi')
                        ->options([
                            'SK Kepala UPT' => 'SK Kepala UPT',
                            'SK Kepala Perangkat Daerah' => 'SK Kepala Perangkat Daerah',
                            'SK Kepala Daerah' => 'SK Kepala Daerah',
                            'Peraturan Kepala Daerah / Peraturan Daerah' => 'Peraturan Kepala Daerah / Peraturan Daerah',
                        ])
                        ->label('Regulasi Inovasi Daerah')
                        ->columnSpanFull()
                        ->native(false)
                        ->required(),
                    Forms\Components\FileUpload::make('regulasi_upload')
                        ->label('Bukti Dukung')
                        ->columnSpanFull()
                        ->downloadable()
                        ->required(),
                    ]),
                    
                Section::make()->schema([
                    Forms\Components\Select::make('ketersediaan_sdm')
                        ->options([
                            '1-10 SDM' => '1-10 SDM',
                            '11-30 SDM' => '11-30 SDM',
                            'Lebih dari 30 SDM' => 'Lebih dari 30 SDM',
                        ])
                        ->label('Ketersediaan SDM')
                        ->columnSpanFull()
                        ->native(false)
                        ->required(),
                    Forms\Components\FileUpload::make('ketersediaan_sdm_upload')
                        ->label('Bukti Dukung')
                        ->columnSpanFull()
                        ->downloadable()
                        ->required(),
                    ]),
                Section::make()->schema([
                    Forms\Components\Select::make('dukungan_anggaran')
                    ->options([
                        'Tidak ada dukungan anggaran' => 'Tidak ada dukungan anggaran',
                        'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0(Tahun Berjalan)' => 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0(Tahun Berjalan)',
                        'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2' => 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2',
                        'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0,T-1 dan T-2' => 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0,T-1 dan T-2',
                    ])
                    ->label('Dukungan Anggaran')
                    ->columnSpanFull()
                    ->native(false)
                    ->required(),
                    Forms\Components\FileUpload::make('dukungan_anggaran_upload')
                    ->label('Bukti Dukung')
                    ->columnSpanFull()
                    ->downloadable()
                    ->required(),
                ]),
                Section::make()->schema([
                    Forms\Components\Select::make('kecepatan_penciptaan')
                    ->options([
                        'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih' => 'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih',
                        'Inovasi dapat diciptakan dalam waktu 5-8 bulan' => 'Inovasi dapat diciptakan dalam waktu 5-8 bulan',
                        'Inovasi dapat diciptakan dalam waktu 1-4 bulan' => 'Inovasi dapat diciptakan dalam waktu 1-4 bulan',
                    ])
                    ->label('Kecepatan Penciptaan')
                    ->columnSpanFull()
                    ->native(false)
                    ->required(),
                    Forms\Components\FileUpload::make('kecepatan_penciptaan_upload')
                    ->label('Bukti Dukung')
                    ->columnSpanFull()
                    ->downloadable()
                    ->required(),
                ]),
                Section::make('Kemanfaatan')->schema([
                    Forms\Components\Select::make('kemanfaatan_do')
                    ->options([
                        'Satuan orang' => 'Satuan orang (pegawai, peserta didik, pasien, dsb)',
                        'Satuan unit' => 'Satuan unit (opd/uptd/desa/rt/rw/kampung/KK,dsb) organisasi',
                        'Satuan biaya' => 'Satuan biaya (rupiah)',
                        'Satuan pendapatan' =>  'Satuan pendapatan (rupiah)',
                        'Satuan hasil' => 'Satuan hasil produk/satuan penjualan',
                    ])
                    ->label('Definisi Operasional')
                    ->columnSpanFull()
                    ->native(false)
                    ->required(),
                    Forms\Components\Select::make('kemanfaatan_parameter')
                    ->options([
                        'Satuan Orang' => [
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Jumlah pengguna atau penerima manfaat 1-100 orang' => 'Jumlah pengguna atau penerima manfaat 1-100 orang',
                            'Jumlah pengguna atau penerima manfaat 101-200 orang' => 'Jumlah pengguna atau penerima manfaat 101-200 orang',
                            'Jumlah pengguna atau penerima manfaat 201 orang atau lebih' => 'Jumlah pengguna atau penerima manfaat 201 orang atau lebih',
                        ],
                        'Satuan Unit' => [
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Persentase peningkatan Jumlah Unit 5,00% - 20,00%' => 'Persentase peningkatan Jumlah Unit 5,00% - 20,00%',
                            'Persentase peningkatan Jumlah Unit 20,01% - 50%' => 'Persentase peningkatan Jumlah Unit 20,01% - 50%',
                            'Persentase peningkatan Jumlah Unit > 50%' => 'Persentase peningkatan Jumlah Unit > 50%',
                        ],
                        'Satuan Biaya' => [
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Efisiensi belanja sebesar 0,01% - 10%' => 'Efisiensi belanja sebesar 0,01% - 10%',
                            'Efisiensi belanja sebesar 10,01% - 20,00%' => 'Efisiensi belanja sebesar 10,01% - 20,00%',
                            'Efisiensi belanja sebesar 20,01% - 30,00%' => 'Efisiensi belanja sebesar 20,01% - 30,00%',
                        ],
                        'Satuan Pendapatan' => [
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Penambahan pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 0,01% - 49,99%' => 'Penambahan pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 0,01% - 49,99%',
                            'Penambahan pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 50,00% -99,99%' => 'Penambahan pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 50,00% -99,99%',
                            'Penambahan pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi dari sama dengan 100%' => 'Penambahan pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi dari sama dengan 100%',
                        ],
                        'Satuan Hasil' => [
                            'Tidak dapat diukur' => 'Tidak dapat diukur',
                            'Jumah produk yang dihasilkan atau diperjualbelikan 1-100 barang' => 'Jumah produk yang dihasilkan atau diperjualbelikan 1-100 barang',
                            'Jumlah produk yang dihasilkan atau diperjualbelikan 101-200 barang' => 'Jumlah produk yang dihasilkan atau diperjualbelikan 101-200 barang',
                            'jumlah produk yang dihasilkan atau diperjualbelikan lebih dari 200 barang' => 'jumlah produk yang dihasilkan atau diperjualbelikan lebih dari 200 barang',
                        ],
                    ])
                    ->label('Parameter')
                    ->columnSpanFull()
                    ->native(false)
                    ->required(),
                    Forms\Components\FileUpload::make('kemanfaatan_upload')
                    ->label('Bukti Dukung')
                    ->columnSpanFull()
                    ->downloadable()
                    ->required(),
                ]),
                Section::make()->schema([
                    Forms\Components\Select::make('sosialisasi')
                    ->options([
                        'Sosialisasi Tatap Muka' => 'Sosialisasi Tatap Muka',
                        'Konten Media Sosial' => 'Konten Media Sosial',
                        'Media Berita' => 'Media Berita',
                    ])
                    ->columnSpanFull()
                    ->native(false)
                    ->required(),
                    Forms\Components\FileUpload::make('sosialisasi_upload')
                    ->label('Bukti Dukung')
                    ->columnSpanFull()
                    ->downloadable()
                    ->required(),
                ]),
                Section::make()->schema([
                    Forms\Components\Select::make('kemudahan_proses')
                    ->options([
                        'Hasil inovasi diperoleh dalam waktu 6 hari atau lebih' => 'Hasil inovasi diperoleh dalam waktu 6 hari atau lebih',
                        'Hasil inovasi diperoleh dalam waktu 2-5 hari' => 'Hasil inovasi diperoleh dalam waktu 2-5 hari',
                        'Hasil inovasi diperoleh dalam waktu 1 hari' => 'Hasil inovasi diperoleh dalam waktu 1 hari',
                    ])
                    ->columnSpanFull()
                    ->native(false)
                    ->required(),
                    Forms\Components\FileUpload::make('kemudahan_proses_upload')
                    ->label('Bukti Dukung')
                    ->columnSpanFull()
                    ->downloadable()
                    ->required(),
                ]),
                Section::make()->schema([
                    Forms\Components\Select::make('alat_kerja')
                    ->options([
                        'Pelaksanaan kerja secara Manual' => 'Pelaksanaan kerja secara Manual',
                        'Pelaksanaan kerja secara Elektronik' => 'Pelaksanaan kerja secara Elektronik',
                        'Pelaksanaan kerja sudah didukung sistem informasi online' => 'Pelaksanaan kerja sudah didukung sistem informasi online',
                    ])
                    ->columnSpanFull()
                    ->native(false)
                    ->required(),
                    Forms\Components\FileUpload::make('alat_kerja_upload')
                    ->label('Bukti Dukung')
                    ->columnSpanFull()
                    ->downloadable()
                    ->required(),
                ]),
                Forms\Components\FileUpload::make('kualitas')
                ->label('Kualitas (Format MP4, Max. 25MB')
                ->preserveFilenames()
                ->maxSize(25000)
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
                Tables\Columns\TextColumn::make('regulasi'),
                Tables\Columns\TextColumn::make('ketersediaan_sdm'),
                Tables\Columns\TextColumn::make('sosialisasi'),
                Tables\Columns\TextColumn::make('kemanfaatan_do')
                ->label('Kemanfaatan'),
            ])
            ->emptyStateHeading('Tidak ada data indikator')
            ->emptyStateDescription(false)
            ->filters([
                //
            ])
            // ->headerActions([
            //     Tables\Actions\CreateAction::make()
            //     ->label('Tambah Indikator')
            //     ->createAnother(false)
            //     ->modalHeading('List Indikator'),
            // ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->modalHeading('View Indikator'),
                Tables\Actions\EditAction::make()
                ->modalHeading('Edit Indikator'),
                Tables\Actions\DeleteAction::make()
                ->after(function (IndikatorPerangkatDaerah $record) {
                    // delete single
                    if ($record->regulasi_upload) {
                        Storage::disk('public')->delete($record->regulasi_upload);
                    }
                    if ($record->ketersediaan_sdm_upload) {
                        Storage::disk('public')->delete($record->ketersediaan_sdm_upload);
                    }
                    if ($record->dukungan_anggaran_upload) {
                        Storage::disk('public')->delete($record->dukungan_anggaran_upload);
                    }
                    if ($record->kecepatan_penciptaan_upload) {
                        Storage::disk('public')->delete($record->kecepatan_penciptaan_upload);
                    }
                    if ($record->kemanfaatan_upload) {
                        Storage::disk('public')->delete($record->kemanfaatan_upload);
                    }
                    if ($record->sosialisasi_upload) {
                        Storage::disk('public')->delete($record->sosialisasi_upload);
                    }
                    if ($record->kemudahan_proses_upload) {
                        Storage::disk('public')->delete($record->kemudahan_proses_upload);
                    }
                    if ($record->alat_kerja_upload) {
                        Storage::disk('public')->delete($record->alat_kerja_upload);
                    }
                    if ($record->kualitas) {
                        Storage::disk('public')->delete($record->kualitas);
                    }
                }),
            ])
            ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
