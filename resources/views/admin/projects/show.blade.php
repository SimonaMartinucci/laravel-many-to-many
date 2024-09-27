@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('edited'))
    <div class="alert alert-success" role="alert">
        {{ session('edited') }}
    </div>
    @endif

    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Confermi l\'eliminazione del progetto {{ $project->name }}')">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>
    <h1 class="mt-3">{{ $project->title }}</h1>
    <h4>Categoria: {{ $project->category }}</h4>
    <h5>Tipo: {{ $project->type ? $project->type->name : 'NESSUN TIPO' }}</h5>
    @forelse ($project->technologies as $technology)
      <span class="badge text-bg-warning mb-3">
        {{ $technology->name }}
      </span>
    @empty
      <span>-</span>
    @endforelse
    <p>{{ $project->description }}</p>

    <img src="{{ asset('storage/' . $project->path_img) }}" class="mb-4" alt="{{ $project->name }}">

    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></i></a>

</div>

@endsection
