<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndikatorMasyarakat extends Model
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
            if ($model->isDirty('sosialisasi_upload') && ($model->getOriginal('sosialisasi_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('sosialisasi_upload'));
            }
            if ($model->isDirty('kemanfaatan_upload') && ($model->getOriginal('kemanfaatan_upload') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('kemanfaatan_upload'));
            }
            if ($model->isDirty('kualitas') && ($model->getOriginal('kualitas') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('kualitas'));
            }
        });
    }

    public function inovasi() : BelongsTo {
        return $this->belongsTo(InovasiMasyarakat::class);
    }
}
