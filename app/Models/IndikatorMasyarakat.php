<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndikatorMasyarakat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted() 
    {
        static::creating(function($model) {
            $model->user_id = Auth::user()->id;
        });
    }

    public function inovasi() : BelongsTo {
        return $this->belongsTo(InovasiMasyarakat::class);
    }
}
