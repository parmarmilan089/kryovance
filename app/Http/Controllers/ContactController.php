<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Feedback;
class ContactController extends Controller
{
    public function contactList() {
        $data = [];
        $data['title'] = 'Contact Form List';
        $data['menu_active_tab'] = 'contact-form-list';
        return view('admin.contact-form.list')->with($data);
    }
    public function jsonContact(Request $request) {
        $list = \App\Models\Feedback::select('feedback.id',
                        'feedback.name',
                        'feedback.created_at',
                        'feedback.updated_at'
                )
                ->orderBy('feedback.id', 'ASC')
                ->get();
        return DataTables::of($list)
                        ->addColumn('action', function ($category) {
                            $div_start = '<div class="">';
                            $edit_btn = '<a href="' . route('view-contact', $category->id) . '" data-id="' . $category->id . '" class="mx-1"><i class="bx bx-file-find"></i></i></a>';
                            // $deleteBtn = '<a href="#" data-id="' . $category->id . '" class="mx-1 btnDelete"><i class="bx bxs-trash-alt"></i></a>';
                            $div_end = '</div>';
                            return $div_start . $edit_btn . $div_end;
                        })
                        ->rawColumns(['action'])->addIndexColumn()
                        ->make(true);
    }
    public function viewContact(Request $request, $id) {
        $data = [];
        $data['title'] = 'View Contact-form';
        $data['menu_active_tab'] = 'Contact-form-list';
        if ($id) {
            $feedback = Feedback::find($id);
            if ($feedback) {
                $data['feedback'] = $feedback;
                return view('admin.contact-form.view')->with($data);
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } else {
            echo json_encode(array("status" => false, 'message' => 'Record not found.'));
        }
    }
}