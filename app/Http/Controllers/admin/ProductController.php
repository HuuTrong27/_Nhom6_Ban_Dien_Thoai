<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Classes\Helper;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.product.';
        $this->index='product.index';
    }
    public function index()
    {
        $products = Product::paginate(5);
        return view($this->viewprefix.'index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view($this->viewprefix.'create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => 'required',
            'price' => 'required',
            'description'=>'required',
            'baohanh'=>'required',
            'new'=>'required',
            'trangthai'=>'required',
            'discount' => 'required',
            'content' => 'required',
            'idcat' => 'required',
        ]);
        $data['image'] = Helper::imageUpload($request);
        if(Product::create( $data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::all();
        $category = Category::all();
        return view($this->viewprefix.'edit',compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validate form data
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'baohanh' => 'required',
            'new' => 'required',
            'trangthai' => 'required',
            'discount' => 'required',
            'content' => 'required',
            'idcat' => 'required',
        ]);
    
        // Kiểm tra xem có hình ảnh mới được tải lên không
        if ($request->hasFile('image')) {
            // Xử lý tải lên hình ảnh mới và lưu vào thư mục lưu trữ
            $data['image'] = $this->imageUpload($request);
        } else {
            // Nếu không có hình ảnh mới, sử dụng hình ảnh cũ của sản phẩm
            $data['image'] = $product->image;
        }
    
        // Cập nhật sản phẩm với dữ liệu mới
        if ($product->update($data)) {
            Session::flash('message', 'successfully!');
        } else {
            Session::flash('message', 'Failure!');
        }
    
        // Chuyển hướng về trang danh sách sản phẩm sau khi cập nhật
        return redirect()->route($this->index);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route($this->index);
    }

    public function imageUpload(Request $request)
    {
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                return $imageName;
            }
        }
        return "";
    }
}
