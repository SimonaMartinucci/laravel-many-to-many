@extends('layouts.app')

@section('content')

    <h2 class="mb-4">Benvenuto {{ Auth::user()->name }} nella tua dashboard</h2>

    <h4>Attualmente sono presenti <b>{{ $count_projects }}</b> progetti</h4>

@endsection
