<?php
namespace App\Http\Controllers;
// namespace là đường dẫn chứa thư mục class
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function about()
    {
        return view('home.about');
    }
    public function blog()
    {
        return view('home.blog');
    }
    public function contact()
    {
        return view('home.contact');
    }
  
    public function sanpham()
    {
        $cats = Category::orderBy('name','asc')->get();
        $products = Product::orderBy('id','desc')->paginate(8);

        return view('home.sanpham', compact('cats','products'));
    }
    public function product($id, $slug)
    {
        $product = Product::find($id);
        return view('home.product', compact('product'));
    }
    public function category($id, $slug)
    {
        $cat = Category::find($id);
        $products = $cat->product()->paginate(4);
        $cats = Category::orderBy('name','asc')->get();
      
        return view('home.sanpham', compact('cat','products','cats'));
    }
}

