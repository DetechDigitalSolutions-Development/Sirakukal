<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class Announcement extends Model
{
    protected $fillable = ['author', 'description', 'image_url'];

    protected static function booted()
    {
        static::updating(function (Announcement $announcement) {
            $original = $announcement->getOriginal();
            
            if (isset($original['image_url']) && $original['image_url'] !== $announcement->image_url) {
                Storage::disk('public')->delete($original['image_url']);
            }
        });

        static::deleted(function (Announcement $announcement) {
            if ($announcement->image_url) {
                Storage::disk('public')->delete($announcement->image_url);
            }
        });
    }

}
