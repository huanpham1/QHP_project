@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/XemDanhMuc.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/stylehome.css')}}">
    </header>
    <div class="content">
        <div class="filters">
            <div class="size-filter">
                <strong><p>Size:</p></strong>
                <div class="size">
                    <ul>
                        <li><a href="#">24</a></li><li><a href="#">25</a></li>
                        <li><a href="#">26</a></li><li><a href="#">27</a></li>
                        <li><a href="#">28</a></li><li><a href="#">29</a></li>
                        <li><a href="#">30</a></li><li><a href="#">31</a></li>
                        <li><a href="#">32</a></li><li><a href="#">33</a></li>
                        <li><a href="#">34</a></li><li><a href="#">35</a></li>
                        <li><a href="#">36</a></li><li><a href="#">37</a></li>
                        <li><a href="#">38</a></li><li><a href="#">39</a></li>
                        <li><a href="#">40</a></li><li><a href="#">41</a></li>
                        <li><a href="#">42</a></li><li><a href="#">43</a></li>
                        <li><a href="#">44</a></li><li><a href="#">45</a></li>
                    </ul>
                </div>
            </div>

            <div class="price-filter">

                
              
                <div class="range-slider">
                    <p>Giá từ:</p>
                  <span class="rangeValues"></span>
                  <input value="1000" min="1000" max="50000" step="500" type="range" class="Rang1Value" onchange="getVals1()">
                  <input value="50000" min="1000" max="50000" step="500" type="range">
                </div>
              
              </div>
        </div>
        <div class="product">
            <?php foreach($dmid as $tendm){  ?>
            <div class="title0"><p><?php echo $tendm->TenDanhMuc ?></p></div>
            <?php }?>
            <div class="danhmuc">
                <ul>
                    <?php
                        foreach($theloai as $data){

                    ?>
                    <li><a href="{{route('XemTheLoai.index',['id'=>$data->MaTheLoai])}}"><?php echo $data->TenTheLoai ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="sp-nam">
                <div class="hang">

                </div>

                <div class="hang">
                    @if (!empty($SanPhamList))
                    <div class="hang">
                        @for($j = 0; $j < 4; $j++)
                        @php if($SanPhamList[$j]->KhuyenMai != null)echo "";  @endphp
                        <div class="cot">
                            <a href="{{route('chitiet',['id' => $SanPhamList[$j]->MaSP]) }}"><img src="{{ asset('storage/products/'.$SanPhamList[$j]->HinhAnh)}}" alt="Giay">@if($SanPhamList[$j]->KhuyenMai != null) <div class="sale">{{"-".$SanPhamList[$j]->KhuyenMai ."%"}}</div>  @endif</a>
                            <a href="{{route('chitiet',['id' => $SanPhamList[$j]->MaSP]) }}"><p class="tensp">{{$SanPhamList[$j]->TenSP}}</p></a>
                            @if($SanPhamList[$j]->KhuyenMai != null)
                            <a href="#"><p class="price" style="text-decoration: line-through; color: rgb(247, 92, 92)">{{$SanPhamList[$j]->GiaBan}}đ</p></a>
                            <a href="#"><p class="price">{{$SanPhamList[$j]->GiaBan*(100-$SanPhamList[$j]->KhuyenMai)/100}}đ</p></a>
                            @else
                            <a href="#"><p class="price" >{{$SanPhamList[$j]->GiaBan}}đ</p></a>
                            @endif
                            {{-- <a href="#"><p class="price">{{$SanPhamList[$j]->GiaBan*(100-$SanPhamList[$j]->KhuyenMai)/100}}đ</p></a> --}}
                        </div>
                        @endfor
                            </div>
						@else
							
				    @endif
                </div>
                
            </div>
        </div>

    </div>
@section('scripts')
<script>
    function getVals(){
  // Get slider values
  let parent = this.parentNode;
  let slides = parent.getElementsByTagName("input");
    let slide1 = parseFloat( slides[0].value );
    let slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  let displayElement = parent.getElementsByClassName("rangeValues")[0];
//innerHTML property allows Javascript code to manipulate a website being displayed
      displayElement.innerHTML =  slide1 + " - đ" + slide2 +"đ";
}

window.onload = function(){
  // Initialize Sliders
  let sliderSections = document.getElementsByClassName("range-slider");
      for( let x = 0; x < sliderSections.length; x++ ){
        let sliders = sliderSections[x].getElementsByTagName("input");
        for( let y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
     //oninput attribute fires when the value of an <input> element is changed
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
           
            
          }
        }
      }
}
</script>

@endsection
@endsection
