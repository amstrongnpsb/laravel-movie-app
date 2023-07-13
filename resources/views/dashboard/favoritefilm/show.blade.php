@extends('dashboard.layout.main')
@section('container')
<div class="detail-container mt-2 ">
    <div class="card detail">
        <img src=" https://source.unsplash.com/1400x500?{{ $film->category->name }}" class="card-img-top" style="height:300px;" alt="{{ $film->category->name }}">
        <div class="button-detail-container">
            <a href="/dashboard/favoritefilm" class="btn btn-dark">Back</a>
            <a href=""><span class="btn btn-danger" data-feather="trash-2" ></span></a>
            <a href="/dashboard/favoritefilm/{{ $film->slug }}/edit"><span class="btn bg-warning" data-feather="edit"></span></a>
        </div>
        <div class="card-body" style=" height:115px">
            <h5 class="card-title">Judul : {{ $film->title }}</h5>
        </div>
        <ul class="list-group list-group-flush mt-0">
            <li class="list-group-item">
                <p class="card-text mt-3">{!! $film->full_sinopsis !!}</p>
            </li>
        </ul>

    </div>
</div>
@endsection