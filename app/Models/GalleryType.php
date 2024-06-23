<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryType extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
