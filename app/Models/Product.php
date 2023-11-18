<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Product extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = ["category_id", "name", "slug", "short_description", "description",
        "price", "selling_price", "image",  "qty",  "tax", "status",  "trend",
        "meta_title", "meta_description", "meta_keywords"];
    public $translatable = ["name","short_description", "description","meta_title", "meta_description", "meta_keywords"];

    public  function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
