<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index(Request $req)
    {

        $status = $req->status ? $req->status : 0;
        $orders = Order::where('status', $status);

        if ($req->dateStart && $req->dateEnd) {
            $start = $req->dateStart;
            $end = $req->dateEnd;
            $orders = $orders->whereBetween('create_at', [$start, $end]);
        }

        $orders = $orders->paginate(8);
        return view('admin.order.index', compact('orders'));
    }


    public function detail($id)
    {
        $order = Order::find($id);
        return view('admin.order.detail', compact('order'));
    }

    public function status($id, Request $req)
    {
        if ($req->status) {
            Order::where('id', $id)->update(['status' => $req->status]);
        }
        return redirect()->back()->with('yes', 'Cập nhật thành công');
    }
}
