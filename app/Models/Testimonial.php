<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;


class Testimonial extends Model
{
    protected $fillable = ['author', 'description', 'image_url'];

    protected static function booted()
    {
        static::updating(function (Testimonial $testimonial) {
            $original = $testimonial->getOriginal();
            
            if (isset($original['image_url']) && $original['image_url'] !== $testimonial->image_url) {
                Storage::disk('public')->delete($original['image_url']);
            }
        });

        static::deleted(function (Testimonial $testimonial) {
            if ($testimonial->image_url) {
                Storage::disk('public')->delete($testimonial->image_url);
            }
        });
    }

}
