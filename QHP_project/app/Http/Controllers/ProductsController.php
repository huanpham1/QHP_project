<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $products;
    public function __construct()
    {
        $this->products = new Products();
    }

    public function index(){
        $title = 'Danh sách sản phẩm';

        $productsList = $this->products->getAllProducts();

        return view('admin.products.list', compact('title', 'productsList'));
    }

    public function add(){
        $title = 'Thêm sản phẩm';

        $allDanhMuc = getAllDanhMuc();

        $allTheLoai = getAllTheLoai();
        
        return view('admin.products.add', compact('title', 'allDanhMuc', 'allTheLoai'));
    }

    public function handleAdd(Request $request){
        $request->validate([
            'productName' => 'required|unique:sanpham,TenSP',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'group_danhmuc' => ['required', 'integer',function($attribute, $value, $fail){
                if ($value == 0){
                    $fail('Bắt buộc phải chọn danh mục');
                }
            }],
            'group_theloai' => ['required', 'integer',function($attribute, $value, $fail){
                if ($value == 0){
                    $fail('Bắt buộc phải chọn thể loại');
                }
            }],
        ], [
            'productName.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'productName.unique' => "Tên sản phẩm đã tồn tại",
            'price.required' => "Giá bán bắt buộc phải nhập",
            'price.numeric' => "Giá bán phải là số",
            'description.required' => "Mô tả bắt buộc phải nhập",
            'image.required' => "Ảnh bắt buộc phải có",
            'image.mimes' => "Chỉ cho phép upload các file JPG, PNG và JPEG",
            'image.max' => "Kích thước file quá lớn",
            'group_danhmuc.required' => 'Danh mục không được để trống',
            'group_danhmuc.integer' => 'Danh mục không hợp lệ',
            'group_theloai.required' => 'Thể loại không được để trống',
            'group_theloai.integer' => 'Thể loại không hợp lệ',
        ]);

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        //$file->move('assets/images/', $fileName);
        $file->storeAs('public/products', $fileName);

        $dataInsert = [
            $request->productName,
            $request->price,
            $request->description,
            $fileName,
            $request->group_theloai,
            $request->group_danhmuc,
        ];
        $this->products->addProduct($dataInsert);

        return redirect(route('products.index'))->with('msg', 'Thêm sản phẩm thành công');
    }

    public function getEdit(Request $request, $id=0){
        $title = "Cập nhật sản phẩm";

        if (!empty($id)){
            $productDetail = $this->products->getDetail($id);
            if (!empty($productDetail[0])){

                $request->session()->put('id', $id);    //Lưu id vào 1 session để khi thực hiện cập nhật có thể lấy ra id
                $productDetail = $productDetail[0];
                
            } else {
                return redirect()->route('products.index')->with('msg', 'Sản phẩm không tồn tại');
            }
        } else {
            return redirect()->route('products.index')->with('msg', 'Liên kết không tồn tại');
        }

        $allDanhMuc = getAllDanhMuc();

        $allTheLoai = getAllTheLoai();

        return view('admin.products.edit', compact('title', 'productDetail', 'allDanhMuc', 'allTheLoai'));
    }

    public function handleEdit(Request $request){
        $id = session('id');
        if (empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }

        $request->validate([
            'productName' => 'required|unique:sanpham,TenSP,'.$id.',MaSP',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
            'group_danhmuc' => ['required', 'integer',function($attribute, $value, $fail){
                if ($value == 0){
                    $fail('Bắt buộc phải chọn danh mục');
                }
            }],
            'group_theloai' => ['required', 'integer',function($attribute, $value, $fail){
                if ($value == 0){
                    $fail('Bắt buộc phải chọn thể loại');
                }
            }],
        ], [
            'productName.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'productName.unique' => "Tên sản phẩm đã tồn tại",
            'price.required' => "Giá bán bắt buộc phải nhập",
            'price.numeric' => "Giá bán phải là số",
            'description.required' => "Mô tả bắt buộc phải nhập",
            'image.mimes' => "Chỉ cho phép upload các file JPG, PNG và JPEG",
            'image.max' => "Kích thước file quá lớn",
            'group_danhmuc.required' => 'Danh mục không được để trống',
            'group_danhmuc.integer' => 'Danh mục không hợp lệ',
            'group_theloai.required' => 'Thể loại không được để trống',
            'group_theloai.integer' => 'Thể loại không hợp lệ',
        ]);

        $product = $this->products->getDetail($id);
        $file = $request->image;
        if (!empty($file)){

            //Xóa ảnh cũ
            Storage::delete('public/products/'.$product[0]->HinhAnh);

            //Thêm ảnh mới
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            //$file->move('assets/images/', $fileName);
            $file->storeAs('public/products', $fileName);
        } else {
            $fileName = $product[0]->HinhAnh;
        }

        $dataUpdate = [
            $request->productName,
            $request->price,
            $request->description,
            $fileName,
            $request->group_theloai,
            $request->group_danhmuc,
        ];
        $this->products->updateProduct($dataUpdate, $id);

        return back()->with('msg', 'Cập nhật sản phẩm thành công');
    }

    public function delete($id = 0){
        if (!empty($id)){
            //Kiểm tra xem sản phẩm có tồn tại hay không
            $productDetail = $this->products->getDetail($id);
            if (!empty($productDetail[0])){
                //Xóa ảnh trong storage
                $imageStatus = Storage::delete('public/products/'.$productDetail[0]->HinhAnh);
                //Xóa toàn bộ sản phẩm
                $status = $this->products->deleteProduct($id);
                if ($status && $imageStatus){
                    $msg = 'Xóa sản phẩm thành công';
                } else {
                    $msg = 'Bạn không thể xóa sản phẩm lúc này. Vui lòng thử lại sau';
                }

            } else {
                $msg = 'Sản phẩm không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('products.index')->with('msg', $msg);
    }

}
