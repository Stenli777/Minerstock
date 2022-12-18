<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
//    protected $table = 'posts';
//    protected $guarded = false;
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->title);

        return parent::save($options);
    }
//    public function save(array $options = []): bool
//    {
//        $this->alias = $this->title;
//        return parent::save($options);
//    }
}
