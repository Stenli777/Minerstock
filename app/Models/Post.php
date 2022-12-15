<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//    protected $table = 'posts';
//    protected $guarded = false;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function save(array $options = []): bool
    {
        $this->alias = str_replace('__','_',str_replace(['!','?'],'',str_replace(['.',',',' ','/'],'_',str_replace(
            ['а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ы','ь','ъ','э','ю','я','А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ы','Ь','Ъ','Э','Ю','Я'],
            ['a','b','v','g','d','ye','yo','zh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','kh','ts','ch','sh','shch','y','','','e','yu','ya','a','b','v','g','d','ye','yo','zh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','kh','ts','ch','sh','shch','y','','','e','yu','ya'],
            strtolower($this->title)))));
        return parent::save($options);
    }
//    public function save(array $options = []): bool
//    {
//        $this->alias = $this->title;
//        return parent::save($options);
//    }
}
