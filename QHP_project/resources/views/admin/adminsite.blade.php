<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{ asset('assets/css/adminsite.css')}}">
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
				<li><a href="#"><i class="fa-solid fa-bag-shopping"></i>Quản Lý Đơn Hàng</li></a>
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
				<div class="content">
					<div class="dashboard_content">
						<div class="QLSP">Quản Lý Sản Phẩm</div>
					</div>
					<div class="dashboard_content">
						<div class="QLSP">Quản Lý Sản Phẩm</div>
					</div>
					<div class="dashboard_content">
						<div class="QLSP">Quản Lý Sản Phẩm</div>
					</div>
				</div>
				<div class="content">
					<div class="dashboard_content">
						<div class="QLSP">Quản Lý Sản Phẩm</div>
					</div>
					<div class="dashboard_content">
						<div class="QLSP">Quản Lý Sản Phẩm</div>
					</div>
					<div class="dashboard_content">
						<div class="QLSP">Quản Lý Sản Phẩm</div>
					</div>
				</div>
				<div class="content">
					<div class="dashboard_content">
						<div class="QLSP">Quản Lý Sản Phẩm</div>
					</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>

	</footer>
</body>
</html>
