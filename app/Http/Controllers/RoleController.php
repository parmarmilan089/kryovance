<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\CustomerRole;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use View;
use Yajra\DataTables\DataTables;
use DB;

class RoleController extends Controller {

    public function roleList() {
        $data = [];
        $data['title'] = 'Role List';
        $data['menu_active_tab'] = 'role-list';

        return view('admin.role.list')->with($data);
    }

    public function jsonRole(Request $request) {
        $list = CustomerRole::select('customer_roles.id',
                        'customer_roles.title as name',
                        'customer_roles.user_type',
                        'customer_roles.is_deleted',
                        'customer_roles.created_at',
                        'customer_roles.updated_at'
                )
                ->where('customer_roles.is_deleted', '0')
                ->orderBy('customer_roles.id', 'desc')
                ->get();

    // Return the data in DataTables format
    return DataTables::of($list)
                        // Add a custom action column with edit button
                        ->addColumn('action', function ($role) {
                            $div_start = '<div class="">';
                            // Create the edit button for each role
                            $edit_btn = '<a href="' . route('edit-role', $role->id) . '" data-id="' . $role->id . '" class="mx-1"><i class="bx bxs-edit"></i></a>';
                            $div_end = '</div>';
                            return $div_start . $edit_btn . $div_end;
                        })
                        // Enable the custom action column and raw HTML for icons
                        ->rawColumns(['action'])
                        // Add an index column to display numbering
                        ->addIndexColumn()
                        ->make(true);
}

    public function addRole() {
        $data = [];
        $data['title'] = 'Add Role';
        $data['menu_active_tab'] = 'role-list';

        return view('admin.role.add')->with($data);
    }

    public function storeRole(Request $request) {
        $request->validate([
            'title' => 'required',  // Title for the customer role (similar to 'name' in your user roles)
        ]);
        try {
            // Create a new instance of the CustomerRole model
            $role = new CustomerRole();
            $role->title = $request->input('title') ? $request->input('title') : null;
            $role->user_type = $request->input('user_type') ? $request->input('user_type') : 1; // Optional: Add user_type if you need it
            $role->is_deleted = 0; // Ensure the role is not marked as deleted by default
            $role->save(); // Save the role in the database
            // Redirect to the role list with a success message
            return redirect()->route('role-list')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
            // Handle any errors and return the message
            return json_encode(array('status' => false, 'msg' => $e->getMessage()));
        }
    }

    public function deleteRole(Request $request) {
        $id = $request->input('delete_id');
        try {
            if ($id) {
                $role = UserRole::find($id);
                if ($role) {
                    $role->is_deleted = '1';
                    $role->updated_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                    $role->save();
                }
                echo json_encode(array("status" => true, 'message' => 'Record deleted.'));
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => getErrorMessageByCode('ER1')]);
        }
    }

    public function editRole(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Role';
        $data['menu_active_tab'] = 'role-list';
        if ($id) {
            $role = CustomerRole::find($id);
            if ($role) {
                $data['role'] = $role;
                return view('admin.role.edit')->with($data);
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } else {
            echo json_encode(array("status" => false, 'message' => 'Record not found.'));
        }
    }

    public function updateRole(Request $request) {
        $id = $request->input('role_id') ? $request->input('role_id') : null;

        if ($id) {
            // Validate the input data
            $request->validate([
                'name' => 'required',
            ]);

            // Find the customer role by ID
            $role = \App\Models\CustomerRole::find($id);

            if ($role) {
                // Update the fields for the customer role
                $role->title = $request->input('name') ? $request->input('name') : null;
                $role->user_type = $request->input('user_type') ? $request->input('user_type') : null;
                // Save the role
                $role->save();
            }

            // Redirect with success message
            return redirect()->route('role-list')->with('success', 'Record Updated.');
        } else {
            // If the role ID is not found
            return json_encode(['status' => false, 'message' => 'Record not found']);
        }
    }

}
