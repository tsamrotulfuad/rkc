<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndikatorPerangkatDaerah extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted() 
    {
        parent::boot();

        static::creating(function($model) {
            $model->user_id = Auth::user()->id;
        });

        static::updating(function ($model) {
            if ($model->isDirty('regulasi_upload') && ($model->getOriginal('regulasi_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('regulasi_upload'));
            }
            if ($model->isDirty('ketersediaan_sdm_upload') && ($model->getOriginal('ketersediaan_sdm_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('ketersediaan_sdm_upload'));
            }
            if ($model->isDirty('dukungan_anggaran_upload') && ($model->getOriginal('dukungan_anggaran_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('dukungan_anggaran_upload'));
            }
            if ($model->isDirty('kecepatan_penciptaan_upload') && ($model->getOriginal('kecepatan_penciptaan_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('kecepatan_penciptaan_upload'));
            }
            if ($model->isDirty('kemanfaatan_upload') && ($model->getOriginal('kemanfaatan_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('kemanfaatan_upload'));
            }
            if ($model->isDirty('sosialisasi_upload') && ($model->getOriginal('sosialisasi_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('sosialisasi_upload'));
            }
            if ($model->isDirty('kemudahan_proses_upload') && ($model->getOriginal('kemudahan_proses_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('kemudahan_proses_upload'));
            }
            if ($model->isDirty('alat_kerja_upload') && ($model->getOriginal('alat_kerja_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('alat_kerja_upload'));
            }
            if ($model->isDirty('kualitas') && ($model->getOriginal('kualitas') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('kualitas'));
            }
        });
    }

    public function inovasi() : BelongsTo {
        return $this->belongsTo(InovasiPerangkatDaerah::class);
    }
}
