@extends('dashboard.layout.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="text-transform: capitalize; ">
        <h1 class="h2">{{ auth()->user()->name }} Favorite's Film</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->category->name }}</td>
                    <td>
                        <a href="/dashboard/favoritefilm/{{ $film->slug }}"><span class="badge bg-info" data-feather="eye" style="width:15%;"></span></a>
                        <a href="/dashboard/favoritefilm/{{ $film->slug }}/edit"><span class="badge bg-warning" data-feather="edit" style="width:15%;"></span></a>
                        <a href=""><span class="badge bg-danger" data-feather="trash-2" style="width:15%;"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection