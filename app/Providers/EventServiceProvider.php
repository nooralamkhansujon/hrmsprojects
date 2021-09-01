<?php

namespace App\Providers;

use App\Models\AssignProject;
use App\Models\HolidayType;
use App\Models\LeaveType;
use App\Models\TrainingInvite;
use App\Observers\AssignProjectObserver;
use App\Observers\HolidayTypeObserver;
use App\Observers\LeaveTypeObserver;
use App\Observers\TrainingInviteObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        LeaveType::observe(LeaveTypeObserver::class);
        HolidayType::observe(HolidayTypeObserver::class);
        AssignProject::observe(AssignProjectObserver::class);
        TrainingInvite::observe(TrainingInviteObserver::class);
    }
}
