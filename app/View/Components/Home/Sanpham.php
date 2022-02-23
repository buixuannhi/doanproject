<?php

namespace App\View\Components\home;

use Illuminate\View\Component;
use App\Models\Product as ModelProduct;
use App\Models\Category as ModelCategory;
class Sanpham extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $products = ModelProduct::limit(8)->orderBy('id','desc')->get();
        $cats = ModelCategory::orderBy('name','asc')->get();
        return view('components.home.sanpham', compact('cats','products'));
    }
}
