<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{ asset('assets/css/orders/detail.css')}}">
	<title>Document</title>
</head>

<body>
	<header>
		<div class="banner">
			<img src="{{ asset('assets/images/admin site.PNG')}}" class="image_banner" alt="">
		</div>
		<div class="content_header">
			<div class="account">
					<div class="name_acc">Admin Name
						<ul class="info_acc">
							<li>logout</li>
						</ul>
					</div>

			</div>
		</div>
	</header>
	<div class="mainlayout">
		<div class="nav">
			<ul class="main_select">
				<li><a href="#"><i class="fa-solid fa-list-ul"></i>Dashboard</li></a>
				<li><a href="{{route('products.index')}}"><i class="fa-solid fa-shoe-prints"></i>Quản Lý Sản Phẩm</li></a>
				<li><a href="{{route('danhmuc.index')}}"><i class="fa-solid fa-sheet-plastic"></i>Quản Lý Danh Mục</li></a>
				<li><a href="{{route('theloai.index')}}"><i class="fa-regular fa-rectangle-list"></i>Quản Lý Thể Loại</li></a>
				<li><a href="{{route('orders.index')}}"><i class="fa-solid fa-bag-shopping"></i>Quản Lý Đơn Hàng</li></a>
				<li><a href="{{route('users.index')}}"><i class="fa-solid fa-user"></i>Quản Lý Tài Khoản</li></a>
				<li class="cha_TK"><i class="fa-solid fa-arrow-up-right-dots"></i>Báo Cáo Thống Kê
					<ul class="con_TK">
						<a href="#"><li>Xuất báo cáo theo sản phẩm</li></a>
						<a href="#"><li>Xuất báo cáo theo ngày tháng</li></a>
					</ul>
				</li>
			</ul>
		</div>
		<div class="container">

			<div class="maincontent">
                <h1>{{$title}}</h1>
                <div class="customer-info">
                    <table>
                        <tr>
                            <th width=20%>Thông tin khách hàng</th>
                            <th width=80%></th>
                        </tr>
                        <tr>
                            <td>Mã đơn hàng</td>
                            <td>{{$orderDetail->MaDonHang}}</td>
                        </tr>
                        <tr>
                            <td>Thông tin người đặt hàng</td>
                            <td>{{$orderDetail->HoVaTen}}</td>
                        </tr>
                        <tr>
                            <td>Ngày đặt hàng</td>
                            <td>{{$orderDetail->NgayDatHang}}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>{{$orderDetail->SoDT}}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>{{$orderDetail->DiaChiNhanHang}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$orderDetail->Email}}</td>
                        </tr>
                        <tr>
                            <td>Ghi chú</td>
                            <td>{{$orderDetail->GhiChu}}</td>
                        </tr>
                    </table>
                </div>
				
				<div class="table-list">
					<table class="user-list" border="1">
						<thead>
							<tr>
								<th width=10%>STT</th>
								<th>Tên sản phẩm</th>
                                <th>Size</th>
								<th>Số lượng</th>
								<th>Giá tiền</th>
							</tr>
						</thead>
						<tbody>
							@if (!empty($productsList))
								@foreach ($productsList as $key => $item)
                                
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->TenSP}}</td>
                                    <td>{{$item->Size}}</td>
                                    <td>{{$item->SoLuong}}</td>
                                    <td align="right">${{$item->GiaTien}}</td>
                                </tr>
							    @endforeach
                                <tr>
                                    <th>Tổng tiền</th>
                                    <td colspan="4" align="right" style="color:red;"><strong>${{$orderDetail->TongTien}}</strong></td>
                                </tr>
							@else
							<tr>
								<td colspan="4">Không có sản phẩm</td>
							</tr>
							@endif
						</tbody>
					</table>
                    <button class="btn-add"><a href="{{route('orders.index')}}">Quay lại</a></button>
				</div>

				@if (session('msg'))
				<div class="message">{{session('msg')}}</div>
				@endif
			</div>
		</div>
	</div>
	<footer>

	</footer>
</body>
</html>
