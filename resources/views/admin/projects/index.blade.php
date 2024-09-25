@extends('layouts.app')

@section('content')

<div class="container">

  @if(session('deleted'))
  <div class="alert alert-success" role="alert">
    {{ session('deleted') }}
  </div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th class="w-25" scope="col">Titolo</th>
        <th scope="col">Categoria</th>
        <th scope="col">Tipo</th>
        <th class="w-25" scope="col">Tecnologia</th>
        <th scope="col">Inizio</th>
        <th scope="col">Fine</th>
        <th scope="col">URL</th>
        <th class="w-25" scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $project)
      <tr>
        <th scope="row">{{ $project->title }}</td>
        <td scope="row">{{ $project->category }}</td>
        <td scope="row">{{ $project->type ? $project->type->name : 'NESSUN TIPO' }}</td>
        <td scope="row">
          @forelse ($project->technologies as $technology)
            <span class="badge text-bg-warning">
              {{ $technology->name }}
            </span>
          @empty
            <span>-</span>
          @endforelse
        </td>
        <td scope="row">{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</td>
        <td scope="row">{{ $project->end_date ? 'IN CORSO' : \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</td>
        <td scope="row">{{ $project->project_url }}</td>
        <td scope="row">
          <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success">
            <i class="fa-solid fa-eye"></i>
          </a>
          <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
            <i class="fa-solid fa-pencil"></i>
          </a>
          <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Confermi l\'eliminazione del progetto {{ $project->name }}')">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
