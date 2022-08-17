<?php

namespace App\Listeners;

use App\Event\LoanApplied;
use App\Notifications\LoanAppliedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLoanApplicationReceivedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\LoanApplied  $event
     * @return void
     */
    public function handle(LoanApplied $event)
    {
        $event->property->user->notify(LoanAppliedNotification::class);
    }
}
