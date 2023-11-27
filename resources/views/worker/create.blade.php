@extends('layout.main')

@section('content')

<div>
    <form action="{{ route('workers.store') }}" method="post">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}">
            @error('name')
            <div >{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="text" name="surname" placeholder="Фамилия" value="{{ old('surname') }}">
            @error('surname')
            <div >{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="email" name="email" placeholder="Почта" value="{{ old('email') }}">
            @error('email')
            <div >{{ $message }}</div>
            @enderror
        </div>
        <div><input type="number" name="age" placeholder="Возраст" value="{{ old('age') }}"></div>
        <div><textarea name="description" id="" cols="30" rows="10" placeholder="Описание">{{ old('description') }}</textarea></div>
        <div>
            <input id="isMarried" type="checkbox" name="is_married"
                {{ old('is_married') ? 'checked' : '' }}
            >
            <label for="isMarried">Is married?</label>
        </div>
        <div><input type="submit" value="Отправить"></div>
    </form>
        <hr>
</div>
@endsection
