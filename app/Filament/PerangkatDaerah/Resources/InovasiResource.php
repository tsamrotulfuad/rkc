<?php

namespace App\Filament\PerangkatDaerah\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\InovasiPerangkatDaerah;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\PerangkatDaerah\Resources\InovasiResource\Pages;
use App\Filament\PerangkatDaerah\Resources\InovasiResource\RelationManagers;

class InovasiResource extends Resource
{
    protected static ?string $model = InovasiPerangkatDaerah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Proposal";

    protected static ?string $navigationLabel = 'Inovasi';

    protected static ?string $breadcrumb = "Inovasi";
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->columnSpanFull()
                ->label('Nama Inovasi')
                ->required(),
                Forms\Components\Select::make('tahapan')
                ->options([
                    'inisiatif' => 'Inisiatif',
                    'ujicoba' => 'Uji Coba',
                    'penerapan' => 'Penerapan',
                ])->native(false)->required(),
                Forms\Components\Select::make('inisiator')
                ->options([
                    'kepala_daerah' => 'Kepala Daerah',
                    'anggota_dprd' => 'Anggota DPRD',
                    'opd' => 'OPD',
                    'asn' => 'ASN',
                    'masyarakat' => 'Masyarakat',
                ])->native(false)->required(),
                Forms\Components\TextInput::make('nama_inisiator')
                ->columnSpanFull()
                ->required(),
                Forms\Components\Select::make('jenis')
                ->options([
                    'digital' => 'Digital',
                    'non_digital' => 'Non Digital',
                ])->native(false)->required(),
                Forms\Components\Select::make('bentuk')
                ->options([
                    'invosasi_daerah_lainnya' => 'Inovasi Daerah lainnya sesuai dengan Urusan Pemerintahan yang mejadi kewenangan Daerah',
                    'inovasi_pelayanan_publik' => 'Inovasi pelayanan publik',
                    'inovasi_tata_kelola' => 'Inovasi tata kelola pemerintahan daerah',
                ])->native(false)->required(),
                Forms\Components\Select::make('tematik')
                ->options([
                    'digitalisasi' => 'Digitalisasi Layanan Pemerintah',
                    'penanggulangan_kemiskinan' => 'Penanggulangan Kemiskinan',
                    'investasi' => 'Kemudahan Investasi',
                    'prioritas_aktual' => 'Prioritas Aktual Presiden',
                    'non_tamatik' => 'Non Tematik',
                ])->native(false)->required(),
                Forms\Components\Select::make('tematik_detail')
                ->options([
                    'digitalisasi_administrasi' => 'Digitalisasi Administrasi',
                    'interoperabilitas_smartcity' => 'Interoperabilitas Sistem Informasi menuju Smart City',
                    'stunting' => 'Stunting',
                    'inflasi' => 'Inflasi',
                    'pandemi' => 'Penanganan Dampak dan Antisipasi Pandemi Covid-19',
                    'pad' => 'Pendapatan Asli Daerah (PAD)',
                    'green_economy' => 'Green Economy',
                    'tkdn' => 'Tingkat Kandungan Dalam Negeri (TKDN)',
                    'city_branding' => 'Tata Kelola (City Branding)',
                    'stabilitas' => 'Stabilitas Keamanan dan Kehidupan Sosial',
                ])->native(false),
                Forms\Components\Select::make('urusan')
                ->multiple()
                // ->searchable()
                ->options([
                    'pendidikan' => 'Pendidikan',
                    'kesehatan' => 'Kesehatan',
                    'pupr' => 'Pekerjaan Umum dan Penataan Ruang',
                    'dprkp' => 'Perumahan Rakyat dan Kawasan Permukiman',
                    'pelindungan_masyarakt' => 'Ketentraman, Ketertiban Umum, dan Pelindungan Masyarakat',
                    'sosial' => 'Sosial',
                    'naker' => 'Tenaga Kerja',
                    'pppakp' => 'Pemberdayaan Perempuan dan Perlindungan Anak',
                    'pangan' => 'Pangan',
                    'pertanahan' => 'Pertanahan',
                    'lh' => 'Lingkuangan Hidup',
                    'capil' => 'Administrasi Kependudukan dan Pencataan Sipil',
                    'masdesa' => 'Pemberdayaan Masyarakat dan Desa',
                    'pengendalia_penduduk' => 'Pengedalian Penduduk dan Keluarga Berencana',
                    'perhubungan' => 'Perhubungan',
                    'kominfo' => 'Komunikasi dan Informatika',
                    'koperasi' => 'Koperasi, Usaha Kecil, dan Menengah',
                    'dpm' => 'Penanaman Modal',
                    'kepora' => 'Kepemudaan dan Olahraga',
                    'statistik' => 'Statistik',
                    'persandian' => 'Persandian',
                    'kebudayaan' => 'Kebudayaan',
                    'perpustakaan' => 'Perpustakaan',
                    'arsip' => 'Kearsipan',
                    'kelautan' => 'Kelautan dan Perikanan',
                    'pariwisata' => 'Pariwisata',
                    'pertanian' => 'Pertanian',
                    'kehutanan' => 'Kehutanan',
                    'energi' => 'Energi dan Sumber Daya Mineral',
                    'perdagangan' => 'Perdagangan',
                    'perindustrian' => 'Perindustrian',
                    'transmigrasi' => 'Transmigrasi',
                    'perencanaan' => 'Perencanaan',
                    'keuangan' => 'Keuangan',
                    'kepegawaian' => 'Kepegawaian',
                    'pendikpel' => 'Pendidikan dan Pelatihan',
                    'litbang' => 'Penelitian dan Pengembangan',
                    'fungsi_lain' => 'Fungsi lain sesuai dengan ketentuan perundang-undangan',
                ])->native(false),
                Forms\Components\DatePicker::make('waktu_ujicoba')->required(),
                Forms\Components\DatePicker::make('waktu_penerapan')->required(),
                Forms\Components\DatePicker::make('waktu_perkembangan'),
                Forms\Components\RichEditor::make('rancang_bangun')
                ->hint('Min. 300 Kata')
                ->minLength(300)
                ->columnSpan(2)
                ->required(),
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
                Forms\Components\FileUpload::make('anggaran')
                ->label('Anggaran (Bila Ada)')
                ->preserveFilenames()
                ->openable(),
                Forms\Components\FileUpload::make('profil_bisnis')
                ->label('Profil Bisnis (Bila Ada)')
                ->preserveFilenames()
                ->openable(),
                Forms\Components\FileUpload::make('doc_haki')
                ->label('Dokumen Haki (Bila Ada)')
                ->preserveFilenames()
                ->openable(),
                Forms\Components\FileUpload::make('penghargaan')
                ->label('Penghargaan (Bila Ada)')
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
                Tables\Columns\TextColumn::make('tahapan'),
                Tables\Columns\TextColumn::make('nama_inisiator')
                ->label('Nama Inisiator'),
                Tables\Columns\TextColumn::make('waktu_penerapan')
                ->label('Waktu Penerapan'),
                Tables\Columns\TextColumn::make('tahun')
                ->sortable(),
            ])
            ->emptyStateHeading('Tidak ada data inovasi')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Indikator')
                    ->url(fn($record): string => InovasiResource::getUrl('indikator', ['record' => $record]))
                    ->icon('heroicon-s-folder')
                    ->button()
                    ->outlined(),
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                    ->after(function (InovasiPerangkatDaerah $record) {
                        // delete file
                        if ($record->anggaran) {
                            Storage::disk('public')->delete($record->anggaran);
                        }
                        if ($record->profil_bisnis) {
                            Storage::disk('public')->delete($record->profil_bisnis);
                        }
                        if ($record->doc_haki) {
                            Storage::disk('public')->delete($record->doc_haki);
                        }
                        if ($record->penghargaan) {
                            Storage::disk('public')->delete($record->penghargaan);
                        }
                    }),
                ])
            ])
            // ->recordUr
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
            'index' => Pages\ListInovasis::route('/'),
            // 'create' => Pages\CreateInovasi::route('/create'),
            'edit' => Pages\EditInovasi::route('/{record}/edit'),
            'indikator' => Pages\Indikator::route('/{record}/indikator'),
        ];
    }
}
