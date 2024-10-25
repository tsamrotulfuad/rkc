<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InovasiPerangkatDaerah extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'urusan' => 'array',
    ];

    //set user_id by id auth user
    protected static function booted() 
    {
        parent::boot();

        static::creating(function($model) {
            $model->user_id = Auth::user()->id;
        });

        static::creating(function($model) {
            $model->tahun = Carbon::now()->format('Y');
        });

        /** @var Model $model */
        static::updating(function ($model) {
            if ($model->isDirty('anggaran') && ($model->getOriginal('anggaran') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('anggaran'));
            }
            if ($model->isDirty('profil_bisnis') && ($model->getOriginal('profil_bisnis') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('profil_bisnis'));
            }
            if ($model->isDirty('doc_haki') && ($model->getOriginal('doc_haki') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('doc_haki'));
            }
            if ($model->isDirty('penghargaan') && ($model->getOriginal('penghargaan') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('penghargaan'));
            }
        });
    }

    public function indikator()
    {
        return $this->hasOne(IndikatorPerangkatDaerah::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}