<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Nav extends Component
{
    public $items;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = $this->prepareItems(config('nav'));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }

    protected function prepareItems($items)
    {
        $user = Auth::user();
        foreach ($items as $key => $item) {
            if (isset($item['ability']) && ! $user->can($item['ability'])) {
                unset($items[$key]);
            }
        }
        // foreach ($items as $key => $item) {
        //     if (isset($item['list']) && isset($item['sub-ability']) && !$user->can($item['sub-ability'])) {
        //         unset($item['list']);
        //     }
        // }
        return $items;
    }
}
