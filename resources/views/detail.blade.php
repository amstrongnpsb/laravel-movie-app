@extends('layout.main')
@section('container')
<div class="detail-container mt-3">
    <div class="card detail">
        <img src=" https://source.unsplash.com/1400x500?{{ $film->category->name }}" class="card-img-top" style="height:250px;" alt="{{ $film->category->name }}">
        <div class="card-body" style=" height:115px">
            <h5 class="card-title">Judul : {{ $film->title }}</h5>
            <small class="text-muted">
                <p class="card-text">Director: <a href="/directors/{{ $film->director->director_slug }}" class="text-decoration-none"> {{ $film->director->name }}</a> Genre: <a href="/data/?category={{ $film->category->slug }} " class="text-decoration-none"> {{ $film->category->name }}</a>
                <p>{{ $film->created_at->diffForHumans() }}</p>
            </small>
        </div>
        <ul class="list-group list-group-flush mt-0">
            <li class="list-group-item">
                <p class="card-text mt-3">{!! $film->full_sinopsis !!}</p>
            </li>
        </ul>
        <a href="/data" class="btn btn-dark mt-0 p-2 ">Back</a>

    </div>
</div>
@endsection