<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryType extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    protected static function boot() {
        parent::boot();
    
        static::creating(function ($galliestype) {
            $galliestype->slug = \Str::slug($galliestype->title);
        });
    }
}
