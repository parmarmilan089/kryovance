<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Inventory;
use Illuminate\Support\Str;
use Mail;
use View;
use Yajra\DataTables\DataTables;

class ProductController extends Controller {

    public function productList() {
        $data = [];
        $data['title'] = 'Product List';
        $data['menu_active_tab'] = 'product-list';

        return view('admin.product.list')->with($data);
    }

    public function jsonProduct(Request $request) {
        $product_list = Product::select('products.id',
                        'products.name',
                        'products.model_no',
                        'products.price',
                        'products.brand',
                        'products.product_added_date',
                        'products.created_by_id',
                        'products.updated_by_id',
                        'products.manufacture_date',
                        'products.is_deleted',
                        'products.country',
                        'products.created_at',
                        'products.updated_at',
                        'product_images.file_path'
                )
                ->leftJoin(DB::raw('(SELECT MIN(id) as id, product_id FROM product_images GROUP BY product_id) as file_path'), function($join) {
                    $join->on('products.id', '=', 'file_path.product_id');
                })
                ->leftJoin('product_images', 'product_images.id', '=', 'file_path.id')
                ->where('products.is_deleted', '0')
                ->orderBy('products.id', 'ASC')
                ->get();
        return DataTables::of($product_list)
                        ->editColumn('title', function ($product) {
                            $title_str = (strlen($product->title) > 60) ? getMbSubstr($product->title, 0, 57) : $product->title;
                            return $title_str;
                        })
                        ->addColumn('image', function ($product) {
                            if ($product->file_path) {
                                $imageUrl = asset('storage/'. $product->file_path); // Adjust path as per your setup
                                return '<img src="' . $imageUrl . '" alt="Product Image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">';
                            } else {
                                return '<span class="text-muted">No Image</span>';
                            }
                        })
                        ->addColumn('action', function ($product) {
                            $div_start = '<div class="">';
                            $editBtn = '<a href="' . route('edit-product', $product->id) . '" data-id="' . $product->id . '" class="mx-1 btnEdit"><i class="bx bxs-edit"></i></a>';
                            $deleteBtn = '<a href="#" data-id="' . $product->id . '" class="mx-1 btnDelete"><i class="bx bxs-trash-alt"></i></a>';
                            $div_end = '</div>';
                            return $div_start . $editBtn . $deleteBtn . $div_end;
                        })
                        ->rawColumns(['image','action'])->addIndexColumn()
                        ->make(true);
    }

    public function addProduct() {
        $data = [];
        $data['title'] = 'Add Product';
        $data['menu_active_tab'] = 'product-list';
        $category_list = \App\Models\Category::where('is_deleted', '0')->orderBy('id', 'DESC')->get();
        $data['category_list'] = $category_list;

        return view('admin.product.add')->with($data);
    }

