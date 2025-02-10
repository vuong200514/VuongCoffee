<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Storage, Validator};
use App\Models\{Order, Status, Product, Role, Transaction, User};
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function makeOrderGet($productId)
    {
        $product = Product::findOrFail($productId);
        return view('order.make_order', [
            'title' => 'Make Order',
            'product' => $product
        ]);
    }

    public function store(Request $request)
    {
        Order::create([
            'product_id' => 1,
            'user_id' => 4,
            'quantity' => 1,
            'address' => 'Số 99, đường Phạm Văn Đồng, Hải Phòng',
            'shipping_address' => 'Số 99, đường Phạm Văn Đồng, Hải Phòng',
            'total_price' => 45000,
            'payment_id' => 2,
            'bank_id' => 2,
            'note_id' => 4,
            'status_id' => 4,
            'transaction_doc' => null,
            'is_done' => 0,
        ]);

        return redirect()->back()->with('success', 'Order created successfully!');
    }

    public function orderData()
    {
        $title = "Dữ Liệu Đơn Hàng";
        if (auth()->user()->role_id == Role::ADMIN_ID) {
            $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where(["is_done" => 0])->orderBy("id", "ASC")->get();
        } else {
            $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where(["user_id" => auth()->user()->id, "is_done" => 0])->orderBy("id", "ASC")->get();
        }
        $status = Status::all();

        return view("/order/order_data", compact("title", "orders", "status"));
    }

    public function orderDataFilter(Request $request, $status_id)
    {
        $title = "Dữ Liệu Đơn Hàng";
        $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where("status_id", $status_id)->orderBy("id", "ASC")->get();
        $status = Status::all();

        return view("/order/order_data", compact("title", "orders", "status"));
    }

    public function getOrderData(Order $order)
    {
        $order->load("product", "user", "note", "status", "bank", "payment");
        return $order;
    }

    public function orderHistory()
    {
        $title = "Dữ Liệu Lịch Sử";
        if (auth()->user()->role_id == Role::ADMIN_ID) {
            $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where(["is_done" => 1])->orderBy("id", "ASC")->get();
        } else {
            $orders = Order::with("bank", "note", "payment", "user", "status", "product")->where(["user_id" => auth()->user()->id, "is_done" => 1])->orderBy("id", "ASC")->get();
        }
        $status = Status::all();

        return view("/order/order_data", compact("title", "orders", "status"));
    }

}
