<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SendOrderCreatedNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;

        $user = User::first();
        // if ($order->store_id) {
            $user->notify(new OrderCreatedNotification($order));
        // }

        /**
         * send notification for more than user in the store
         * get() -> to return all users in the store, and make foreach for each user
         * But, Laravel provids to me --> Notification Facade
         */


        // $users = User::where('store_id', '=', $order->store_id)->get();
        // foreach ($users as $user) {
        //     $user->notitfy(new OrderCreatedNotification($order));
        // }

        // Using Notification Facade
        // $users = User::where('store_id', '=', $order->store_id)->get();
        // Notification::send($users, new OrderCreatedNotification($order));
    }
}

