<?php

namespace App\Observers;

use App\Models\AssignProject;

class AssignProjectObserver
{
    /**
     * Handle the AssignProject "created" event.
     *
     * @param  \App\Models\AssignProject  $assignProject
     * @return void
     */
    public function created(AssignProject $assignProject)
    {
        $assignProject->employees()->attach([random_int(1,3),random_int(1,3)]);
    }

    /**
     * Handle the AssignProject "updated" event.
     *
     * @param  \App\Models\AssignProject  $assignProject
     * @return void
     */
    public function updated(AssignProject $assignProject)
    {
        //
    }

    /**
     * Handle the AssignProject "deleted" event.
     *
     * @param  \App\Models\AssignProject  $assignProject
     * @return void
     */
    public function deleted(AssignProject $assignProject)
    {
        //
    }

    /**
     * Handle the AssignProject "restored" event.
     *
     * @param  \App\Models\AssignProject  $assignProject
     * @return void
     */
    public function restored(AssignProject $assignProject)
    {
        //
    }

    /**
     * Handle the AssignProject "force deleted" event.
     *
     * @param  \App\Models\AssignProject  $assignProject
     * @return void
     */
    public function forceDeleted(AssignProject $assignProject)
    {
        //
    }
}
