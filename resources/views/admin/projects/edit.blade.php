@extends('layouts.app')

@section('content')

<div class="container">
    
    <h2>Modifica di {{ $project->title }}</h2>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')
        <label for="title">Titolo</label>
        <input type="text" name="title" value="{{ old('title', $project->title) }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
        <small class="text-danger">
            {{ $message }}
        </small>
        @enderror

        <label for="category">Categoria</label>
        <input type="text" name="category" value="{{ old('category', $project->category) }}" class="form-control @error('category') is-invalid @enderror">
        @error('category')
        <small class="text-danger">
            {{ $message }}
        </small>
        @enderror

        <label for="type">Tipo</label>
        <select class="form-select @error('type') is-invalid @enderror" name="type_id" id="type">
            <option value="">Seleziona un tipo</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>
        @error('type')
        <small class="text-danger">
            {{ $message }}
        </small>
        @enderror

        <label for="description">Descrizione</label>
        <input type="textarea" name="description" value="{{ old('description', $project->description) }}" class="form-control @error('description') is-invalid @enderror">
        @error('description')
        <small class="text-danger">
            {{ $message }}
        </small>
        @enderror

        <label for="start_date">Data inizio</label>
        <input type="date" name="start_date" value="{{ old('start_date', $project->start_date) }}" class="form-control @error('start_date') is-invalid @enderror">
        @error('start_date')
        <small class="text-danger">
            {{ $message }}
        </small>
        @enderror

        <label for="project_url">URL progetto</label>
        <input type="text" name="project_url" value="{{ old('project_url', $project->project_url) }}" class="form-control @error('project_url') is-invalid @enderror">
        @error('project_url')
        <small class="text-danger">
            {{ $message }}
        </small>
        @enderror

        <button type="submit" class="btn btn-success">Invia</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Annulla</a>
    </form>

</div>

@endsection
