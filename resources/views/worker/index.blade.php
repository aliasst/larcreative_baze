@extends('layout.main')

@section('content')
  @can('create', \App\Models\Worker::class)
 <div><a href="{{ route('workers.create') }}">Добавить рабочего</a></div>
  @endcan
<hr><br><br>
    <div>
        <form action="{{ route ('workers.index') }}">
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
            <a href="{{ route('workers.index') }}">Сбросить фильтр</a>
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
            <form action="{{ route('workers.destroy', $worker->id) }}" method="post">
                @csrf
                @method('Delete')
                <input type="submit" value="удалить">
            </form>
        </div>

        <div><a href="{{ route('workers.show', $worker->id) }}">Просмотреть</a></div>
        @can('update', $worker)
        <div><a href="{{ route('workers.edit', $worker->id) }}">Редактировать</a></div>
        @endcan
        <hr>
    @endforeach
    <div class="my-nav">
        {{ $workers->withQueryString()->links() }}
    </div>

</div>
@endsection
