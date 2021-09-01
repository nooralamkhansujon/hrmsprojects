<?php

namespace App\Observers;

use App\Models\LeaveType;

class LeaveTypeObserver
{
    /**
     * Handle the LeaveType "created" event.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return void
     */
    public function created(LeaveType $leaveType)
    {
        //
    }

    /**
     * Handle the LeaveType "updated" event.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return void
     */
    public function updated(LeaveType $leaveType)
    {
        //
    }

    /**
     * Handle the LeaveType "deleted" event.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return void
     */
    public function deleted(LeaveType $leaveType)
    {
        $leaveType->leaves()->delete();
        // Flight::destroy([1, 2, 3]);
    }

    /**
     * Handle the LeaveType "restored" event.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return void
     */
    public function restored(LeaveType $leaveType)
    {
        //
    }

    /**
     * Handle the LeaveType "force deleted" event.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return void
     */
    public function forceDeleted(LeaveType $leaveType)
    {
        //
    }
}
