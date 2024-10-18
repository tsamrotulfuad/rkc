<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inovasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'urusan' => 'array',
    ];

    //set user_id by id auth user
    protected static function booted() 
    {
        static::creating(function($model) {
            $model->user_id = Auth::user()->id;
        });

        static::creating(function($model) {
            $model->tahun = Carbon::now()->format('Y');
        });
    }

}
