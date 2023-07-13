@extends('dashboard.layout.main')
@section('container')
<div class="detail-container mt-2 ">
    <div class="card detail">
        @if($film->film_img)
        <img src="{{ asset('storage/'. $film->film_img)}} " class="card-img-top" style="width: 300px; margin-left: 10px" alt="{{ $film->category->name }}">
        @else
        <img src=" https://source.unsplash.com/1400x500?{{ $film->category->name }}" class="card-img-top" style="height:300px;" alt="{{ $film->category->name }}">
        @endif
    
        <div class="button-detail-container">
            <a href="/dashboard/myfilm" class="btn btn-dark">Back</a>
            <a href="/dashboard/myfilm/{{ $film->slug }}/edit"><span class="btn bg-warning" data-feather="edit"></span></a>
            <form action="/dashboard/myfilm/{{ $film->slug }}" method="post" class="delete-wrapper">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete')">
                        <span data-feather="trash-2" style="padding-bottom: 1.7px;" ></span>
                    </button>
            </form>
        </div>
        <div class="card-body" style=" height:115px">
            <h5 class="card-title" style="text-transform: capitalize;">Judul : {{ $film->title }}</h5>
        </div>
        <ul class="list-group list-group-flush mt-0">
            <li class="list-group-item">
                <p class="card-text mt-3">{!! $film->full_sinopsis !!}</p>
                 
            </li>
        </ul>

    </div>
</div>
@endsection