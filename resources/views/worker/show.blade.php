@extends('layout.main')

@section('content')

<div>
        <div>Name: {{ $worker->name }}</div>
        <div>Surame: {{ $worker->surname }}</div>
        <div>Email: {{ $worker->email }}</div>
        <div>Age: {{ $worker->age }}</div>
        <div>Description: {{ $worker->description }}</div>
        <div><a href="{{ route('workers.edit', $worker->id) }}">Редактировать</a></div>
        <div><a href="{{ route('workers.index') }}">Назад</a></div>
        <hr>
</div>
@endsection
