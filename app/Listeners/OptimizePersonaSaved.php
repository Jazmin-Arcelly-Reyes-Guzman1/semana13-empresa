<?php

namespace App\Listeners;

use App\Events\PersonaSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\Laravel\Facades\Image;#manual
use Illuminate\Support\Facades\Storage;#manual

class OptimizePersonaSaved implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PersonaSaved $event)
    {
        //
        $image = Image::read(storage::get($event->$persona->image))
           ->scale(width:600) 
           ->reduceColors(255) 
           ->encode(); 

        Storage::put($event->$persona->image, (string) $image);
    }
}
