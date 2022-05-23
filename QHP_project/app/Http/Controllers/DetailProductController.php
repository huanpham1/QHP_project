<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DetailProduct;

class DetailProductController extends Controller
{
    private $product;
    public function __construct()
    {
        $this->product = new DetailProduct();
    }

    public function index(Request $request, $id){
        $title = 'Chi tiết sản phẩm';

        //$request->session()->put('id', $id);

        $detailList = $this->product->getAllDetail($id);

        return view('admin.productDetails.list', compact('title', 'id', 'detailList'));
    }

    public function add($id){
        $title = 'Thêm size';

        return view('admin.productDetails.add', compact('title', 'id'));
    }

    public function handleAdd(Request $request, $id){

        $request->validate([
            'size' => 'required|regex:/^[0-9]{2}$/|unique:chitietsanpham,Size',
            'quantity' => 'required|regex:/^[0-9]+$/',
        ], [
            'size.required' => 'Size không được để trống',
            'size.regex' => 'Size phải có 2 chữ số',
            'size.unique'=> 'Size của sản phẩm đã tồn tại',
            'quantity.required' => 'Số lượng còn không được để trống',
            'quantity.regex' => 'Số lượng còn phải là số',
        ]);

        $productID = $id < 9 ? '0'.$id : $id;
        $numberOfSize = count($this->product->getAllDetail($id)) + 1;
        if ($numberOfSize < 9){
            $numberOfSize = '0'.$numberOfSize;
        }
        $chiTietID = 'CTSP' . $productID . $numberOfSize;

        $dataInsert = [
            $chiTietID,
            $request->size,
            $request->quantity,
            $id,
        ];
        $this->product->addDetailProduct($dataInsert);

        return redirect(route('products.details.index', $id))->with('msg', 'Thêm size thành công');
    }

    public function getEdit(Request $request, $id, $detailID=0){
        $title = 'Cập nhật size';

        if (!empty($detailID)){
            $productDetail = $this->product->getDetailProduct($detailID);
            if (!empty($productDetail[0])){

                $request->session()->put('detailID', $detailID);    //Lưu id vào 1 session để khi thực hiện cập nhật có thể lấy ra id
                $productDetail = $productDetail[0];
                
            } else {
                return redirect()->route('products.details.index', $id)->with('msg', 'Chi tiết sản phẩm không tồn tại');
            }
        } else {
            return redirect()->route('products.details.index', $id)->with('msg', 'Liên kết không tồn tại');
        }

        return view('admin.productDetails.edit', compact('title', 'productDetail', 'id'));
    }

    public function handleEdit(Request $request, $id){
        $detailID = session('detailID');
        if (empty($detailID)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }

        $request->validate([
            'size' => 'required|regex:/^[0-9]{2}$/|unique:chitietsanpham,Size,'.$detailID.',ChiTietSPID',
            'quantity' => 'required|regex:/^[0-9]+$/',
        ], [
            'size.required' => 'Size không được để trống',
            'size.regex' => 'Size phải có 2 chữ số',
            'size.unique'=> 'Size của sản phẩm đã tồn tại',
            'quantity.required' => 'Số lượng còn không được để trống',
            'quantity.regex' => 'Số lượng còn phải là số',
        ]);
        $productID = $id < 9 ? '0'.$id : $id;
        $numberOfSize = count($this->product->getAllDetail($id)) + 1;
        if ($numberOfSize < 9){
            $numberOfSize = '0'.$numberOfSize;
        }
        $chiTietID = 'CTSP' . $productID . $numberOfSize;

        $dataUpdate = [
            $request->size,
            $request->quantity,
        ];
        $this->product->updateDetailProduct($dataUpdate, $detailID);

        return back()->with('msg', 'Cập nhật size thành công');
    }

    public function delete($id, $detailID=0){
        if (!empty($detailID)){
            //Kiểm tra xem sản phẩm có tồn tại hay không
            $productDetail = $this->product->getDetailProduct($detailID);
            if (!empty($productDetail[0])){
                
                $status = $this->product->deleteDetailProduct($detailID);
                if ($status){
                    $msg = 'Xóa chi tiết sản phẩm thành công';
                } else {
                    $msg = 'Bạn không thể xóa chi tiết sản phẩm lúc này. Vui lòng thử lại sau';
                }

            } else {
                $msg = 'Chi tiết sản phẩm không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('products.details.index', $id)->with('msg', $msg);
    }
}
