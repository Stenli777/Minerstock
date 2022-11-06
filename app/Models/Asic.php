<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asic extends Model
{
    use HasFactory;

    public function producer(){
        return $this->belongsTo(Producer::class);
    }
    public function algorythm(){
        return $this->belongsTo(Algorythm::class);
    }
}
