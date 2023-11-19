@extends('layout.main')

@section('content')

<div>
        <div>Name: {{ $worker->name }}</div>
        <div>Surame: {{ $worker->surname }}</div>
        <div>Email: {{ $worker->email }}</div>
        <div>Age: {{ $worker->age }}</div>
        <div>Description: {{ $worker->description }}</div>
        <div><a href="{{ route('worker.edit', $worker->id) }}">Редактировать</a></div>
        <div><a href="{{ route('worker.index') }}">Назад</a></div>
        <hr>
</div>
@endsection
