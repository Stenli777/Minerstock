<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'alias', 'location_id', 'price_per_month', 'max_devices', 'energy_capacity', 'energy_type_id', 'conditions', 'pictures'];

    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->name);
        return parent::save($options);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function energyType()
    {
        return $this->belongsTo(EnergyType::class);
    }

    public function conditions()
    {
        return $this->belongsToMany(Condition::class);
    }
}
