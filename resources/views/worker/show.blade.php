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
        <div>Name: {{ $worker->name }}</div>
        <div>Surame: {{ $worker->surname }}</div>
        <div>Email: {{ $worker->email }}</div>
        <div>Age: {{ $worker->age }}</div>
        <div>Description: {{ $worker->description }}</div>
        <div><a href="{{ route('worker.edit', $worker->id) }}">Редактировать</a></div>
        <div><a href="{{ route('worker.index') }}">Назад</a></div>
        <hr>
</div>
</body>
</html>
