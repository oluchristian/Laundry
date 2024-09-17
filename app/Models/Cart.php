<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $KeyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'service_quantity',
        'service_price',
        'user_address',
        'user_email',
        'user_phone'
];
    

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
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

    // public function getTotalPrice()
    // {
    //     $totalPrice = $this::where('user_id', Auth::id())->get();
    //     // return $totalPrice->sum('service_price');
    // }


}
