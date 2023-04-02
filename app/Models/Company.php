<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function office()
    {
        return $this->hasMany(Office::class);
    }

    public function dpc()
    {
        return $this->hasMany(Dpc::class);
    }

    public function save(array $options = []): bool
    {
        if ($this->direction == 1) {
            $direction = " поставщик майнинг оборудования";
            $direction_description = " поставка и продажа майнинг оборудования из Китая";
        } elseif ($this->direction == 2) {
            $direction = " хостинг для майнинг оборудования";
            $direction_description = " услуги майнинг отеля для оборудования";
        } else {
            $direction = " поставка и хостинг майнинг оборудования";
            $direction_description = " поставка и продажа майнинг оборудования из Китая, а также хостинг оборудования в дата центре";
        }
        $this->alias = Str::slug($this->name);
        $this->title = "Компания " . $this->name . $direction;
        $this->description = "Страница компании " . $this->name . $direction_description;
        $this->h1 = "Компания " . $this->name;

        return parent::save($options);
    }
}
