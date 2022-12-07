<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CartModelRepository implements CartRepository
{
    public $items;

    public function __construct()
    {
        $this->items = collect([]);
    }

    public function get() : Collection
    {
        /**
         * return Cart::with('product')
         *      ->get();
         * will make collection (classعلى مستوى ال) In constructor
         * collectلتقليل جمل الاستعلام واعمله كوليكشن عشان استفيد من خصائص ال
         */
        // if (!$this->items->count()) {
        //     return Cart::with('product')->get();
        // }
        // return $this->items;
        return Cart::with('product')->get();

    }

    public function add(Product $product, $quantity = 1)
    {
        $item = Cart::where('product_id', '=', $product->id)
            ->first();
        if (!$item) {
            $cart =  Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
            $this->get()->push($cart);
            // dd($item);
            return $cart;
        }
        return $item->increment('quantity', $quantity);
    }

    public function update($id, $quantity)
    {
        Cart::where('id', '=', $id)
            ->update([
                'quantity' => $quantity,
            ]);
    }

    public function delete($id)
    {
        Cart::where('id', '=', $id)
            ->delete();
    }

    public function empty()
    {
        Cart::query()->delete(); // query() helper return Model builder
    }

    public function total() : float
    {
        // return (float) Cart::join('products', 'products.id', '=', 'carts.product_id')
        //     ->selectRaw('SUM(products.price * carts.quantity) as total')
        //     ->value('total');

        return $this->get()->sum(function($items) {
            return $items->quantity * $items->product->price;
        });
    }
}
