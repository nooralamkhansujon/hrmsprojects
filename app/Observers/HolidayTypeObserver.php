<?php

namespace App\Observers;

use App\Models\HolidayType;

class HolidayTypeObserver
{
    /**
     * Handle the HolidayType "created" event.
     *
     * @param  \App\Models\HolidayType  $holidayType
     * @return void
     */
    public function created(HolidayType $holidayType)
    {
        //
    }

    /**
     * Handle the HolidayType "updated" event.
     *
     * @param  \App\Models\HolidayType  $holidayType
     * @return void
     */
    public function updated(HolidayType $holidayType)
    {
        //
    }

    /**
     * Handle the HolidayType "deleted" event.
     *
     * @param  \App\Models\HolidayType  $holidayType
     * @return void
     */
    public function deleted(HolidayType $holidayType)
    {
        $holidayType->holidays()->delete();
    }

    /**
     * Handle the HolidayType "restored" event.
     *
     * @param  \App\Models\HolidayType  $holidayType
     * @return void
     */
    public function restored(HolidayType $holidayType)
    {
        //
    }

    /**
     * Handle the HolidayType "force deleted" event.
     *
     * @param  \App\Models\HolidayType  $holidayType
     * @return void
     */
    public function forceDeleted(HolidayType $holidayType)
    {
        //
    }
}
