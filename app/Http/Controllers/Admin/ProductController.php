<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductEditRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::orderBy('name', 'ASC')->get();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //  upload ảnh
    public function store(ProductEditRequest $request)
    {
        $image = $request->image; // Lấy te ảnh cũ trong biến product
        //nếu có file được chọn trên form
        if ($request->has('upload')) {
            $image = $request->upload->getClientOriginalName(); //lấy lại tên file mới
            $request->upload->move(public_path('uploads'), $image); //upload
        }
        $request->merge(['image' => $image]);
        $data = $request->only('name', 'image', 'price', 'salse_price', 'description', 'status', 'category_id', 'created_at', 'updated_at');
        if ($product = Product::create($data)) {
            // upload nhiều ảnh
            if ($request->has('uploads')) {
                foreach ($request->uploads as $file) {
                    $image_name = $file->getClientOriginalName();
                    $file->move(public_path('uploads'), $image_name); //upload
                    ProductImage::create([
                        'name' => $image_name,
                        'image' => $image_name,
                        'product_id' => $product->id
                    ]);
                }
            }
            return redirect()->route('product.index')->with('yes', 'Bạn đã cập nhật thành công!');
        } else {
            return redirect()->back()->with('no', 'cập nhật thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = Category::orderBy('name', 'ASC')->get();
        $image = ProductImage::where('product_id', $product->id)->get();
        return view('admin.product.edit', compact('cats', 'product', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)

    {

        $image = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $image);

        $request->merge(['image' => $image]);
        $data = $request->only('name', 'image', 'price', 'salse_price', 'description', 'status', 'category_id', 'created_at', 'updated_at');

        if ($request->has('uploads')) {
            foreach ($request->uploads as $file) {
                $image_name = $file->getClientOriginalName();
                $file->move(public_path('uploads'), $image_name); //upload
                ProductImage::create([
                    'name' => $image_name,
                    'image' => $image_name,
                    'product_id' => $product->id
                ]);

            }
        }
        if ($product->update($data)) {
            return redirect()->route('product.index')->with('yes', 'Bạn đã thêm sản phẩm thành công!');
        } else {
            return redirect()->back()->with('no', 'Thêm sản phẩm thất bại');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return redirect()->route('product.index')->with('yes', 'Bạn đã xóa sản phẩm thành công!');
        } else {
            return redirect()->back()->with('no', 'Thêm xóa sản phẩm thất bại');
        }
    }

    public function deleteImage($id)
    {
        ProductImage::where('id', $id)->delete();
        return redirect()->back()->with('yes', 'Bạn đã xóa thành công');
    }


    public function trashed()
    {
        $cats = Category::onlyTrashed()->paginate(2);
        return view('admin.product.trashed', compact('cats'));
    }
}
