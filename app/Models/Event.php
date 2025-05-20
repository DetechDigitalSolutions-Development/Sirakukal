<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class Event extends Model
{

    const TYPE  = [
        'Online' => 'Online',
        'Physical' => 'Physical',
    ];

    const CATEGORY = [
        'Event' => 'Event',
        'Competition' => 'Competition',
        'Meetup' => 'Meetup',
        'Class' => 'Class',
    ];

    protected $fillable = [
        'name',
        'date',
        'time',
        'venue',
        'description',
        'image_url',
        'category',
        'type',
        'references_links',
        'link',
    ];

    protected $casts = [
        'references_links' => 'array', // Cast to array for multiple files
    ];

    protected static function booted()
    {
        static::updating(function (Event $event) {
            $original = $event->getOriginal();
            
            // Handle image deletion if changed
            if (isset($original['image_url']) && $original['image_url'] !== $event->image_url) {
                Storage::disk('public')->delete($original['image_url']);
            }
            
            // Handle references_links deletion if changed
            if (isset($original['references_links'])) {
                $oldFiles = is_array($original['references_links']) 
                    ? $original['references_links']
                    : json_decode($original['references_links'], true) ?? [];
                    
                $newFiles = is_array($event->references_links) 
                    ? $event->references_links
                    : json_decode($event->references_links, true) ?? [];
                    
                $filesToDelete = array_diff($oldFiles, $newFiles);
                
                foreach ($filesToDelete as $file) {
                    Storage::disk('public')->delete($file);
                }
            }
        });

        // Optional: Add this if you want to handle file deletion when model is deleted
        // (though you already have this in your DeleteAction)
        static::deleted(function (Event $event) {
            if ($event->image_url) {
                Storage::disk('public')->delete($event->image_url);
            }
            
            if ($event->references_links) {
                $files = is_array($event->references_links) 
                    ? $event->references_links
                    : json_decode($event->references_links, true) ?? [];
                    
                foreach ($files as $file) {
                    Storage::disk('public')->delete($file);
                }
            }
        });
    }
}
