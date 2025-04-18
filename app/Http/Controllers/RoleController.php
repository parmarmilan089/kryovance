<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
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
        $list = \App\Models\UserRole::select('user_roles.id',
                        'user_roles.name',
                        'user_roles.is_deleted',
                        'user_roles.created_at',
                        'user_roles.updated_at'
                )
                ->where('user_roles.is_deleted', '0')
                ->orderBy('user_roles.id', 'desc')
                ->get();
        return DataTables::of($list)
                        ->addColumn('action', function ($role) {
                            $div_start = '<div class="">';
                            $edit_btn = '<a href="' . route('edit-role', $role->id) . '" data-id="' . $role->id . '" class="mx-1"><i class="bx bxs-edit"></i></i></a>';
//                            $deleteBtn = '<a href="#" data-id="' . $role->id . '" class="mx-1 btnDelete"><i class="bx bxs-trash-alt"></i></a>';
                            $div_end = '</div>';
                            return $div_start . $edit_btn . $div_end;
                        })
                        ->rawColumns(['action'])->addIndexColumn()
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
            'name' => 'required',
        ]);
        try {
            $role = new \App\Models\UserRole;
            $role->name = $request->input('name') ? $request->input('name') : null;
            $role->created_by_id = \Auth::user()->id ? \Auth::user()->id : null;
            $role->save();

            return redirect()->route('role-list')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
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
            $role = \App\Models\UserRole::find($id);
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
            $request->validate([
                'name' => 'required',
            ]);
            $role = \App\Models\UserRole::find($id);
            if ($role) {
                $role->name = $request->input('name') ? $request->input('name') : null;
                $role->updated_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $role->save();
            }

            return redirect()->route('role-list')->with('success', 'Record Updated.');
        } else {
            return json_encode(['status' => false, 'message' => 'Record not found']);
        }
    }

}
