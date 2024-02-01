<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }
}
