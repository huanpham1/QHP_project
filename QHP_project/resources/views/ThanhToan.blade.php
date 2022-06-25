    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('assets/css/ThanhToan.css')}}">
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
                    @if (!(session()->has('TenTaiKhoan')))
                        <a href="{{route('DangNhap')}}">Đăng Nhập</a>
                        <pre>|</pre>
                        <a href="./DangKy">Đăng Ký</a>
                        @endif

                </div>
            </div>
            <div class="hduoi">
                <a href="./"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></a>
                <nav>
                    <ul>
                        <li><a href="#">Về chúng tôi</a></li>
                        <?php foreach($danhmuc as $datadm){ ?>
                            <li class="nam">
                                <a href="{{route('XemDanhMuc.index',['id'=>$datadm->MaDanhMuc])}}"><?php echo $datadm->TenDanhMuc ?> <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                                <ul class="namnam">
                                    <?php foreach($theloai as $data){ ?>
                                        <li><a href="{{route('XemTheLoai.index',['id'=>$data->MaTheLoai])}}"><?php echo $data->TenTheLoai ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php }?>
                    </ul>
                </nav>
                <div class="search">
                    <form action="{{route('search-products')}}" method="get">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" name="search" id="search" placeholder="Tìm kiếm sản phẩm...">
                    </form>
                </div>
                {{-- href="{{route('ThongTinCaNhan.index')}}" --}}
                <div class="acc_cart">
                        @if (session()->has('TenTaiKhoan'))
                            <a class="acc"  >
                                <div><i class="fa-solid fa-user"></i></div>
                                <input type="hidden" name="_token" id="" value="<?php echo csrf_token() ?>">
                                <div class="loguot" onclick="logout()">Logout </div>
                            </a>

                        @endif

                    <a href="{{route('giohang')}}"><i class="fa-solid fa-cart-shopping GH">
                        @if(count(Session::get('cart', array()))>0)
                            <div class="carthover">
                                @if(session('cart'))
                                    @php echo count(Session::get('cart', array())); @endphp
                                @endif
                            </div>
                        @endif

                    </i></a>
                </div>
            </div>
        </header>
        <div class="content">
            <form action="{{route('ThanhToan.postHD')}}" method="post" style="display:flex;" entype="mulitpart/form-data">
            <div class="thongTinGiaoHang">
                <div class="title1">THÔNG TIN GIAO HÀNG</div>           
                <div class="inforGiaoHang">
                    @foreach($taikhoan as $tk)
                    <table>
                        <tr>
                            @if($errors->any())
                            <td style="padding-left:20px;height: 30px;font-size: 15px;" colspan="2" class="alert">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại !</td>
                            @endif 
                        </tr>
                        <tr>
                            <td><input type="text" name="name" id="name" placeholder="HỌ TÊN" value="{{old('name')??$tk->HoVaTen}}"></td>
                        </tr>
                        <tr>
                            @error('name')
                                <td style="padding-left:20px;height: 30px;font-size: 15px;" colspan="2"><span class="alert">{{$message}}</span></td>
                            @enderror
                        </tr>
                        <tr>
                            <td><input type="text" name="DiaChi" id="DiaChi" placeholder="ĐỊA CHỈ" value="{{old('name')??$tk->DiaChi}}"></td>
                        </tr>
                        <tr>
                            @error('DiaChi')
                                <td style="padding-left:20px;height: 30px;font-size: 15px;" colspan="2"><span class="alert">{{$message}}</span></td>
                            @enderror
                        </tr>           
                        <tr>
                            <td><input type="text" name="phoneNum" id="phoneNum" placeholder="SỐ ĐIỆN THOẠI" value="{{old('name')??$tk->SoDT}}"></td>
                        </tr>
                        <tr>
                            @error('phoneNum')
                                <td style="padding-left:20px;height: 30px;font-size: 15px;" colspan="2"><span class="alert">{{$message}}</span></td>
                            @enderror
                        </tr>
                        <tr>
                            <td><input type="text" name="ghiChu" id="ghiChu" placeholder="GHI CHÚ"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="diaChiNhanHang" id="diaChiNhanHang" placeholder="ĐỊA CHỈ NHẬN HÀNG"></td>
                        </tr>  
                        <tr>
                            @error('diaChiNhanHang')
                                <td style="padding-left:20px;height: 30px;font-size: 15px;" colspan="2"><span class="alert">{{$message}}</span></td>
                            @enderror
                        </tr>       
                        <tr>
                            <td style="padding-left:20px;height: 30px;font-size: 15px;"><b>HÌNH THỨC VẬN CHUYỂN:</b><b>COD (giao hàng thanh toán)</b></td>
                        </tr>    
                    </table> 
                    @endforeach                   
                </div>
            </div>
            <div class="cart-item">
                <div class="title1">ĐƠN HÀNG</div>
                <table>
                    <tr>
                        <th style="width: 20%;"></th>
                        <th style="width: 30%; text-align: left; padding-left: 10px;">TÊN SẢN PHẨM</th>
                        <th style="width: 15%; text-align: center;">SỐ LƯỢNG</th>
                        <th style="width: 15%; text-align: right;">GIÁ</th>
                        <th style="width: 20%; text-align: right;">THÀNH TIỀN</th>
                    </tr>
                    {{-- {{ count((array) session('cart')) }} --}}
                    @php $total = 0; @endphp
                    @foreach ($SP as $id => $item)
                    @php  @endphp
                    {{-- @php dd($item[0]->SoLuongCon); @endphp --}}
                    {{-- @php $home =  $item['SoLuong'] @endphp --}}
                    <tr>
                        <td style="padding: 0px;"><div class="cart-image"><a href="{{route('chitiet',['id' => $item[1]->MaSP]) }}"><img src="{{asset('assets/images/'.$item[1]->HinhAnh)}}" alt="Giay"></div></a></td>
                        <td class="item-name">
                        <a href="{{route('chitiet',['id' => $item[1]->MaSP]) }}">{{$item[1]->TenSP}}</a>
                            <div class="item-infor">
                                {{-- <div class="color">Màu: <div class="item-color"></div></div> --}}
                                @php $total += $item[1]->GiaBan * $item['SoLuong']; @endphp
                                <div class="size">Size: <div class="item-size">{{$item[0]->Size}}</div></div>
                            </div>
                        </td>
                        <td class="item-quantity">

                            <input type="number" class="SoLuong" min="1"  value="{{$item['SoLuong']}}" onchange="UpdateCart('{{$id}}')" placeholder="">
                            <div class="slKhongHopLe"></div>
                        </td>
                        <td class="item-price">{{$item[1]->GiaBan}}đ</td>
                        <td class="item-total">{{$item[1]->GiaBan * $item['SoLuong']}}đ</td>
                    </tr>
                    @endforeach
                </table>
                <hr style="margin-top: 30px;">
                <div class="user-total-price">
                    <div class="total-price" style="margin-top: 10px;" >
                        <strong>TỔNG CỘNG: <span style="color: red;">{{$total }}đ</span></strong>
                    </div>               
                </div>
                @php 
                    
                    session()->put('SP',$SP);
    
                    @endphp
                <input type="hidden" name="tongTien" value="{{$total}}">
                <div class="thanhToan">
                        <input type="submit" value="THANH TOÁN">
                    </div>
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            </form>
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
    <script>
        function logout(){
            let url = "{{ route('checkout') }}";
            document.location.href=url;
        }

    </script>
    </html>
