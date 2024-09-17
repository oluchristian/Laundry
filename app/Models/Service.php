<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $KeyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'description',
        'image_filename',
        'price',
        'discount_price',
    ];

    protected static function boot ()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
