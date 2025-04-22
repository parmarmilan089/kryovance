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
                        'orders.updated_at',
                        DB::raw("CONCAT(customers.fname, ' ', customers.lname) as customer_name")
                )
                ->leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
                ->orderBy('orders.id', 'ASC')
                ->get();
        return DataTables::of($list)
                        ->editColumn('status', function ($order) {
                            return ucfirst($order->status); // Capitalize first letter
                        })
                        ->editColumn('payment_method', function ($order) {
                            return ucfirst($order->payment_method); // Capitalize first letter
                        })
                        ->addColumn('action', function ($order) {
                            $div_start = '<div class="d-flex">';
                            $edit_btn = '<a href="' . route('view-order', $order->id) . '" data-id="' . $order->id . '" class="mx-1"><i class="bx bx-file-find"></i></a>';
                            if($order->status == 'pending'){
                                $order_btn = '<a href="' . route('status-update', $order->id) . '" data-id="' . $order->id . '" class="mx-1 btn btn-primary p-0 m-0" style="font-size:8px">Accept Order</a>';
                            } else {
                                $order_btn = '';
                            }
                            $div_end = '</div>';
                            return $div_start . $edit_btn. $order_btn . $div_end;
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

    public function statusUpdate($id) {
        $order = Order::find($id);
        $order->status = 'Completed';
        $order->save();
        return redirect()->route('orders')->withSuccess('Order Accepted');
    }

}
