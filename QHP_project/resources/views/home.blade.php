@extends('layout')

@section('content')

    <div class="banner"><img src="{{ asset('assets/images/Image 1.png')}}" alt="banner1"></div>
    <div class="content">
        <div class="title0"><p>SẢN PHẨM</p></div>
        <div class="sp-nam">
            <div class="title1"><img src="{{ asset('assets/images/Image 3.png')}}" alt="nam"></div>
                @if (!empty($SanPhamList))
                    <div class="hang">
                        @for($j = 0; $j < 5; $j++)
                        <div class="cot">
                            <a href="{{route('chitiet',['id' => $SanPhamList[$j]->MaSP]) }}"><img src="{{ asset('assets/images/'.$SanPhamList[$j]->HinhAnh)}}" alt="Giay"></a>
                            <a href="{{route('chitiet',['id' => $SanPhamList[$j]->MaSP]) }}"><p class="tensp">{{$SanPhamList[$j]->TenSP}}</p></a>
                             <a href="#"><p class="price">{{$SanPhamList[$j]->GiaBan}}</p></a>
                        </div>
                        @endfor
                    </div>
							@else
							<tr>
								<td colspan="4">Sản phẩm</td>
							</tr>
				@endif
                @if (!empty($SanPhamList))
                    <div class="hang">
                        @for($j = 0; $j < 5; $j++)
                        <div class="cot">
                            <a href="{{route('chitiet',['id' => $SanPhamList[$j]->MaSP]) }}"><img src="{{ asset('assets/images/'.$SanPhamList[$j]->HinhAnh)}}" alt="Giay"></a>
                            <a href="{{route('chitiet',['id' => $SanPhamList[$j]->MaSP]) }}"><p class="tensp">{{$SanPhamList[$j]->TenSP}}</p></a>
                             <a href="#"><p class="price">{{$SanPhamList[$j]->GiaBan}}</p></a>
                        </div>
                        @endfor
                    </div>
							@else
							<tr>
								<td colspan="4">Sản phẩm</td>
							</tr>
				@endif
            </div>
        </div>
        <div class="view-more">
            <a href="#"><button>VIEW MORE PRODUCTS</button></a>
        </div>
        <div class="sp-nu">
            <div class="title2"><img src="{{ asset('assets/images/Image 11.png')}}" alt="nu"></div>
            @if (!empty($sanphamnu))
            <div class="hang">
                @for($j = 0; $j < 4; $j++)
                <div class="cot">

                    <a href="{{route('chitiet',['id' => $sanphamnu[$j]->MaSP]) }}"><img src="{{ asset('assets/images/'.$sanphamnu[$j]->HinhAnh)}}" alt="Giay"></a>
                    <a href="{{route('chitiet',['id' => $sanphamnu[$j]->MaSP]) }}"><p class="tensp">{{$sanphamnu[$j]->TenSP}}</p></a>
                     <a href="#"><p class="price">{{$sanphamnu[$j]->GiaBan}}</p></a>
                </div>
                @endfor
            </div>
                    @else
                    <tr>
                        <td colspan="4">Không có sản phẩm</td>
                    </tr>
        @endif
        @if (!empty($sanphamnu))
        <div class="hang">
            @for($j = 0; $j < 4; $j++)
                <div class="cot">
                    <a href="{{route('chitiet',['id' => $sanphamnu[$j]->MaSP]) }}"><img src="{{ asset('assets/images/'.$sanphamnu[$j]->HinhAnh)}}" alt="Giay"></a>
                    <a href="{{route('chitiet',['id' => $sanphamnu[$j]->MaSP]) }}"><p class="tensp">{{$sanphamnu[$j]->TenSP}}</p></a>
                    <a href="#"><p class="price">{{$sanphamnu[$j]->GiaBan}}</p></a>
                </div>
            @endfor
        </div>
                @else
                <tr>
                    <td colspan="4">Không có danh mục</td>
                </tr>
    @endif
        </div>
        <div class="view-more">
            <a href="#"><button>VIEW MORE PRODUCTS</button></a>
        </div>
    </div>


@endsection
@section('scripts')
<script>
    function logout(){
        let url = "{{ route('checkout') }}";

        document.location.href=url;
    }

</script>
@endsection
