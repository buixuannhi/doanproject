<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Mail;
use Str;
use PDF;
class OrderController extends Controller
{
    public function checkout(Cart $cart){
        $auth = Auth::guard('kh')->user();
        return view('order.checkout', compact('auth','cart'));
    }

    public function post_checkout(Request $req, Cart $cart){
        $auth = Auth::guard('kh')->user();
        $check = true;
        $data = $req->only('customer_id', 'name', 'email', 'phone', 'address', 'status', 'total_price');
        if($order = Order::create($data)){
            $order_id = $order -> id;
            foreach($cart->items as $cat){
                $detail = [
                'order_id' => $order_id,
                'product_id' => $cat['id'], 
                'price' => $cat['price'], 
                'quantity' => $cat['quantity']
            ];
                if(!OrderDetail::create($detail)){
                    $check = false;
                    break;
                }
            }
            if($check){
                $order = Order::find($order_id);
                $token = strtoupper(Str::random(20));
                $order->update(['token'=>$token]);
                //gửi email xác nhận
                Mail::send('order.email', compact('auth','order'), function($mail) use($auth){
                    $mail->to($auth->email, $auth->name)->subject('xác nhận đơn hàng thành công');
                });
                $cart->clear(); //hủy giỏ hàng
                return redirect()->route('order.success');
            }else{
                OrderDetail::where('order_id', $order_id)->delete();
                Order::where('id', $order_id)->delete();
                return redirect()->route('order.error');
            }
        }
    }

    public function history(){
        $auth = Auth::guard('kh')->user();
        $orders = $auth->orders()->paginate(10);
        return view('order.history', compact('orders'));
    }

    public function detail($id){
        $order = Order::find($id);
        return view('order.detail', compact('order'));
    }

    public function pdf($id, Request $request){
        $order = Order::find($id);
        if($order){
            $pdf = PDF::loadView('order.pdf', compact('order'));
        if($request->action  === 'download'){
            return $pdf->download('order-detail.pdf');
        }else{
            return $pdf->stream();
        }
        }else{
            return view('site.404');
        }
    }


    
    public function success(){
        return view('order.success');
    }
    public function error(){
        return view('order.error');
    }
    public function confirm($token){
        $order = Order::where('token',$token)->first();
        if($order){
            $order->update(['token' => null, 'status' => 1]);
            return redirect()->route('order.success');
        }
        return abort(404);
    }
}
