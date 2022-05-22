<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/GioHang.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giày QHP</title>
</head>
<body>
<header>
        <div class="htren">
            <div class="hotline"><p>Hotline: 0987666666</p></div>
            <div class="checking-order"><a href="#"><p>Kiểm tra đơn hàng</p></a></div>
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
                    <li class="nam">
                        <a href="/XemDanhMuc">Nam <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                        <ul class="namnam">
                            <li><a href="#">Giày chạy bộ</a></li>
                            <li><a href="#">Giày training</a></li>
                            <li><a href="#">Giày thời trang</a></li>
                            <li><a href="#">Giày leo núi</a></li>
                        </ul>
                    </li>
                    <li class="nu">
                        <a href="/XemDanhMuc">Nữ <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                        <ul class="nunu">
                            <li><a href="#">Giày chạy bộ</a></li>
                            <li><a href="#">Giày training</a></li>
                            <li><a href="#">Giày thời trang</a></li>
                            <li><a href="#">Giày leo núi</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Trẻ em</a></li>
                </ul>
            </nav>
            <div class="search">
                <form action="#">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="search" id="search">
                </form>
            </div>
            <div class="acc_cart">
                <a class="acc" href="#"><div><i class="fa-solid fa-user"></i></div></a>
                <a href="/GioHang"><i class="fa-solid fa-cart-shopping"></i><input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
            </div>
        </div>
    </header>
    <div class="cart">
        <!-- <div class="cart-title"><h2>GIỎ HÀNG CỦA BẠN</h2></div>
        <div class="empty-cart">
            <img src="./images/empty-cart.png" alt="Không có sản phầm nào trong giỏ hàng của bạn">
            <p>Không có sản phẩm nào trong giỏ hàng của bạn.</p><br>
            <button><a href="index.html">Tiếp tục mua sắm</a></button>
        </div> -->
        <div class="cart-item">
            <table>
                <tr>
                    <th style="width: 15%;"></th>
                    <th style="width: 40%; text-align: left; padding-left: 10px;">TÊN SẢN PHẨM</th>
                    <th style="width: 15%; text-align: center;">SỐ LƯỢNG</th>
                    <th style="width: 15%; text-align: right;">GIÁ</th>
                    <th style="width: 15%; text-align: right;">THÀNH TIỀN</th>
                </tr>
                <tr>
                    <td style="padding: 0px;"><div class="cart-image"><img src="./images/Image 4.png" alt="Giay"></div></td>
                    <td class="item-name">
                       <a href="#">Multicolor Men's Sneaker</a>
                        <div class="item-infor">
                            <div class="color">Màu: <div class="item-color"></div></div>
                            <div class="size">Size: <div class="item-size">38</div></div>
                            <div class="btn-delete">
                                <a href="#">
                                <strong><i class="fa-solid fa-square-xmark"></i>
                                Xóa</strong>
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="item-quantity">
                        <input type="number" min="1" max="12" value="1">
                    </td>
                    <td class="item-price">$60</td>
                    <td class="item-total">$60</td>
                </tr>
            </table>
            <hr style="margin-top: 30px;">
            <div class="cart-pay">
                <div class="shop-support">
                    <a href="../" class="buy-more">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                        Tiếp tục mua hàng
                    </a>

                    <div class="shop-contact">
                        <p>Để nhận tư vấn hoặc hỗ trợ khi phát sinh khó khăn trong lúc mua hàng, hãy liên hệ QHP thông qua:</p>
                        <ul>
                            <li>
                                Gọi <span class="phone-number"><strong>0987666666</strong></span>
                            </li>
                            <li>
                                Email tới địa chỉ
                                <a href="mailto:tuvan_online@qhp.com.vn" class="email">
                                    <strong>tuvan_online@qhp.com.vn</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="user-total-price">
                    <div class="total-price">
                        <strong>Tạm Tính: <span style="color: red;">$60</span></strong>
                    </div>
                    <div class="user-pay">
                        <input type="submit" value="ĐẶT HÀNG">
                    </div>
                </div>
            </div>
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
