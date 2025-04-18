<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Yajra\DataTables\DataTables;
use DB;


class OrderManagmentController extends Controller
{
    //
    public function index(){
        $data = [];
        $data['title'] = 'Orders';
        $data['menu_active_tab'] = 'Orders';

        return view('admin.order.list')->with($data);
    }

    public function jsonOrder(Request $request) {
        $list = Order::select('orders.id',
                        'orders.order_number',
                        'orders.status',
                        'orders.payment_method',
                        'orders.total',
                        'orders.created_at',
                        'orders.updated_at'
                )
                ->orderBy('orders.id', 'ASC')
                ->get();
        return DataTables::of($list)
                        ->addColumn('action', function ($order) {
                            $div_start = '<div class="">';
                            $edit_btn = '<a href="' . route('view-order', $order->id) . '" data-id="' . $order->id . '" class="mx-1"><i class="bx bx-file-find"></i></i></a>';
                            $div_end = '</div>';
                            return $div_start . $edit_btn . $div_end;
                        })
                        ->rawColumns(['action'])->addIndexColumn()
                        ->make(true);
    }

    public function viewOrder(Request $request, $id) {
        $data = [];
        $data['title'] = 'Order Details';
        $data['menu_active_tab'] = 'order-details';
        if ($id) {
            $order = Order::with('billingDetails', 'items.product')->findOrFail($id);
            if (!$order) {
                return redirect()->route('order')->with('error', 'Order not found.');
            }
            $data = [];
            $data['title'] = 'Order';
            $data['menu_active_tab'] = 'order';
            $data['order'] = $order;
            return view('admin.order.view')->with($data);
        } else {
            echo json_encode(array("status" => false, 'message' => 'Record not found.'));
        }
    }
}
