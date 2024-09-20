<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blockchain extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function apps()
    {
        return $this->belongsToMany(App::class, 'app_blockchain');
    }
}
