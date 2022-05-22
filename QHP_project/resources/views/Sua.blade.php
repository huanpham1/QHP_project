<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "qhp_project";
    $conn;
    function connect_db(){
        global $conn,$servername,$username,$password,$database;
        if(!$conn){
            $conn = mysqli_connect($servername,$username,$password,$database) or die("Khong the ket noi may chu");
        }
    }
    function disconnect_db(){
        global $conn;
        if($conn){
            mysqli_close($conn);
        }
    }
    function suaThongTinKH($MaTK,$HoVaTen,$NgaySinh,$Email,$DiaChi,$SoDT){
        global $conn;
        connect_db();
        $sql = "update taikhoan set HoVaTen = {$HoVaTen},NgaySinh = {$NgaySinh},Email = {$Email},DiaChi = {$DiaChi},SoDT = {$SoDT} where MaTK = {$MaTK}";
        $query = mysqli_query($conn,$sql);
        disconnect_db();
        return $query;
    }
?>