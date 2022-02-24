<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\CategoryAddRequest;
use App\Http\Requests\Category\CategoryEditRequest;

class CategoryController extends Controller
{
    public function index()
    {
        // $cats = Category::all();
        $cats = Category::search()->paginate(5);

        return view('admin.category.index', compact('cats'));
    }

    public function themmoi()
    {
        return view('admin.category.themmoi');
    }

    public function luuchu(CategoryAddRequest $req)
    {
        // bước 1: xác thực dữ liệu
        if (Category::create($req->all())) {
            return redirect()->route('category.index')->with('yes', 'Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->back()->with('no', 'Thêm mới không thành công');
        }
    }

    public function edit($id)
    {
        $cat = Category::find($id);
        return view('admin.category.edit', compact('cat'));
    }


    public function capnhat($id, CategoryEditRequest $req)
    {
        $cat = Category::find($id);

        if (Category::CatUpdate($id)) {
            return redirect()->route('category.index')->with('yes', 'Bạn đã cập nhật thành công');
        } else {
            return redirect()->back()->with('no', 'Cập nhật thất bại');
        }
    }

    public function delete($id)
    {
        if (Category::where('id', $id)->delete()) {
            return redirect()->route('category.index')->with('yes', 'Bạn đã xóa thành công');
        } else {
            return redirect()->back()->with('no', 'Xóa không thành công');
        }
    }

    public function trashed()
    {
        $cats = Category::onlyTrashed()->paginate(2);
        return view('admin.category.trashed', compact('cats'));
    }

    public function restore($id)
    {
        $cat = Category::withTrashed()->find($id);
        $cat->restore();
        return redirect()->back()->with('yes', 'Bạn đã khôi phục thành công');
    }

    public function forcedelete($id)
    {
        $cat = Category::withTrashed()->find($id);
        $cat->forcedelete();
        return redirect()->back()->with('yes', 'Bạn đã xóa danh mục này vĩnh viễn');
    }
}
