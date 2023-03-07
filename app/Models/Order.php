<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [

        'status',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function items(): HasMany
    {
        return $this->hasMany(OrdersEvent::class);
    }


    public function events(): HasManyThrough
    {
        return $this->hasManyThrough(
            Event::class,
            OrdersEvent::class,
            'order_id',
            'id',
            'id',
            'event_id'
        );

//      Alternatyva:
//
//        return $this->hasMany(Event::class, 'id', 'event_id')
//            ->join('order_events', 'event.id', '=', 'order_events.event_id')
//
    }
}
