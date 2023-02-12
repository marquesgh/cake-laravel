<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\CakeAvailabilityCreated;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CakeAvailabilityCreatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;

class SendCakeAvailabilityCreatedEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable;
    /**
     * Handle the event.
     *
     * @param  \App\Events\CakeAvailabilityCreated  $event
     * @return void
     */
    public function handle(CakeAvailabilityCreated $event): void
    {
        Mail::to($event->cakeAvailability->user->email)
            ->queue(new CakeAvailabilityCreatedEmail($event->cakeAvailability));
    }
}