    public function storeProduct(Request $request) {
        $request->validate([
            'name' => 'required',
            'country' => 'nullable|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $product = new Product;
            $product->name = $request->input('name') ? $request->input('name') : null;
            $product->description = $request->input('description') ? $request->input('description') : null;
            $product->model_no = $request->input('model_no') ? $request->input('model_no') : null;
            $product->category_id = $request->input('category_id') ? $request->input('category_id') : null;
            $product->inventory_id = $request->input('inventory_id') ? $request->input('inventory_id') : null;
            $product->price = $request->input('price') ? $request->input('price') : null;
            $product->sku = $request->input('sku') ? $request->input('sku') : null;
            $product->brand = $request->input('brand') ? $request->input('brand') : null;
            $product->mrp = $request->input('mrp') ? $request->input('mrp') : null;
            $product->manufacture_date = $request->input('manufacture_date') ? $request->input('manufacture_date') : null;
            $product->expiry_date = $request->input('expiry_date') ? $request->input('expiry_date') : null;
            $file_name = null;
            $file_path = null;

            $product->product_added_date = date('Y-m-d H:i:s');
            $product->country = $request->input('country') ? $request->input('country') : null;
            $product->created_by_id = \Auth::user()->id ? \Auth::user()->id : null;
            $product->save();
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                if ($file->isValid()) {
                        $fileName = 'image_' . time() . '_' . uniqid() . '.' . strtolower($file->getClientOriginalExtension());
                        $filePath = $file->storeAs('product_image', $fileName, 'public');
                        ProductImage::create([
                            'product_id' => $product->id,
                            'file_name' => $fileName,
                            'file_path' => $filePath,
                        ]);
                    }
                }
            }

            return redirect()->route('product-list')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
            return json_encode(array('status' => false, 'msg' => $e->getMessage()));
        }
    }

    public function deleteProduct(Request $request) {
        $id = $request->input('delete_id');
        try {
            if ($id) {
                $product = Product::find($id);
                if ($product) {
                    $product->is_deleted = '1';
                    $product->updated_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                    $product->save();
                }
                echo json_encode(array("status" => true, 'message' => 'Record deleted.'));
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => getErrorMessageByCode('ER1')]);
        }
    }

    public function viewProduct(Request $request, $id) {
        $data = [];
        $data['title'] = 'View Product';
        $data['menu_active_tab'] = 'product-list';
        if ($id) {

            $product = Product::select('products.id',
                            'products.title',
                            'products.product_tag_id',
                            'products.date',
                            'products.image',
                            'products.image_path',
                            'products.description',
                            'products.country_id',
                            'products.status',
                            'products.created_by_id',
                            'products.updated_by_id',
                            'products.is_deleted',
                            'products.created_at',
                            'products.updated_at',
                            'product_tag.title as product_tag_title',
                            'product_tag.image as product_tag_image',
                            'product_tag.image_path as product_tag_image_path'
                    )
                    ->LeftJoin('product_tag', 'products.product_tag_id', '=', 'product_tag.id')
                    ->where('products.is_deleted', '0')
                    ->where('products.id', $id)
                    ->orderBy('products.id', 'ASC')
                    ->first();
            if ($product) {
                $data['product'] = $product;
                return view('admin.product.view')->with($data);
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } else {
            echo json_encode(array("status" => false, 'message' => 'Record not found.'));
        }
    }

    public function editProduct(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Product';
        $data['menu_active_tab'] = 'product-list';
        if ($id) {
            $product = Product::find($id);
            if ($product) {
                $data['product'] = $product;
                $category_list = \App\Models\Category::where('is_deleted', '0')->orderBy('id', 'DESC')->get();
                $data['category_list'] = $category_list;
                $data['inventories'] = Inventory::where('category_id',$product->category_id)->get();
                $data['product_images'] = ProductImage::where('product_id',$product->id)->get();
                return view('admin.product.edit')->with($data);
            } else {
                echo json_encode(array("status" => false, 'message' => 'Record not found.'));
            }
        } else {
            echo json_encode(array("status" => false, 'message' => 'Record not found.'));
        }
    }

    public function updateProduct(Request $request) {
        $id = $request->input('product_id') ? $request->input('product_id') : null;
        if ($id) {
            $request->validate([
                'name' => 'required',
                'country' => 'nullable|string',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $product = Product::find($id);
            if ($product) {
                $product->name = $request->input('name') ? $request->input('name') : null;
                $product->description = $request->input('description') ? $request->input('description') : null;
                $product->model_no = $request->input('model_no') ? $request->input('model_no') : null;
                $product->category_id = $request->input('category_id') ? $request->input('category_id') : null;
                $product->inventory_id = $request->input('inventory_id') ? $request->input('inventory_id') : null;
                $product->price = $request->input('price') ? $request->input('price') : null;
                $product->sku = $request->input('sku') ? $request->input('sku') : null;
                $product->brand = $request->input('brand') ? $request->input('brand') : null;
                $product->mrp = $request->input('mrp') ? $request->input('mrp') : null;
                $product->manufacture_date = $request->input('manufacture_date') ? $request->input('manufacture_date') : null;
                $product->expiry_date = $request->input('expiry_date') ? $request->input('expiry_date') : null;
                $product->country = $request->input('country') ? $request->input('country') : null;

                // Handle image deletions
                if ($request->filled('deleted_images')) {
                    $deletedImages = json_decode($request->deleted_images, true);

                    // Delete from storage and database
                    foreach ($deletedImages as $imageId) {
                        $image = ProductImage::find($imageId);
                        if ($image) {
                            Storage::disk('public')->delete($image->file_path);
                            $image->delete();
                        }
                    }
                }

                // Handle new image uploads (multiple)
                if ($request->hasFile('image')) {
                    foreach ($request->file('image') as $file) {
                        if ($file->isValid()) {
                            $fileName = 'image_' . time() . '_' . uniqid() . '.' . strtolower($file->getClientOriginalExtension());
                            $filePath = $file->storeAs('product_image', $fileName, 'public');

                            ProductImage::create([
                                'product_id' => $product->id,
                                'file_name' => $fileName,
                                'file_path' => $filePath,
                            ]);
                        }
                    }
                }

                $product->updated_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $product->save();
            }

            return redirect()->route('product-list')->with('success', 'Record Updated.');
        } else {
            return json_encode(['status' => false, 'message' => 'Record not found']);
        }
    }

    public function changeProductStatus(Request $request) {
        $id = $request->input('id');
        $data_status = $request->input('data_status');
        if ($id) {
            $product = Product::find($id);
            if ($product) {
                $product->status = $data_status;
                $product->updated_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $product->save();
            }
            echo json_encode(array("status" => true, 'message' => 'Status changed.'));
        } else {
            echo json_encode(array("status" => false, 'message' => 'Record not found.'));
        }
    }

    public function addNewProductImg(Request $request) {
        try {
            $product_id = $request->product_id;
            $file_name = null;
            $file_path = null;
            $session_product_image_id = array();
            if (\Session::has('product_image_id_arr')) {
                $session_product_image_id = \Session::get('product_image_id_arr');
            }

            for ($x = 0; $x < $request->product_image_length; $x++) {
                if ($request->hasFile('images' . $x)) {
                    $file = $request->file('images' . $x);
                    $original_file_name = $file->getClientOriginalName();

                    $file_name = 'image_' . $x . time() . '.' . $file->extension();
                    $file_path = $file->storeAs('product_image', $file_name, 'public');

                    $product_image = new \App\Models\ProductImage;
                    $product_image->product_id = $product_id;
                    $product_image->original_image = $original_file_name;
                    $product_image->image = $file_name;
                    $product_image->image_path = $file_path;
                    $res = $product_image->save();
                    if ($product_image->id) {
                        array_push($session_product_image_id, $product_image->id);
                    }
                }
            }
            $product_image_list = \App\Models\ProductImage::whereIn('id', $session_product_image_id)->where('is_deleted', '0')->orderBy('id', 'DESC')->get();
            if ($product_image_list) {
                $product_image_arr = $product_image_list->toArray();
                $product_image_id_arr = array_column($product_image_arr, 'id');
                session()->put('product_image_id_arr', $product_image_id_arr);
            }

            $html = View::make('admin.product.add-product-image-view', [
                        'product_id' => $product_id,
                        'product_image' => $product_image_list,
                    ])->render();
            return json_encode(array('status' => true, 'msg' => 'Product Image uploaded successfully.', 'html' => $html));
        } catch (\Exception $e) {
            return json_encode(array('status' => false, 'msg' => $e->getMessage()));
        }
    }

    public function deleteNewProductImg(Request $request) {
        $id = $request->input('delete_image_id');
        $product_id = $request->input('product_id');

        if ($id) {
            $session_content_slider_image_id = array();
            if (\Session::has('product_image_id_arr')) {
                $session_content_slider_image_id = \Session::get('product_image_id_arr');
            }
            $product_image = \App\Models\ProductImage::find($id);
            if ($product_image) {
                $product_image->is_deleted = '1';
                $product_image->save();
                if (($key = array_search($id, $session_content_slider_image_id)) !== false) {
                    unset($session_content_slider_image_id[$key]);
                }
                session()->put('product_image_id_arr', $session_content_slider_image_id);
            }
            $product_image_list = \App\Models\ProductImage::whereIn('id', $session_content_slider_image_id)->where('is_deleted', '0')->orderBy('id', 'DESC')->get();

            $html = View::make('admin.product.add-product-image-view', [
                        'product_id' => $product_id,
                        'product_image' => $product_image_list,
                    ])->render();
            return json_encode(array('status' => true, 'msg' => 'Slider Image deleted successfully.', 'html' => $html));
        } else {
            return json_encode(array('status' => false, 'msg' => 'Slider Image not delete.'));
        }
    }

    public function deleteEditProductImg(Request $request) {
        $id = $request->input('delete_image_id');
        $product_id = $request->input('product_id');
        if ($id) {
            $product_image = \App\Models\ProductImage::find($id);
            if ($product_image) {
                $product_image->is_deleted = '1';
                $product_image->save();
            }
            $product_image_list = \App\Models\ProductImage::where('product_id', $product_id)->where('is_deleted', '0')->orderBy('id', 'DESC')->get();
            $html = View::make('admin.product.add-product-image-view', [
                        'product_id' => $product_id,
                        'product_image' => $product_image_list,
                    ])->render();
            return json_encode(array('status' => true, 'msg' => 'Slider Image deleted successfully.', 'html' => $html));
        } else {
            return json_encode(array('status' => false, 'msg' => 'Slider Image not delete.'));
        }
    }

    public function addEditProductImg(Request $request) {
        try {
            $product_id = $request->product_id;
            $file_name = null;
            $file_path = null;
            if ($product_id) {
                for ($x = 0; $x < $request->product_image_length; $x++) {
                    if ($request->hasFile('images' . $x)) {
                        $file = $request->file('images' . $x);
                        $original_file_name = $file->getClientOriginalName();

                        $file_name = 'image_' . $x . time() . '.' . $file->extension();
                        $file_path = $file->storeAs('product_image', $file_name, 'public');

                        $product_image = new \App\Models\ProductImage;
                        $product_image->product_id = $product_id;
                        $product_image->original_image = $original_file_name;
                        $product_image->image = $file_name;
                        $product_image->image_path = $file_path;
                        $res = $product_image->save();
                    }
                }
                $product_image_list = \App\Models\ProductImage::where('product_id', $product_id)->where('is_deleted', '0')->orderBy('id', 'DESC')->get();
                $html = View::make('admin.product.add-product-image-view', [
                            'product_id' => $product_id,
                            'product_image' => $product_image_list,
                        ])->render();
                return json_encode(array('status' => true, 'msg' => 'Product Image uploaded successfully.', 'html' => $html));
            } else {
                return json_encode(array('status' => true, 'msg' => 'Record not founc', 'html' => ''));
            }
        } catch (\Exception $e) {
            return json_encode(array('status' => false, 'msg' => $e->getMessage()));
        }
    }

}
