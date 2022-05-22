<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XemTheLoai extends Controller
{
    //Action index
    public function index(){
        return view('XemTheLoai');
    }
    public function getAllSanPham(){       
        // Câu truy vấn lấy tất cả sinh viên
        $sql = "select * from sanpham";
        
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        
        // Mảng chứa kết quả
        $result = array();
        
        // Lặp qua từng record và đưa vào biến kết quả
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        // Trả kết quả về
        return $result;
    }
    public function getSP_TheLoai($id){
        // Gọi tới biến toàn cục $conn
        global $conn;
        
        // Hàm kết nối
        connect_db();
        
        // Câu truy vấn lấy san pham theo id
        $sql = "select * from sanpham where MaTheLoai = {$id}";
        
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        
        // Mảng chứa kết quả
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        
        return $result;
    }
    public function getAllTheLoai(){
        // Gọi tới biến toàn cục $conn
        global $conn;
        
        // Hàm kết nối
        connect_db();
        
        // Câu truy vấn lấy tất cả sinh viên
        $sql = "select * from theloai";
        
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        
        // Mảng chứa kết quả
        $result = array();
        
        // Lặp qua từng record và đưa vào biến kết quả
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        // Trả kết quả về
        return $result;
    }
    public function getAllDanhMuc(){
        // Gọi tới biến toàn cục $conn
        global $conn;
        
        // Hàm kết nối
        connect_db();
        
        // Câu truy vấn lấy tất cả sinh viên
        $sql = "select * from danhmuc";
        
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        
        // Mảng chứa kết quả
        $result = array();
        
        // Lặp qua từng record và đưa vào biến kết quả
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        // Trả kết quả về
        return $result;
    }
}
