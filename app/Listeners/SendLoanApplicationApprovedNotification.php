<?php

namespace App\Listeners;

use App\Event\LoanApproved;
use App\Models\User;
use App\Notifications\LoanApprovedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLoanApplicationApprovedNotification
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
     * @param  \App\Event\LoanApproved  $event
     * @return void
     */
    public function handle(LoanApproved $event)
    {
        $event->property->user->notify(new LoanApprovedNotification());
    }
}
