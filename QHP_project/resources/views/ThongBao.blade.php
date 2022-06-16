@extends('layout')

@section('content')
    <div class="content">
        abc
    </div>
    @if(isset($madh))
        <h1>{{$madh}}</h1>
    @endif
@endsection
