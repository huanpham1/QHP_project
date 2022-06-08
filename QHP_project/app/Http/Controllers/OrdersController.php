<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $orders;
    public function __construct()
    {
        $this->orders = new Orders();
    }

    public function index(Request $request){
        $title = 'Danh sách đơn hàng';

        $status = '';
        $dates = [];

        if (!empty($request->from_date)){
            $fromDate = $request->from_date;
            
            $arr = explode('-', $fromDate);

            $dates[] = ''.$arr[0].$arr[1].$arr[2];
        } else {
            $dates[] = '00000000';
        }

        if (!empty($request->to_date)){
            $toDate = $request->to_date;

            $arr = explode('-', $toDate);

            $dates[] = ''.$arr[0].$arr[1].$arr[2];
        } else {
            $dates[] = date('ymd');
        }

        if (!empty($request->status)){
            $status = $request->status;
        }

        if (!empty($request->keywords)){
            $keywords = $request->keywords;
        } else {
            $keywords = '';
        }

        $ordersList = $this->orders->getAllOrders($dates, $status, $keywords);

        return view('admin.orders.list', compact('title', 'ordersList'));
    }

    public function detail(Request $request, $id=0){
        $title = 'Chi tiết đơn hàng';

        if (!empty($id)){
            $orderDetail = $this->orders->getDetail($id);
            //Danh sách sản phẩm trong đơn hàng
            $productsList = $this->orders->getProductsInOrder($id);
            
            if (!empty($orderDetail[0])){
                $request->session()->put('id', $id);
                $orderDetail = $orderDetail[0];
            } else {
                return redirect()->route('orders.index')->with('msg', 'Chi tiết đơn hàng không tồn tại');
            }
        } else {
            return redirect()->route('orders.index')->with('msg', 'Liên kết không tồn tại');
        }

        return view('admin.orders.detail', compact('title', 'orderDetail', 'productsList'));
    }

    public function delete($id = 0){
        if (!empty($id)){
            $order = $this->orders->getDetail($id);

            if (!empty($order[0])){
                $status = $this->orders->deleteOrder($id);

                if ($status){
                    $msg = 'Xóa đơn hàng thành công';
                } else {
                    $msg = 'Bạn không thể xóa đơn hàng lúc này. Vui lòng thử lại sau';
                }
            } else {
                $msg = 'Đơn hàng không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('orders.index')->with('msg', $msg);
        
    }

    public function update(Request $request){
        $id = session('id');
        if (empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $updateData = [$request->status];
        $this->orders->updateStatus($updateData, $id);

        return back()->with('msg', 'Cập nhật trạng thái thành công');
    }
}
