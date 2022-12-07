<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    public $order;
    public $addr;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->addr = $order->billingAddress;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];

        /**
         * should be already add attribute(column) in user table called notification_preferences with json datatype ⭐
         */
        $channels = ['database'];
        if ($notifiable->notification_preferences['order_created']['sms'] ?? false) {
            $channels[] = 'vonage';
        }
        if ($notifiable->notification_preferences['order_created']['mail'] ?? false) {
            $channels[] = 'mail';
        }
        if ($notifiable->notification_preferences['order_created']['broadcast'] ?? false) {
            $channels[] = 'braodcast';
        }
        return $channels;
        // return ['mail', 'database', 'broadcast']; 🔖
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("New Order #{$this->order->number}")
                    ->from('notification@codeacademey.com', 'Code Academey')
                    ->greeting("Hi {$notifiable->name},")
                    ->line("A new order ({$this->order->name}) created by {$this->addr->name} from {$this->addr->country_name}.")
                    ->action('View Order', url('/dashboard'))
                    ->line('Thank you for using our application!');

        // return (new MailMessage)->view(''); 🔖
    }

    public function toDatabase($notifiable)
    {
        return [
            'body' => "A new order({$this->order->name}) created by {$this->addr->name} from {$this->addr->country_name}.",
            'icon' => 'la la-shopping-backet',
            'url' => url('/dashboard'),
            'order_id' => $this->order->id,
        ];
    }


    public function toBroadcast($notifiable)
    {
        return [
            'body' => "A new order({$this->order->name}) created by {$this->addr->name} from {$this->addr->country_name}.",
            'icon' => 'la la-shopping-backet',
            'url' => url('/dashboard'),
            'order_id' => $this->order->id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
