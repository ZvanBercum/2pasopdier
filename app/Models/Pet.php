<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model {
    protected $table = 'pets';

    public function type(){
        return $this->belongsTo(PetType::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }


}
