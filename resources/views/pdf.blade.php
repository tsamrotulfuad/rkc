<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $record->nama }}</title>
    <style>
        .title-laporan {
            text-align: center;
            padding-bottom: 20px;
        }
        .nama-inovasi {
            font-weight: bold;
            padding-bottom: 5px;
        }
        .inovasi {
            margin-bottom: 15px;
        }
        .img-logo {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="img-logo">
        <img src="{{ public_path('img/kotapasuruan-logo.png') }}" alt="Logo" height="95px">
    </div>
    <div class="title-laporan">
        <h2>PROPOSAL INOVASI DAERAH</h2>
    </div>
    <div class="nama-inovasi">
        Nama Inovasi
    </div>
    <div class="inovasi">
        {{ $record->nama }}
    </div>
    <div class="nama-inovasi">
        Nama Inisiator
    </div>
    <div class="inovasi">
        {{ $record->nama_inisiator }}
    </div>
    <div class="nama-inovasi">
        Bentuk
    </div>
    <div class="inovasi">
        {{ $record->bentuk }}
    </div>
    <div class="nama-inovasi">
        Tahapan
    </div>
    <div class="inovasi">
        {{ $record->tahapan }}
    </div>
    <div class="nama-inovasi">
        Jenis
    </div>
    <div class="inovasi">
        {{ $record->jenis }}
    </div>
    <div class="nama-inovasi">
        Waktu Ujicoba
    </div>
    <div class="inovasi">
        {{ $record->waktu_ujicoba }}
    </div>
    <div class="nama-inovasi">
        Waktu Penerapan
    </div>
    <div class="inovasi">
        {{ $record->waktu_penerapan }}
    </div>
    <div class="nama-inovasi">
        Rancang Bangun
    </div>
    <div class="inovasi">
        {!! $record->rancang_bangun !!}
    </div>
    <div class="nama-inovasi">
        Tujuan
    </div>
    <div class="inovasi">
        {{ $record->tujuan }}
    </div>
    <div class="nama-inovasi">
        Manfaat
    </div>
    <div class="inovasi">
        {{ $record->manfaat }}
    </div>
    <div class="nama-inovasi">
        Hasil
    </div>
    <div class="inovasi">
        {{ $record->hasil }}
    </div>
</body>
</html>