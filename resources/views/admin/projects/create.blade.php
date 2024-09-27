@extends('layouts.app')

@section('content')

<div class="container">

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <label class="form-label mt-3 d-block" for="title">Titolo</label>
        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
        <small class="text-danger d-block">
            {{ $message }}
        </small>
        @enderror

        <label class="form-label mt-3 d-block" for="category">Categoria</label>
        <input type="text" name="category" value="{{ old('category') }}" class="form-control @error('category') is-invalid @enderror">
        @error('category')
        <small class="text-danger d-block">
            {{ $message }}
        </small>
        @enderror

        <label class="form-label mt-3 d-block" for="type">Tipo</label>
        <select class="form-select" name="type_id" id="type">
            <option value="">Seleziona un tipo</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        @error('type')
        <small class="text-danger d-block">
            {{ $message }}
        </small>
        @enderror

        <label class="form-label mt-3 d-block" for="technologies">Tecnologia</label>
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"></div>

            @foreach ($technologies as $technology)
                <input id="technology-{{ $technology->id }}" class="btn-check" autocomplete="off" type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                <label class="btn btn-outline-primary" for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
            @endforeach

        <label class="form-label mt-3 d-block" for="description">Descrizione</label>
        <textarea name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror"></textarea>
        @error('description')
        <small class="text-danger d-block">
            {{ $message }}
        </small>
        @enderror

        <label for="path_img" class="form-label mt-3 d-block">Immagine</label>
        <input type="file" id="path_img" name="path_img" class="form-control">
        @error('path_img')
        <small class="text-danger d-block">
            {{ $message }}
        </small>
        @enderror

        <label class="form-label mt-3 d-block" for="start_date">Data inizio</label>
        <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control w-25 @error('start_date') is-invalid @enderror">
        @error('start_date')
        <small class="text-danger d-block">
            {{ $message }}
        </small>
        @enderror

        <label class="form-label mt-3 d-block" for="project_url">URL progetto</label>
        <input type="text" name="project_url" value="{{ old('project_url') }}" class="form-control @error('project_url') is-invalid @enderror">
        @error('project_url')
        <small class="text-danger d-block">
            {{ $message }}
        </small>
        @enderror

        <button type="submit" class="btn btn-success mt-3">Invia</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-danger mt-3">Annulla</a>
    </form>

</div>

@endsection