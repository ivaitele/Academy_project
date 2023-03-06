<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable=['title','slug','summary','photo','status'];


    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

}
