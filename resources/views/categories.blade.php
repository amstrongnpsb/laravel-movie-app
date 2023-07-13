@extends('layout.main')
@section('container')
<h1><span class=" badge bg-dark mt-3">{{ $title }}</span></h1>
<div class="d-inline-flex justify-content-between mt-2" style="width: 100%;">
    @foreach ($categories as $category)
    <div class=" card text-bg-dark" style="width:400px;">
        <h5 class="card-title rounded position-absolute p-3 m-2" style="color: whitesmoke; background-color:rgba(0,0,0,0.53); width:auto;">{{ $category->name }}</h5>
        <a href="/data/?category={{ $category->name }} " class="text-decoration-none"> <img src=" https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}"></a>
    </div>
    @endforeach
</div>
@endsection