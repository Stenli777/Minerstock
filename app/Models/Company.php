<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function office(){
        return $this->hasMany(Office::class);
    }
    public function dpc(){
        return $this->hasMany(Dpc::class);
    }
}
