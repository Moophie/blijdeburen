<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory;

    public function thing(){
        return $this->belongsTo(Thing::class);
    }

    public function service(){
        return $this->belongsTo(Thing::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function other_user(){
        if ($this->user1_id == Auth::id()) {
            $other_user = User::find($this->user2_id);
        }

        if ($this->user2_id == Auth::id()) {
            $other_user = User::find($this->user1_id);
        }

        return $other_user;
    }
}
