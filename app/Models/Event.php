<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'detail',
        'venue',
        'image',
        'price',
        'category_id',
        'status',
        'end_date',
        'start_date',
        'seat',
    ];

    public function category()
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
}
