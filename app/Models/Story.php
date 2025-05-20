<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class Story extends Model
{
    protected $fillable = ['author', 'description', 'image_url'];

    protected static function booted()
    {
        static::updating(function (Story $story) {
            $original = $story->getOriginal();
            
            if (isset($original['image_url']) && $original['image_url'] !== $story->image_url) {
                Storage::disk('public')->delete($original['image_url']);
            }
        });

        static::deleted(function (Story $story) {
            if ($story->image_url) {
                Storage::disk('public')->delete($story->image_url);
            }
        });
    }

}
