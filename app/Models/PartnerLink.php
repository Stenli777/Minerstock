<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerLink extends Model
{
    use HasFactory;

    protected $table = 'partnerlinks';

    public function randomizeLink($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function save(array $options = [])
    {
        if ($this->internal_link == null) {
            $this->internal_link = $this->randomizeLink();
        }
        parent::save($options);
    }
}
