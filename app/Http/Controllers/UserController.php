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

class UserController extends Controller {

    public function login() {
        $data = [];
        $data['title'] = 'Login';
        $data['menu_active_tab'] = 'login';
        return view('login')->with($data);
    }

    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //            $admin_detail = User::where('id', \Auth::id())->first();
            $admin_detail = User::where('id', \Auth::id())->first();

            if ($admin_detail) {

                $request->session()->put('user_id', $admin_detail->id);
                $request->session()->put('role_id', $admin_detail->role_id);
                $request->session()->put('first_name', $admin_detail->first_name);
                $request->session()->put('last_name', $admin_detail->last_name);

                $request->session()->put('email', $admin_detail->email);

                $role_title = $this->getRoleTitleById($admin_detail->role_id);
                $request->session()->put('user_role_title', $role_title);
                $request->session()->put('profile_image_path', $admin_detail->profile_image_path);
                $initial = "";
                if ($admin_detail->first_name != null) {
                    $initial = $admin_detail->first_name[0];
                }
                if ($admin_detail->last_name != null) {
                    $initial .= $admin_detail->last_name[0];
                }
                $request->session()->put('user_initial', $initial);
                $background_colors = array('bg-primary', 'bg-secondary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-dark',);
                $rand_background = $background_colors[array_rand($background_colors)];
                $request->session()->put('user_initial_color', $rand_background);

                date_default_timezone_set('Asia/Kolkata');
                // log
                $user_activity_logs = new \App\Models\UserActivityLog();
                $user_activity_logs->user_id = Auth::user()->id ? Auth::user()->id : null;
                $user_activity_logs->activity = 'Logged in';
                $user_activity_logs->ip_address = $_SERVER['REMOTE_ADDR'];
                $user_activity_logs->user_agent = $_SERVER['HTTP_USER_AGENT'];
                $user_activity_logs->save();
                return redirect()->intended('admin/dashboard')->withSuccess('You have Successfully loggedin');
            } else {
                return redirect('login')->with('failed', "Opps! You have entered invalid credentials");
            }
        }
        return redirect('admin/login')->with('failed', "Opps! You have entered invalid credentials");
    }

    public function getRoleTitleById($role_id) {

        $result = \App\Models\Role::select('id', 'title', 'is_deleted')->where('id', $role_id)->where('is_deleted', '0')->first();
        return $result;
    }

    public function logout(Request $request) {

        $request->session()->forget('user_id');
        $request->session()->forget('role_id');
        $request->session()->forget('first_name');
        $request->session()->forget('last_name');
        $request->session()->forget('email');

        \Auth::logout();
        return redirect("admin/login")->withSuccess('Logout');
    }

    public function dashboard() {
        $data = [];
        $data['title'] = 'Dashboard';
        $data['menu_active_tab'] = 'dashboard';
        $data['user_count'] = User::where('is_deleted', '0')->where('role_id', '!=', '1')->orderBy('id', 'DESC')->get()->count();

        return view('admin.dashboard')->with($data);
    }

    public function userList() {
        $data = [];
        $data['title'] = 'User List';
        $data['menu_active_tab'] = 'user-list';
        $data['user'] = User::where('is_deleted', '0')->where('role_id', '!=', '1')->orderBy('id', 'DESC')->get();

        return view('admin.user.list')->with($data);
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
            $edit_btn = '<a href="' . route('edit-user', $customer->id) . '" data-id="' . $customer->id . '" class="btn btn-sm btn-icon item-edit btnEdit" title="Edit"><i class="bx bxs-edit"></i></a>';
            $view_btn = '<a href="' . route('view-user', $customer->id) . '" data-id="' . $customer->id . '" class="btn btn-sm btn-icon item-view btnView" title="View"><i class="bx bxs-show"></i></a>';
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
        $data['title'] = 'Add User';
        $data['menu_active_tab'] = 'add-user';
        $list = CustomerRole::select('customer_roles.id', 'customer_roles.title', 'customer_roles.is_deleted')
            ->where('customer_roles.is_deleted', '0')
            ->orderBy('customer_roles.id', 'ASC')
            ->get();
        $data['customer_roles'] = $list;
        $data['user_role'] = $list;

        return view('admin.user.add')->with($data);
    }

    public function storeUser(Request $request) {
        $request->validate([
            'role_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:customers,phone', // Changed table from 'users' to 'customers'
            'email' => 'required|email|unique:customers,email' // Changed table from 'users' to 'customers'
        ]);

        try {
            // Create Customer Record
            $customer = new Customer; // Use Customer model instead of User
            $customer->customer_role_id = $request->input('role_id'); // Store the role of the customer
            $customer->password = bcrypt('12345678'); // Default password
            $customer->fname = $request->input('firstname'); // Store first name
            $customer->lname = $request->input('lastname'); // Store last name
            $customer->email = $request->input('email'); // Store email
            $customer->phone = $request->input('phone'); // Store phone number
            $customer->company_name = $request->input('company'); // Store company name
                $customer->save();

            return redirect()->route('user-list')->with('success', 'Customer added successfully.');
        } catch (\Exception $e) {
            return json_encode(array('status' => false, 'msg' => $e->getMessage()));
        }
    }

    public function editUser(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit User';
        $data['menu_active_tab'] = 'user-list';
        if ($id) {
            $user = Customer::select(
                'customers.id',
                'customers.fname as first_name',
                'customers.lname as last_name',
                'customers.company_name as company_name',
                'customers.email',
                'customers.phone as mobile_no',
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

            if ($user) {
                $data['user'] = $user;
                return view('admin.user.edit')->with($data);
            } else {
                return redirect()->route('user-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('user-list')->with('failed', 'Record not found.');
        }
    }

    public function updateUser(Request $request) {
        $id = $request->customer_id;
        if ($id) {
            $request->validate([
                'role_id' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'phone' => 'required|numeric|unique:customers,phone,' . $id,
                'email' => 'required|email|unique:customers,email,' . $id
            ]);
            try {
                $customer = Customer::find($id);
                if ($customer) {
                    $customer->customer_role_id = $request->input('role_id');
                    $customer->fname = $request->input('firstname');
                    $customer->lname = $request->input('lastname');
                    $customer->email = $request->input('email');
                    $customer->phone = $request->input('phone');
                    $customer->company_name = $request->input('company_name');
                    $customer->save();

                    return redirect()->route('user-list')->with('success', 'Customer updated successfully.');
                } else {
                    return redirect()->route('user-list')->with('failed', 'Customer not found.');
                }
            } catch (\Exception $e) {
                return json_encode(['status' => false, 'msg' => $e->getMessage()]);
            }
        } else {
            return redirect()->route('user-list')->with('failed', 'Invalid ID.');
        }
    }

    public function deleteUser(Request $request) {
        $id = $request->input('delete_id');
        try {
            if ($id) {
                $user = User::find($id);
                if ($user) {
                    $user->is_deleted = '1';
                    $user->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                    $user->save();
                }
                echo json_encode(array("status" => true, 'message' => 'Record deleted.'));
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => getErrorMessageByCode('ER1')]);
        }
    }

    public function viewUser(Request $request, $id) {
        $data = [];
        $data['title'] = '  User Detail';
        $data['menu_active_tab'] = 'user-list';
        if ($id) {
            $user = User::select('users.id',
                            'users.first_name',
                            'users.middle_name',
                            'users.last_name',
                            'users.email',
                            'users.mobile_no',
                            'users.role_id',
                            'users.address',
                            'users.pin_code',
                            'users.profile_image',
                            'users.profile_image_path',
                            'users.status',
                            'users.created_by_id',
                            'users.modified_by_id',
                            'users.is_deleted',
                            'users.created_at',
                            'users.updated_at',
                            'user_roles.title as role_title',
                    )
                    ->where('users.is_deleted', '0')
                    ->leftJoin('user_roles', 'users.role_id', '=', 'user_roles.id')
                    ->where('users.id', $id)
                    ->first();

            if ($user) {

                $data['user'] = $user;
                return view('admin.user.view')->with($data);
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } else {
            echo json_encode(array("status" => false, 'message' => 'Record not found.'));
        }
    }

    public function editUserProfile() {
        $data = [];
        $data['title'] = 'Edit User Profile';
        $data['menu_active_tab'] = 'dashboard';
        if (\Auth::id()) {
            $user = User::where('id', \Auth::id())->first();
            if ($user) {
                $data['user'] = $user;

                return view('admin.edit-user-profile')->with($data);
            } else {
                return redirect()->route('dashboard')->with('failed', "Record not found");
            }
        } else {
            return redirect()->route('dashboard')->with('failed', "Record not found");
        }
    }
    public function viewUserProfile($id) {
        $data = [];
        $data['title'] = 'View User Profile';
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
                return view('admin.user.view-user-profile')->with($data);
            } else {
                return redirect()->route('dashboard')->with('failed', "Record not found");
            }
        } else {
            return redirect()->route('dashboard')->with('failed', "Record not found");
        }
    }

    public function updateUserProfile(Request $request) {
        if (\Auth::id()) {
            $request->validate([
                'first_name' => 'required',
                // 'last_name' => 'required',
                'email' => 'required',
//                'mobile_no' => 'required',
            ]);
            $user = User::find(\Auth::id());
            if ($user) {
                //profile_image
                $file_name = null;
                $file_path = null;
                if ($request->file()) {
                    $file_name = 'profile_image' . time() . '.' . $request->profile_image->extension();
                    $file_path = $request->file('profile_image')->storeAs('profile_image', $file_name, 'public');
                }

                $user->first_name = $request->input('first_name') ? $request->input('first_name') : null;
                $user->middle_name = $request->input('middle_name') ? $request->input('middle_name') : null;
                $user->last_name = $request->input('last_name') ? $request->input('last_name') : null;

                $user->email = $request->input('email') ? $request->input('email') : null;
//                $user->mobile_no = $request->input('mobile_no') ? $request->input('mobile_no') : null;

                if ($file_name != null) {
                    $user->profile_image = $file_name;
                }
                if ($file_path != null) {
                    $user->profile_image_path = $file_path;
                    $request->session()->put('profile_image_path', $file_path);
                }

                if (isset($request->address)) {
                    $user->address = $request->input('address') ? $request->input('address') : null;
                }

                $request->session()->put('first_name', $request->input('first_name'));
                $request->session()->put('last_name', $request->input('last_name'));
                $request->session()->put('email', $request->input('email'));

                $user->save();
            }
            return redirect()->route('edit-user-profile')->with('success', 'User Profile Updated.');
        } else {
            return redirect()->route('dashboard')->with('failed', "Record not found");
        }
    }

    public function userChangePassword() {
        $data = [];
        $data['title'] = 'Change Password';
        $data['menu_active_tab'] = 'dashboard';
        if (\Auth::id()) {
            $user = User::where('id', \Auth::id())->first();
            if ($user) {
                $data['user'] = $user;
                return view('admin.user-change-password')->with($data);
            } else {
                return redirect()->route('dashboard')->with('failed', "Record not found");
            }
        } else {
            return redirect()->route('dashboard')->with('failed', "Record not found");
        }
    }

    public function userUpdatePassword(Request $request) {
        if (\Auth::id()) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
            ]);
            #Match The Old Password
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return back()->with("error", "Old Password Doesn't match!");
            }

            $user = User::find(\Auth::id());
            if ($user) {
                $user->password = bcrypt($request->get('new_password'));
                $user->save();
            }
            return redirect()->route('user-change-password')->with('success', 'User Password Updated.');
        } else {
            return redirect()->route('dashboard')->with('failed', "Record not found");
        }
    }

    public function forgotPassword() {
        $data = [];
        $data['title'] = 'Forgot Password';
        $data['menu_active_tab'] = '';
        try {
            return view('admin.forgot-password')->with($data);
        } catch (Exception $e) {
            return redirect()->route('login')->with('failed', "Record not found");
        }
    }

    public function forgotPasswordPost(Request $request) {
        try {
            $request->validate([
                'email' => 'required',
            ]);
            $email = $request->email;
            $user = User::select('id', 'first_name', 'last_name', 'email')->where('email', $email)->first();
            if ($user) {
                $name = $user->first_name . ' ' . $user->last_name;
                $token = Str::random(64);

                \App\Models\PasswordReset::where('email', $email)->delete();
                $password_reset = new \App\Models\PasswordReset;
                $password_reset->user_id = $user->id;
                $password_reset->email = $email;
                $password_reset->token = $token;
                $password_reset->save();

                return redirect()->route('forgot-password')->with('success', 'Email Send.');
            } else {
                return redirect()->route('forgot-password')->with('failed', "Record not found");
            }
        } catch (Exception $e) {
            return redirect()->route('forgot-password')->with('failed', "Record not found");
        }
    }

    public function resetPassword($token) {
        if ($token) {
            $user = \App\Models\PasswordReset::where('token', $token)->first();

            if (!$user) {
                \Session::flash('failed', 'Link already has been expired');
                return redirect()->route('login')->with('failed', "Link already has been expired");
            } else {
                $created_at_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('Y-m-d H:i:s');
                $current_date = strtotime(date("Y-m-d H:i:s"));
                $date = strtotime($created_at_date);
                $datediff = $current_date - $date;
                $difference = floor($datediff / (60 * 60 * 24));
                $email = $user->email;
                if ($difference == 0) {
                    return view('admin.reset-password', compact('token', 'email'));
                } else {
                    return redirect()->route('login')->with('failed', "Your verification link has expired. Please resend.");
                }
            }
        } else {
            return redirect()->route('login')->with('failed', 'Invalid link. Please try again.');
        }
    }

    public function resetPasswordPost(Request $request) {
        try {
            $request->validate([
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
            ]);
            $token = $request->token;
            $reset_password = \App\Models\PasswordReset::where('token', $token)->first();
            if (!$reset_password) {
                return redirect()->route('login')->with('failed', "User not found");
            } else {
                if ($reset_password->email != null) {
                    $user = User::where('email', $reset_password->email)
                            ->where('id', $reset_password->user_id)
                            ->first();
                    if ($user) {
                        $user->password = bcrypt($request->new_password);
                        $user->save();
                        \App\Models\PasswordReset::where('email', $reset_password->email)->delete();
                        return redirect()->route('login')->with('success', 'Password saved successfully.');
                    } else {
                        return redirect()->route('login')->with('failed', "Record not found");
                    }
                }
            }
        } catch (Exception $e) {
            return redirect()->route('login')->with('failed', "Record not found");
        }
    }

    public function saveResetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'password_confirm' => 'required',
        ]);

        $check_token = DB::table('password_resets')->where([
                    'email' => $request->email,
                    'token' => $request->token,
                ])->first();

        if (!$check_token) {
            return back()->withInput()->with('fail', 'Invalid token');
        } else {

            $user = User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();
            return redirect()->route('login')->with('info', 'Your password has been changed! You can login with new password');
        }
    }

    public function menuNotAccess() {
        try {
            $data = [];
            $data['title'] = 'Menu Not Access';
            $data['menu_title'] = 'Menu Not Access';
            $data['menu_active_tab'] = '';

            return view('admin.menu_not_access')->with($data);
        } catch (\Exception $e) {
            return json_encode(array('status' => false, 'message' => $e->getMessage()));
        }
    }

    public function checkUserMobileNoExists(Request $request) {
        $mobile_no = $request->input('mobile_no');
        $email = $request->input('email');
        if ($mobile_no || $email) {
            if (isset($request->user_id)) {
                $id = $request->input('user_id');
                $user_mobile_no = User::where('mobile_no', $mobile_no)->where('id', '!=', $id)->get();
                $user_mobile_no_count = $user_mobile_no->count();
                $user_email = User::where('email', $email)->where('id', '!=', $id)->get();
                $user_email_count = $user_email->count();

                if ($user_mobile_no_count > 0 && $user_email_count > 0) {
                    return json_encode(array('status' => false, 'message' => 'Email and Mobile no already exists.', 'mobile_err' => 'Mobile no already exists.', 'email_err' => 'Email already exists.'));
                }

                if ($user_mobile_no_count > 0) {
                    return json_encode(array('status' => false, 'message' => 'Mobile no already exists.', 'mobile_err' => 'Mobile no already exists.', 'email_err' => ''));
                }

                if ($user_email_count > 0) {
                    return json_encode(array('status' => false, 'message' => 'Email already exists.', 'mobile_err' => '', 'email_err' => 'Email already exists.'));
                }
            } else {
                $mobile_no = (int) $mobile_no;

                $user_mobile_no = User::where('mobile_no', $mobile_no)->get();
                $user_mobile_no_count = $user_mobile_no->count();

                $user_email = User::where('email', $email)->get();
                $user_email_count = $user_email->count();

                if ($user_mobile_no_count > 0 && $user_email_count > 0) {
                    return json_encode(array('status' => false, 'message' => 'Email and Mobile no already exists.', 'mobile_err' => 'Mobile no already exists.', 'email_err' => 'Email already exists.'));
                }

                if ($user_mobile_no_count > 0) {
                    return json_encode(array('status' => false, 'message' => 'Mobile no already exists.', 'mobile_err' => 'Mobile no already exists.', 'email_err' => ''));
                }

                if ($user_email_count > 0) {
                    return json_encode(array('status' => false, 'message' => 'Email already exists.', 'mobile_err' => '', 'email_err' => 'Email already exists.'));
                }

                return json_encode(array('status' => true, 'message' => ''));
            }
        } else {
            return json_encode(array('status' => true, 'message' => ''));
        }
    }

    public function aboutUs() {
        $data = [];
        $data['title'] = 'About Us';
        $data['menu_active_tab'] = 'about-us';

        return view('user.about_us')->with($data);
    }

    public function contactUs() {
        $data = [];
        $data['title'] = 'Contact Us';
        $data['menu_active_tab'] = 'contact-us';

        return view('user.contact_us')->with($data);
    }

    public function verifyUserProfile(Request $request,$id){
        $customer = Customer::find($id);
        $customer->customer_verification_status = 1;
        $customer->save();
        return back()->with("success", "User Verified Successfully!");
    }
}
