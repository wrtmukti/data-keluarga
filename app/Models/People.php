<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            $model->timestamps = false;
        });
        static::creating(function ($model) {
            $model->timestamps = false;
        });
    }

    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'gender',
        'parent_id',
    ];
}
