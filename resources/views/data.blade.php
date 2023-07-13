@extends('layout.main')
@section('container')
<h1 class="mt-2 text-center">{{ $header }}</h1>
<div class="row justify-content-center">
    <div class="col-md-5">
        <form action="/data" method="get">
            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('director'))
            <input type="hidden" name="director" value="{{ request('director') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Film..." name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
@if($films->count())
<div class="card mb-3">
    <div class="position-absolute p-3 m-2 rounded" style=" color: whitesmoke; background-color:rgba(0,0,0,0.53);">Latest Film</div>
    @if($films[0]->film_img)
    <img src="{{ asset('storage/'. $films[0]->film_img)}} " class="card-img-top" style="width: 300px; margin-left: 10px" alt="{{ $films[0]->category->name }}">
    @else     
    <img src=" https://source.unsplash.com/1400x500?{{ $films[0]->category->name }}" class="card-img-top" alt="{{ $films[0]->category->name }}">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $films[0]->title }}</h5>
        <small class="text-muted">
            <p class="card-text">Director : <a href="/data/?director={{ $films[0]->director->director_slug }}" class="text-decoration-none"> {{ $films[0]->director->name }}</a> Genre: <a href="/data/?category={{ $films[0]->category->slug }} " class="text-decoration-none"> {{ $films[0]->category->name }}</a> Created at : {{ $films[0]->created_at->diffForHumans() }}</p>
        </small>
        <p class="card-text">{{ $films[0]->sinopsis }}</p>
        <a class="btn btn-dark mt-3" href="/detail/{{ $films[0]->slug }}">Detail</a>
    </div>
</div>

<div class="film-container mt-5">

    @foreach ($films->skip(1) as $film)
    <div class="card film border-dark border-top-0 shadow">
    @if($film->film_img)
    <img src="{{ asset('storage/'. $film->film_img)}} " class="card-img-top" style="width: 300px; margin-left: 10px" alt="{{ $film->category->name }}">
    @else     
    <img src=" https://source.unsplash.com/1400x600?{{ $film->category->name }}" class="card-img-top" alt="{{ $film->category->name }}">   
    @endif
        <div class="card-body">
            <h5 class="card-title">Judul : {{ $film->title }}</h5>
            <small class="text-muted">
                <p class="card-text">Director: <a href="/data/?director={{ $film->director->director_slug }}" class="text-decoration-none"> {{ $film->director->name }}</a> Genre: <a href="/data/?category={{ $film->category->slug }} " class="text-decoration-none"> {{ $film->category->name }}</a>
                <p>{{ $film->created_at->diffForHumans() }}</p>
            </small>
            <p class=" card-text"> {{ $film->sinopsis }} </p>
            <a class="btn btn-dark mt-3" href="/detail/{{ $film->slug }}">Detail</a>
        </div>
    </div>
    @endforeach
</div>
@else
<p class="text-center fs-4">No Film Found.</p>
@endif
<div class="d-flex justify-content-center">
    {{ $films->links() }}
</div>
@endsection