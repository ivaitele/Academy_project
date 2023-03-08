<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'detail',
        'venue',
        'image',
        'price',
        'category_id',
        'status',
        'start_date',
        'end_date',
        'location',
        'duration',
        'organizer',
        'additional_info',
        'tickets_available',
        'tickets_left',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(File::class, 'model_id', 'id')
            ->where('model_type', Event::class)
            ->whereIn('extension', File::TYPES_IMAGE);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'model_id', 'id')
            ->where('model_type', Event::class);
    }

    public function isAvailable() {
        return !!$this->tickets_left;
    }

    public function tickets_sold() {
        return $this->tickets_available - $this->tickets_left;
    }

    public function tickets_sold_percents() {
        return ($this->tickets_available - $this->tickets_left) / $this->tickets_available * 100;
    }
}
