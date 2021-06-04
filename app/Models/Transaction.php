<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function thing(){
        return $this->belongsTo(Thing::class);
    }

    public function service(){
        return $this->belongsTo(Thing::class);
    }
}
