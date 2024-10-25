<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InovasiMasyarakat extends Model
{
    use HasFactory;

    protected $guarded = [];

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
            if ($model->isDirty('penghargaan') && ($model->getOriginal('penghargaan') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('penghargaan'));
            }
        });
    }

    public function indikator()
    {
        return $this->hasOne(IndikatorMasyarakat::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
