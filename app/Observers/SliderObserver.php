<?php

namespace App\Observers;

use App\Models\Slider;

class SliderObserver
{
    /**
     * Handle the slider "created" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function creating(Slider $slider)
    {
        $slider->slug=str_slug($slider->title);
    }
    public function updating(Slider $slider)
    {
        $slider->slug=str_slug($slider->title);
    }

    /**
     * Handle the slider "updated" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function updated(Slider $slider)
    {
        //
    }

    /**
     * Handle the slider "deleted" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function deleted(Slider $slider)
    {
        //
    }

    /**
     * Handle the slider "restored" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function restored(Slider $slider)
    {
        //
    }

    /**
     * Handle the slider "force deleted" event.
     *
     * @param  \App\Models\Slider  $slider
     * @return void
     */
    public function forceDeleted(Slider $slider)
    {
        //
    }
}
