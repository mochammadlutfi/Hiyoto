<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{

    protected $fillable = ['description', 'application', 'technical'];
    public $timestamps = false;

}
