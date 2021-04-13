<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PostCategory extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'slug', 'description'];
    protected $table = 'post_category';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];

    public function post()
    {
        return $this->hasOne('App\Models\Post', 'category_id', 'id');
    }
}
