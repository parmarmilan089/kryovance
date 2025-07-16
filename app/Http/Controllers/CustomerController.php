<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Role;
use App\Models\CustomerRole;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use DataTables;
use DB;
use App\Mail\ForgotPasswordEmail;
use View;
use Razorpay\Api\Api;

class CustomerController extends Controller
{
    //
    public function userList() {
        $data = [];
        $data['title'] = 'Customer List';
        $data['menu_active_tab'] = 'customer-list';
        $data['user'] = Customer::orderBy('id', 'DESC')->get();

        return view('admin.customer.list')->with($data);
    }

    public function jsonUser() {
        $customers = Customer::select(
                'customers.id',
                'customers.customer_role_id',
                'customers.fname as first_name',
                'customers.lname as last_name',
                'customers.email',
                'customers.phone',
                'customers.created_at',
                'customers.updated_at',
            )
            ->leftJoin('customer_roles', 'customers.customer_role_id', '=', 'customer_roles.id') // Join with customer_roles table
            ->orderBy('customers.id', 'ASC')
            ->where('customers.parent_id', auth()->user()->id)
            ->get();

        return DataTables::of($customers)
            ->addColumn('name', function ($customer) {
                return $customer->first_name . ' ' . $customer->last_name;
            })
            ->addColumn('action', function ($customer) {
                $delete_btn = '';
                $edit_btn = $view_btn = '';
                $div_start = '<div class="">';
                $delete_btn = '<a href="#" data-id="' . $customer->id . '" class="btn btn-sm btn-icon item-edit btnDelete" title="Delete"><i class="bx bxs-trash-alt"></i></a>';
                $edit_btn = '<a href="' . route('edit-customer', $customer->id) . '" data-id="' . $customer->id . '" class="btn btn-sm btn-icon item-edit btnEdit" title="Edit"><i class="bx bxs-edit"></i></a>';
                $view_btn = '<a href="' . route('view-customer', $customer->id) . '" data-id="' . $customer->id . '" class="btn btn-sm btn-icon item-view btnView" title="View"><i class="bx bxs-show"></i></a>';
                $div_end = '</div>';
                $return_div = $div_start . $edit_btn. $view_btn . $delete_btn . $div_end;
                return $return_div;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function addUser(Request $request) {
        $data = [];
        $data['title'] = 'Add Customer';
        $data['menu_active_tab'] = 'add-customer';
        return view('admin.customer.add')->with($data);
    }

    public function storeCustomer(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'phone' => 'required|unique:customers,phone', // Changed table from 'users' to 'customers'
            'email' => 'required|email|unique:customers,email' // Changed table from 'users' to 'customers'
        ]);

        try {
            // Create Customer Record
            $customer = new Customer; // Use Customer model instead of User
            $customer->password = bcrypt('12345678'); // Default password
            $customer->fname = $request->input('firstname'); // Store first name
            $customer->lname = $request->input('lastname'); // Store last name
            $customer->email = $request->input('email'); // Store email
            $customer->phone = $request->input('phone'); // Store phone number
            $customer->company_name = $request->input('company'); // Store company name
            $customer->parent_id = auth()->user()->id;
            $customer->save();

            return redirect()->route('customer-list')->with('success', 'Customer added successfully.');
        } catch (\Exception $e) {
            return json_encode(array('status' => false, 'msg' => $e->getMessage()));
        }
    }

    public function editCustomer(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Customer';
        $data['menu_active_tab'] = 'customer-list';
        if ($id) {
            $customer = Customer::select(
                'customers.id',
                'customers.fname as first_name',
                'customers.lname as last_name',
                'customers.company_name as company_name',
                'customers.email',
                'customers.phone',
                'customers.password',
                'customer_roles.title as customer_role_name',
                'customer_roles.id as role_id'
            )
            ->leftJoin('customer_roles', 'customers.customer_role_id', '=', 'customer_roles.id')
            ->where('customers.id', $id)
            ->first();

        $data['roles'] = CustomerRole::where('is_deleted', '0')
            ->orderBy('id', 'ASC')
            ->get();

            if ($customer) {
                $data['customer'] = $customer;
                return view('admin.customer.edit')->with($data);
            } else {
                return redirect()->route('customer-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('customer-list')->with('failed', 'Record not found.');
        }
    }

    public function updateCustomer(Request $request) {
        $id = $request->customer_id;
        if ($id) {
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'company_name' => 'required',
                'phone' => 'required|numeric|unique:customers,phone,' . $id,
                'email' => 'required|email|unique:customers,email,' . $id
            ]);
            try {
                $customer = Customer::find($id);
                if ($customer) {
                    $customer->fname = $request->input('firstname');
                    $customer->lname = $request->input('lastname');
                    $customer->email = $request->input('email');
                    $customer->phone = $request->input('phone');
                    $customer->company_name = $request->input('company_name');
                    $customer->save();

                    return redirect()->route('customer-list')->with('success', 'Customer updated successfully.');
                } else {
                    return redirect()->route('customer-list')->with('failed', 'Customer not found.');
                }
            } catch (\Exception $e) {
                return json_encode(['status' => false, 'msg' => $e->getMessage()]);
            }
        } else {
            return redirect()->route('customer-list')->with('failed', 'Invalid ID.');
        }
    }

    public function deleteCustomer(Request $request) {
        $id = $request->input('delete_id');
        try {
            if ($id) {
                $customer = Customer::find($id);
                $customer->delete();
                echo json_encode(array("status" => true, 'message' => 'Record deleted.'));
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => getErrorMessageByCode('ER1')]);
        }
    }

    public function deleteCustomerr(Request $request) {
        $id = $request->input('delete_id');
        try {
            if ($id) {
                $customer = Customer::find($id);
                $customer->delete();
                echo json_encode(array("status" => true, 'message' => 'Record deleted.'));
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => getErrorMessageByCode('ER1')]);
        }
    }

    public function viewUserProfile($id) {
        $data = [];
        $data['title'] = 'View Customer Profile';
        $data['menu_active_tab'] = 'dashboard';
        if (\Auth::id()) {
            $user = Customer::find($id);
            $list = CustomerRole::select('customer_roles.id', 'customer_roles.title', 'customer_roles.is_deleted')
                ->where('customer_roles.is_deleted', '0')
                ->orderBy('customer_roles.id', 'ASC')
                ->get();
            if ($user) {
                $data['customer'] = $user;
                $data['roles'] = $list;
                return view('admin.customer.view-userall-profile')->with($data);
            } else {
                return redirect()->route('dashboard')->with('failed', "Record not found");
            }
        } else {
            return redirect()->route('dashboard')->with('failed', "Record not found");
        }
    }

    public function verifyUserProfile(Request $request,$id){
        $customer = Customer::find($id);
        $customer->customer_verification_status = 1;
        $customer->save();
        return back()->with("success", "User Verified Successfully!");
    }
}
