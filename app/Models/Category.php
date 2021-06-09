<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function things()
    {
        return $this->hasMany(Thing::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
