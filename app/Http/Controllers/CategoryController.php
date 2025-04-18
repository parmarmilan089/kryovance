<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use View;
use Yajra\DataTables\DataTables;
use DB;

class CategoryController extends Controller {

    public function categoryList() {
        $data = [];
        $data['title'] = 'Category List';
        $data['menu_active_tab'] = 'category-list';

        return view('admin.category.list')->with($data);
    }

    public function jsonCategory(Request $request) {
        $list = \App\Models\Category::select('category.id',
                        'category.name',
                        'category.is_deleted',
                        'category.created_at',
                        'category.updated_at'
                )
                ->where('category.is_deleted', '0')
                ->orderBy('category.id', 'ASC')
                ->get();
        return DataTables::of($list)
                        ->addColumn('action', function ($category) {
                            $div_start = '<div class="">';
                            $edit_btn = '<a href="' . route('edit-category', $category->id) . '" data-id="' . $category->id . '" class="mx-1"><i class="bx bxs-edit"></i></i></a>';
                            $deleteBtn = '<a href="#" data-id="' . $category->id . '" class="mx-1 btnDelete"><i class="bx bxs-trash-alt"></i></a>';
                            $div_end = '</div>';
                            return $div_start . $edit_btn . $deleteBtn . $div_end;
                        })
                        ->rawColumns(['action'])->addIndexColumn()
                        ->make(true);
    }

    public function addCategory() {
        $data = [];
        $data['title'] = 'Add Category';
        $data['menu_active_tab'] = 'category-list';

        return view('admin.category.add')->with($data);
    }

    public function storeCategory(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $category = new \App\Models\Category;
            $category->name = $request->input('name') ? $request->input('name') : null;
            $category->created_by_id = \Auth::user()->id ? \Auth::user()->id : null;
            $category->save();

            return redirect()->route('category-list')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
            return json_encode(array('status' => false, 'msg' => $e->getMessage()));
        }
    }

    public function deleteCategory(Request $request) {
        $id = $request->input('delete_id');
        try {
            if ($id) {
                $category = Category::find($id);
                if ($category) {
                    $category->is_deleted = '1';
                    $category->updated_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                    $category->save();
                }
                echo json_encode(array("status" => true, 'message' => 'Record deleted.'));
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => getErrorMessageByCode('ER1')]);
        }
    }

    public function editCategory(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Category';
        $data['menu_active_tab'] = 'category-list';
        if ($id) {
            $category = Category::find($id);
            if ($category) {
                $data['category'] = $category;
                return view('admin.category.edit')->with($data);
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } else {
            echo json_encode(array("status" => false, 'message' => 'Record not found.'));
        }
    }

    public function updateCategory(Request $request) {
        $id = $request->input('category_id') ? $request->input('category_id') : null;
        if ($id) {
            $request->validate([
                'name' => 'required',
            ]);
            $category = Category::find($id);
            if ($category) {
                $category->name = $request->input('name') ? $request->input('name') : null;

                $category->updated_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $category->save();
            }

            return redirect()->route('category-list')->with('success', 'Record Updated.');
        } else {
            return json_encode(['status' => false, 'message' => 'Record not found']);
        }
    }

}
