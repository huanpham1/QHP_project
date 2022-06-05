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

    public function index(){
        $title = 'Danh sách đơn hàng';

        $ordersList = $this->orders->getAllOrders();

        return view('admin.orders.list', compact('title', 'ordersList'));
    }

    public function detail($id){
        $title = 'Chi tiết đơn hàng';

        if (!empty($id)){
            $orderDetail = $this->orders->getDetail($id);
            //Danh sách sản phẩm trong đơn hàng
            $productsList = $this->orders->getProductsInOrder($id);
            
            if (!empty($orderDetail[0])){
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
}
