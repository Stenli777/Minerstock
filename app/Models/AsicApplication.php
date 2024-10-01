<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsicApplication extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'asic_applications';

    protected $fillable = ['name', 'phone', 'telegram', 'processed', 'asic_name'];
}
