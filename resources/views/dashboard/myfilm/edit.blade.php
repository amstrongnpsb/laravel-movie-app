@extends('dashboard.layout.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="text-transform: capitalize; ">
    <h1 class="h2">Edit Film</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/myfilm/{{ $film->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $film->title) }}">
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug' , $film->slug) }}">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="director" class="form-label">director</label>
            <select class="form-select" name="director_id">
                @foreach ($directors as $director)
                    @if(old('director_id', $film->director_id) == $director->id)
                        <option value="{{ $director->id }}" selected>{{ $director->name }}</option>
                    @else
                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if(old('category_id', $film->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
                <label for="image" class="form-label">Film Poster</label>
                @if($film->film_img)
                    <img src="{{ asset('storage/'. $film->film_img)}}"class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        <div class="mb-3">
          <label for="full_sinopsis" class="form-label">Sinopsis</label>
          @error('full_sinopsis')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="full_sinopsis" type="hidden" name="full_sinopsis" value="{{ old('full_sinopsis' , $film->full_sinopsis) }}">
          <trix-editor input="full_sinopsis"></trix-editor>
          
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</div>
</main>
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/myfilm/slugGenerate?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    function previewImage() {
        
        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('.img-preview');
        imagePreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imagePreview.src = oFREvent.target.result;
        }

    }
</script>
@endsection