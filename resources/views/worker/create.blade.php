<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <form action="{{ route('worker.store') }}" method="post">
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
</body>
</html>
