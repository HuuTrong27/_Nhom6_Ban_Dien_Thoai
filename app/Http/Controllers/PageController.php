<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Slide;
use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Customer;
use App\Models\User;
use App\Models\Cart;
use App\Models\NguoiDung;
use App\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;

class PageController extends Controller
{
    //
    public function getIndex(){
        $new_product = Product::where('new',1)->orderBy('id','desc')->paginate(8);
        $sanpham_khuyenmai = Product::where('discount','<>',0)->paginate(4);
        return view('users.page.trangchu',compact('new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where('idcat',$type)->get();
        $sp_khac = Product::where('idcat','<>',$type)->paginate(3);
        $loai = Category::all();
        $loai_sp = Category::where('id',$type)->first();
    	return view('users.page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    public function getChitiet(Request $req,$id){
        $sanpham = Product::where('id',$req->id)->first();
        $data=Comment::where('id_com',$id)->get();
        $sp_tuongtu = Product::where('idcat',$sanpham->id_type)->paginate(6);
    	return view('users.page.chitiet_sanpham',compact('sanpham','sp_tuongtu','data'));
    }


    public function postComment(Request $request,$id)
    {
       $comment=new Comment;
       $comment->name=$request->name;
       $comment->email=$request->email;
       $comment->content=$request->content;
       $comment->id_com=$id;
       $comment->save();
       return back();
    }
    public function getLienHe(){
    	return view('users.page.lienhe');
    }

    public function getGioiThieu(){
    	return view('users.page.gioithieu');
    }

    public function getGioHang(){
        return view('users.page.giohang');
    }
    public function getLogin()
    {
        return view('users.page.dangnhap');
    }
    public function getSignin(){
        return view('users.page.dangky');
    }

    public function getAddtoCart(Request $req, $id){
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập trước khi thêm sản phẩm vào giỏ hàng.');
        }

        // Người dùng đã đăng nhập, tiếp tục thêm sản phẩm vào giỏ hàng
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    } 


    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('users.page.dat_hang');
    }


//Đặt hàng, xem đơn hàng
public function postCheckout(Request $req) {
    // Lấy giỏ hàng từ session
    $cart = Session::get('cart');

    // Kiểm tra nếu không có sản phẩm trong giỏ hàng
    if (!$cart || $cart->totalQty === 0) {
        return redirect()->back()->with('error', 'Không có sản phẩm trong giỏ hàng.');
    }

    // Lấy email của người dùng đang đăng nhập
    $loggedInUserEmail = Auth::user()->email;

    // Kiểm tra nếu email nhập vào không giống với email của tài khoản đăng nhập
    if ($req->email !== $loggedInUserEmail) {
        return redirect()->back()->with('error', 'Email không đúng!!!.');
    }

    // Kiểm tra xem khách hàng có tồn tại trong cơ sở dữ liệu hay không
    $existingCustomer = Customer::where('email', $req->email)->first();

    if ($existingCustomer) {
        // Nếu khách hàng đã tồn tại, có thể cập nhật thông tin
        $customer = $existingCustomer;
    } else {
        // Nếu không, tạo một khách hàng mới
        $customer = new Customer;
        $customer->email = $req->email;
    }

    // Cập nhật hoặc gán thông tin cho khách hàng
    $customer->name = $req->name;
    $customer->gender = $req->gender;
    $customer->address = $req->address;
    $customer->phone_number = $req->phone;
    $customer->note = $req->notes;
    $customer->save();

    // Tạo hóa đơn
    $bill = new Bill;
    $bill->id_customer = $customer->id;
    $bill->date_order = now(); // lấy thời gian hiện tại 
    $bill->total = $cart->totalPrice;
    $bill->payment = $req->payment_method;
    $bill->note = $req->notes;
    $bill->save();

    // Tạo chi tiết hóa đơn
    foreach ($cart->items as $key => $value) {
        $bill_detail = new Bill_detail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_products = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->price = ($value['price'] / $value['qty']);
        $bill_detail->save();
    }

    // Xóa giỏ hàng sau khi đã đặt hàng thành công
    Session::forget('cart');

    return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
}


//Tìm kiếm
public function getSearch(Request $request){
    $product=Product::where('name','like','%'.$request->key.'%')
   ->orWhere('price',$request->key)->get();
    return view('users.page.search',compact('product'));

}
    public function postSignin(Request $req){
        $this->validate($req,
            [   'diachi'=>'required',
                'dienthoai'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->dienthoai = $req->dienthoai;
        $user->diachi = $req->diachi;
        $user->level = 1; // Đặt mức mặc định là 1
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogin(Request $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            //'trangthai'   =>"active"
        ];
        if (Auth::attempt($login)) {
            return redirect('/')->with('name');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }

    }
    public function postLogout(){
        // Xóa giỏ hàng khỏi session
        Session::forget('cart');
        
        // Đăng xuất người dùng
        Auth::logout();
        
        // Chuyển hướng về trang chủ
        return redirect()->route('trang-chu');
    }
    

    // public function getDonHang()
    // {
    //     $donhang =Customer::all();
    //     $hd=Bill_detail::all();
    //     return view('users.page.donhang',compact('donhang','hd'));
    // }
    public function getDonHang()
{
    // Xác thực người dùng đã đăng nhập
    if (Auth::check()) {
        // Lấy ID của người dùng hiện tại
        $userId = Auth::id();

        // Lấy danh sách đơn hàng của người dùng hiện tại
        $donhang = Customer::where('id', $userId)->get();

        // Lấy chi tiết đơn hàng
        $billDetails = Bill_detail::all();

        // Hiển thị trang với danh sách đơn hàng
        return view('users.page.donhang', compact('donhang', 'billDetails'));
    } else {
        // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        return redirect()->route('login');
    }
}

}
