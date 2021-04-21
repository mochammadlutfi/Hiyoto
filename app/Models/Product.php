<?php

namespace App\Models;


use Carbon\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use Translatable;
    use HasSlug;

    public $translatedAttributes = ['description', 'application', 'technical'];
    protected $table = 'product';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'category_id', ''
    ];

    protected $appends = ['dibuat', 'image_url'];

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    public function getDibuatAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
    }

    public function getImageUrlAttribute()
    {
        
        if (file_exists( public_path() . '/' . $this->attributes['image']) && $this->attributes['image'] !== null) {
            return asset($this->attributes['image']);
        } else {
            return asset('img/placeholder/product.png');
        }
    }

    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
