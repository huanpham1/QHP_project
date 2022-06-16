@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/Search.css') }}">
    <div class="content">
        <div class="product">
            <div class="title0">
                <p>Kết quả tìm kiếm cho "{{$key}}"</p>
                <p style="font-size:16px;">({{count($foundProducts)}} sản phẩm)</p>
            </div>
            <div class="sp-nam">
                @if (!empty($foundProducts))
                    @foreach($foundProducts as $key=>$item)
                        @if ($key % 4 == 0)
                            <div class="hang">
                        @endif
                        <div class="cot">
                            <a href="#"><img src="{{ asset('storage/products/' . $item->HinhAnh) }}" alt="Giay"></a>
                            <a href="#"><p class="tensp">{{$item->TenSP}}</p></a>
                            <a href="#"><p class="price">${{$item->GiaBan}}</p></a>
                        </div>
                        @if ($key % 4 == 3 || ($key+1 == count($foundProducts)))
                            </div>
                        @endif
                    @endforeach
                    <div class="view-more">
                        <a href="#"><button>VIEW MORE PRODUCTS</button></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
