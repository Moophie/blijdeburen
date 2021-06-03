<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
