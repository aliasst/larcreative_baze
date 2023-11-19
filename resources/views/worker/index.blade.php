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
<a><a href="{{ route('worker.create') }}">Добавить рабочего</a></div>
<hr><br><br>
    <div>
        <form action="{{ route ('worker.index') }}">
            <input type="text" name="name" placeholder="name" value="{{ request()->get('name') }}">
            <input type="text" name="surname" placeholder="surname" value="{{ request()->get('surname') }}">
            <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">
            <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
            <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
            <input id="isMarried" type="checkbox" name="is_married"
            {{ request()->get('is_married') ? 'checked' : ''}}
            >
            <label for="isMarried">Is married?</label>
            <input type="submit">
            <a href="{{ route('worker.index') }}">Сбросить фильтр</a>
        </form>
    </div>
<div>
    @foreach($workers as $worker)
        <div>Name: {{ $worker->name }}</div>
        <div>Surame: {{ $worker->surname }}</div>
        <div>Email: {{ $worker->email }}</div>
        <div>Age: {{ $worker->age }}</div>
        <div>Description: {{ $worker->description }}</div>
        <div>Is married: {{ $worker->is_married }}</div>
        <div>
            <form action="{{ route('worker.delete', $worker->id) }}" method="post">
                @csrf
                @method('Delete')
                <input type="submit" value="удалить">
            </form>
        </div>

        <div><a href="{{ route('worker.show', $worker->id) }}">Просмотреть</a></div>
        <div><a href="{{ route('worker.edit', $worker->id) }}">Редактировать</a></div>

        <hr>
    @endforeach
    <div class="my-nav">
        {{ $workers->withQueryString()->links() }}
    </div>
<style>
    .my-nav svg {
        width:20px;
    }
</style>
</div>
</body>
</html>
