<?php

namespace App\Observers;

use App\Models\TrainingInvite;

class TrainingInviteObserver
{
    /**
     * Handle the TrainingInvite "created" event.
     *
     * @param  \App\Models\TrainingInvite  $trainingInvite
     * @return void
     */
    public function created(TrainingInvite $trainingInvite)
    {
        $trainingInvite->employees()->attach([random_int(1,3),random_int(1,3)]);
    }

    /**
     * Handle the TrainingInvite "updated" event.
     *
     * @param  \App\Models\TrainingInvite  $trainingInvite
     * @return void
     */
    public function updated(TrainingInvite $trainingInvite)
    {
        //
    }

    /**
     * Handle the TrainingInvite "deleted" event.
     *
     * @param  \App\Models\TrainingInvite  $trainingInvite
     * @return void
     */
    public function deleted(TrainingInvite $trainingInvite)
    {
        //
    }

    /**
     * Handle the TrainingInvite "restored" event.
     *
     * @param  \App\Models\TrainingInvite  $trainingInvite
     * @return void
     */
    public function restored(TrainingInvite $trainingInvite)
    {
        //
    }

    /**
     * Handle the TrainingInvite "force deleted" event.
     *
     * @param  \App\Models\TrainingInvite  $trainingInvite
     * @return void
     */
    public function forceDeleted(TrainingInvite $trainingInvite)
    {
        //
    }
}
