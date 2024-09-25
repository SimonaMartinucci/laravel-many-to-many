@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Elenco progetti per tipo</h2>

    @foreach($types as $type)
        <h3 class="mt-5">{{ $type->name }}</h3>
        <ul class="list-group">
            @foreach($type->projects as $project)
                <a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a>
            @endforeach
        </ul>
    @endforeach

</div>

@endsection
