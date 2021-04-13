<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Kalnoy\Nestedset\NodeTrait;

class ProductCategory extends Model implements TranslatableContract
{
    use Translatable;
    use NodeTrait;

    public $translatedAttributes = ['title', 'slug'];
    protected $table = 'product_category';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'thumbnail', 'status', 'category_id'
    ];

    protected $appends = [
        'text', 'thumbnail_url'
    ];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'category_id', 'id');
    }

    public function children(){

        return $this->hasMany(ProductCategory::Class, 'parent_id');

    }

    public function parent(){
        return $this->belongsTo(ProductCategory::Class, 'parent_id');
    }

    public function getTextAttribute()
    {
        return $this->translate()->title;
    }

    public function getThumbnailUrlAttribute()
    {
        if (file_exists( public_path() . '/uploads/' .$this->attributes['thumbnail']) && $this->attributes['thumbnail'] !== null) {
            return asset('uploads/'.$this->attributes['thumbnail']);
        } else {
            return asset('img/placeholder/product.png');
        }
    }
}
