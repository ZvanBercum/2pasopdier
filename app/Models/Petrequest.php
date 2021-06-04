<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petrequest extends Model {
    protected $table = 'requests';

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function sitter(){
        return $this->belongsTo(User::class, 'sitter_id', 'id');
    }


}
