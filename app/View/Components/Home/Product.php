<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\Models\Product as ModelProduct;
class Product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $order;
    public $limit;
    public function __construct($title,$order,$limit=9)
    {
        $this->title=$title;
        $this->order=$order;
        $this->limit=$limit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $products = ModelProduct::limit($this->limit)->orderBy('id', $this->order)->get();
        return view('components.home.product',compact('products'));
    }
}
