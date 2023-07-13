@extends('dashboard.layout.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="text-transform: capitalize; ">
        <h1 class="h2">{{ auth()->user()->name }}'s Film</h1>
    </div>
    @if(session()->has('actionsuccess'))
            <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                <strong>{{ session('actionsuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    <a href="/dashboard/myfilm/create" class="btn btn-dark">Register New Film</a>
    <div class="table-responsive col-lg-10 mt-3">
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
                    <td class="action-group">
                        <a href="myfilm/{{ $film->slug }}"><span class="badge bg-info" data-feather="eye"></span></a>
                        <a href="/dashboard/myfilm/{{ $film->slug }}/edit"><span class="badge bg-warning" data-feather="edit"></span></a>
                        <form action="/dashboard/myfilm/{{ $film->slug }}" method="post" class="delete-wrapper">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete')">
                                <span data-feather="trash-2" style="padding-bottom: 1.7px;" ></span>
                            </button>
                        </form>
                        <a href=""></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection