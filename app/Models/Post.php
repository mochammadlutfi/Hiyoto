<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Post extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'posts';
    protected $primaryKey = 'id';

    public $translatedAttributes = [
        'title', 'slug', 'description'
    ];

    protected $fillable = [
        'featured_img', 'seo_keyword', 'seo_description', 'seo_tags', 'category_id', 'status', 'views'
    ];

    protected $appends = ['dibuat', 'featured_img_url', 'status_badge'];

    public function category()
    {
        return $this->belongsTo('App\Models\PostCategory');
    }

    public function getDibuatAttribute()
    {
        // Carbon::setLocale();
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->attributes['status'] === 1) {
            return '<span class="badge badge-success">Publikasi</span>';
        } else {
            return '<span class="badge badge-danger">Draft</span>';
        }
    }
    

    public function getFeaturedImgUrlAttribute()
    {
        if (file_exists( public_path() . '/' . $this->attributes['featured_img']) && $this->attributes['featured_img'] !== null) {
            return asset($this->attributes['featured_img']);
        } else {
            return asset('img/poster.png');
        }
    }



}
