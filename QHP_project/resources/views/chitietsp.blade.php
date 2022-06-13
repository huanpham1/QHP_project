@extends('layout')

@section('content')

    <div class="chiTietSP">
        <div class="Containerimage">
            <img name = "img_sp" src="<?php echo asset('storage/products/'.$img)?>" alt="Giay">

        </div>
        <div class="containerInfor">
            <div class="name">{{$data->TenSP}}</div>
            <div class="ma">Mã sản phẩm: {{$data->MaSP}}</div>
            <div class="gia">{{$data->GiaBan}}đ</div>
            <div class="kichco">
                <div class="text">Kích cỡ: </div>
                <select name="SIZE" class="size" id="size" onchange="getSL({{$data->MaSP}})">
                    @foreach ($Size as $item)
                        <option herf="/a" value="{{$item->Size}}">{{$item->Size}}</option>
                    @endforeach
                </select>
            </div>

            <div class="soluong">
                <div class="txtsl">Số lượng:</div>
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" min="1" name="" type="number" value="1">
                    <input class="plus is-form" type="button" value="+">
                  </div>
                <div class="SLKHL"></div>
            </div>
            @if(($SoLuong=== NULL))
                <div class="soluong">
                    <div class="txtsl">Tình trạng:</div>
                    <div class="kq"> Hết hàng</div>
                </div>
            @else
                <div class="soluong">
                    <div class="txtsl">Tình trạng:</div>
                    <div class="kq"> còn {{$SoLuong->SoLuongCon}} sản phẩm</div>
                    <input type="hidden" name="" id="" class="SLC" value="{{$SoLuong->SoLuongCon}}">
                </div>
            @endif
            {{-- onclick="window.location='{{ route('giohang') }}'" --}}
            <div class="btn">
                <button class="themVaoGio" onclick="ThemGHMOI()">THÊM VÀO GIỎ</button>
                <button class="thanhToan" type="submit">THANH TOÁN</button>
            </div>
        </div>
        <div class="alert-green hide">
            <span class="fas fa-check-circle"></span>
            <span class="msg">Thêm thành công</span>
            <div class="close-btn-green ">
               <span class="fas fa-times" ></span>
            </div>
         </div>
        </div>
    </div>
@endsection
@section('scripts')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="{{ asset('assets/js/chiTietSP.js')}}">


    </script>
    {{-- <script>getvalue()</script> --}}
    <script>
        function getvalue(){
            return Number(document.querySelector('.input-qty').value);
        }
    </script>
    <script>
        function Alertgreen(){
            const alert = document.querySelector('.alert-green')
            const closebtn = document.querySelector('.close-btn-green')
            alert.style.display = "block";
            alert.classList.add("show");
            alert.classList.remove("hide");
            alert.classList.add("showAlert");
            setTimeout(function(){
                alert.classList.remove("show");
                alert.classList.add("hide");
                setTimeout(function(){
                alert.style.display = "none"
                window.location.reload()
            },1000);
            },1000);
            closebtn.onclick = ()=>{

            alert.classList.remove("show");
            alert.classList.add("hide");
            setTimeout(function(){
                alert.style.display = "none"
                window.location.reload()
            },1000);
            };
        };
        async function ThemGHMOI(){
            const ma = document.querySelector(".abc").value;
            const size = document.getElementById("size").value;
            const SLKHL = document.querySelector(".SLKHL");
            const sl = document.querySelector(".input-qty").value;

            const data = { CTSPID: ma, SoLuong: sl};
            // console.log(sl);
            // console.log(data)
            // console.log(giatri);
            console.log(data);
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            fetch('/ThemGH', {
                method: 'post',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            })
            .then(response => response.json())
            .then(response => {
                // console.log(response);
                if(response==400){
                    SLKHL.innerHTML="Số lượng yêu cầu không có sẵn";
                }
                else{
                    Alertgreen()
                    document.querySelector(".carthover").innerHTML = response;
                    document.querySelector(".carthover").style.backgroundColor = "rgb(249, 97, 97)";
                    // setTimeout(window.location.reload(), 1000);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
            // window.location.reload();
        }
    </script>
@endsection
