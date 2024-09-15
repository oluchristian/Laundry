<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_quantity',
        'service_price',
        'user_address',
        'user_email',
        'user_phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->id = (string) Str::uuid();
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    //Accessor to get actual price of service based on quantity
    public function getActualPriceAttribute()
    {
        return $this->service_quantity * $this->service->price;
    }
}
