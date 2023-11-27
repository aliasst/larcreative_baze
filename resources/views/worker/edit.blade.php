@extends('layout.main')

@section('content')

<div>
    <form action="{{ route('workers.update', $worker->id) }}" method="post">
        @csrf
        @method('Patch')
        <div>
            <input type="text" name="name" placeholder="Имя" value="{{ old('name') ?? $worker->name }}">
            @error('name')
            <div >{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="text" name="surname" placeholder="Фамилия" value="{{ old('surname') ?? $worker->surname }}">
            @error('surname')
            <div >{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="email" name="email" placeholder="Почта" value="{{ old('email') ?? $worker->email }}">
            @error('email')
            <div >{{ $message }}</div>
            @enderror
        </div>
        <div><input type="number" name="age" placeholder="Возраст" value="{{ old('age') ?? $worker->age }}"></div>
        <div><textarea name="description" id="" cols="30" rows="10" placeholder="Описание">{{ old('description') ?? $worker->description }}</textarea></div>
        <div>
            <input id="isMarried" type="checkbox"
                {{ $worker->is_married ? 'checked' : '' }}
                   name="is_married">
            <label for="isMarried">Is married?</label>
        </div>
        <div><input type="submit" value="Сохранить"></div>
    </form>
        <hr>
</div>
@endsection
