<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facade\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeductProductQuantity
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

    //Note::
    // if there are more than event for this listenr --> don't deside the event like this: ↓
    // public function handle(OrderCreated❌ $event) ->  public function handle($event)✔️

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;

        // foreach (Cart::get() as $item)
        // {
        //     Product::where('id', '=', $item->product_id)->update([
        //         'quantity' => DB::raw("quantity - {$item->quantity}"),
        //     ]);
        // }
        try {
            foreach ($order->products as $product) {
                $product->decrement('quantity', $product->pivot->quantity);
            }
        } catch(Throwable $e) {
            return redirect()->route('home')->with(['message' => 'Product is over!', 'type' => 'info']);
        }

    }
}
