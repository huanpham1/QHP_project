<?php
    global $conn;
 
    // Hàm kết nối database
    function connect_db()
    {
        // Gọi tới biến toàn cục $conn
        global $conn;
        $servername = "localhost";
        $database = "qhp_project";
        $username = "root";
        $password = "";
         
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$conn){
            $conn = mysqli_connect($servername,$username , $password, $database) or die ('Cant not connect to database');
            // Thiết lập font chữ kết nối
            mysqli_set_charset($conn, 'utf8');
        }
    }
    // Hàm ngắt kết nối
    function disconnect_db()
    {
        // Gọi tới biến toàn cục $conn
        global $conn;
        
        // Nếu đã kêt nối thì thực hiện ngắt kết nối
        if ($conn){
            mysqli_close($conn);
        }
    }
    function getAllTheLoai(){
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
    function getAllSanPham_Nu(){
        // Gọi tới biến toàn cục $conn
        global $conn;
        
        // Hàm kết nối
        connect_db();
        
        // Câu truy vấn lấy tất cả sinh viên
        $sql = "select * from sanpham where MaDanhMuc = 2";
        
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
    function getAllSanPham_Nam(){
        // Gọi tới biến toàn cục $conn
        global $conn;
        
        // Hàm kết nối
        connect_db();
        
        // Câu truy vấn lấy tất cả sinh viên
        $sql = "select * from sanpham where MaDanhMuc = 1";
        
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
    function getAllDanhMuc(){
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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/stylehome.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giày QHP</title>
</head>
<body>
    <header>
        <div class="htren">
            <div class="hotline"><p>Hotline: 0987666666</p></div>
            <div class="checking-order"><a href="#">Kiểm tra đơn hàng</a></div>
            <div class="login">
                <a href="/dangNhap">Log in <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                <pre>|</pre>
                <a href="/dangKy">Register <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
            </div>
        </div>
        <div class="hduoi">
            <a href="../"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"> <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
            <nav>
                <ul>
                    <li><a href="#">About us</a></li>
                    <?php foreach(getAllDanhMuc() as $datadm){ ?>
                        <li class="nam">
                            <a href="/XemDanhMuc/<?php echo $datadm['MaDanhMuc']?> "><?php echo $datadm['TenDanhMuc'] ?> <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                            <ul class="namnam">
                                <?php foreach(getAllTheLoai() as $data){ ?>
                                    <li><a href="/XemTheLoai/<?php echo $data['MaTheLoai'] ?>"><?php echo $data['TenTheLoai'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }?>
                    <li><a href="#">Trẻ em</a></li>
                </ul>
            </nav>
            <div class="search">
                <form action="/xemChiTiet" type="post">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="search" id="search" placeholder="Nhap ten san pham.....">
                    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                </form>
            </div>
            <div class="acc_cart">
                <a class="acc" href="/ThongTinCaNhan"><div><i class="fa-solid fa-user"></i></div></a>
                <a href="/GioHang"><i class="fa-solid fa-cart-shopping"></i><input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
            </div>
        </div>
    </header>
    <div class="banner"><img src="{{ asset('assets/images/Image 1.png')}}" alt="banner1"></div>
    <div class="content">
        
        <div class="title0"><p>SẢN PHẨM</p></div>
        <div class="sp-nam">
            <div class="title1"><img src="{{ asset('assets/images/Image 3.png')}}" alt="nam"></div>
            <div class="hang">
                <?php
                    foreach(getAllSanPham_Nam() as $data){
                ?>
                    <div class="cot">
                        <a href="/xemChiTiet/id=<?php echo $data['MaSP']?>"><img src="<?php echo asset('assets/images/sp1.jpg')?>" alt="Giay"></a>
                        <a href="<?php echo route('chiTiet',['id'=>$data['MaSP']]); ?>"><p class="tensp"><?php echo $data['TenSP'] ?></p></a>
                        <a href="#"><p class="price"><?php echo $data['GiaBan'] ?>$</p></a>
                    </div>
                <?php }?>
            </div>
        <div class="view-more">
            <a href="/XemDanhMuc/1"><button>VIEW MORE PRODUCTS</button></a>
        </div>
        <div class="sp-nu">
            <div class="title2"><img src="<?php echo asset('assets/images/Image 11.png')?>" alt="nu"></div>
            <div class="hang">
            <?php
                    foreach(getAllSanPham_Nu() as $data){
                ?>
                    <div class="cot">
                        <a href="/xemChiTiet/id=<?php echo $data['MaSP']?>"><img src="<?php echo asset('assets/images/sp6.jpg')?>" alt="Giay"></a>
                        <a href="/xemChiTiet/id=<?php echo $data['MaSP']?>"><p class="tensp"><?php echo $data['TenSP'] ?></p></a>
                        <a href="#"><p class="price"><?php echo $data['GiaBan'] ?>$</p></a>
                    </div>
                <?php }?>
            </div>
            <div class="view-more">
                <a href="/XemDanhMuc/2"><button>VIEW MORE PRODUCTS</button></a>
            </div>
        </div>
    </div>
    <div class="feed-back">
        <div class="title3"><p>HASHTAG QHP FOR THE CHANCE TO BE ON OUR WEBSITE</p></div>
        <div class="fb">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
        </div>
    </div>
    <footer>
        <div class="container_footer">
        <div class="support">
            <p class="bold">SUPPORT</p>
            <p>Checking order</p>
            <p>Checkout Method</p>
            <p>Return Policy</p>
        </div>
        <div class="information">
            <p class="bold">INFORMATION</p>
            <p>Store Finder</p>
            <p>Cooperation with</p>
            <p>QHP</p>
            <p>Q&A</p>
        </div>
        <div class="about">
            <p class="bold">ABOUT'S QHP</p>
            <p>About QHP</p>
            <p>QHP Stories</p>
            <p>QHP Development</p>
            <p>Activities</p>
            <p>Contact Us</p>
        </div>
        <div class="LOGO"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></div>
        </div>

        <div class="copyright">© Copyright QHP Store</div>
    </footer>
</body>
</html>
