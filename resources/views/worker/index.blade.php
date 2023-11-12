<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <div>
        <a href="{{ route('workers.create') }}">Добавить</a>
    </div>
    @foreach($workers as $worker)
        <hr>
        <div>
            <div>Name: {{ $worker->name }}</div>
            <div>Surname: {{ $worker->surname }}</div>
            <div>Email: {{ $worker->email }}</div>
            <div>Age: {{ $worker->age }}</div>
            <div>Description: {{ $worker->discription }}</div>
            <div>Is married: {{ $worker->is_married }}</div>
            <div>
                <a href="{{ route('workers.show', $worker->id) }}">Просмотреть</a>
            </div>
            <div>
                <a href="{{ route('workers.edit', $worker->id) }}">Редактировать</a>
            </div>
            <div>
                <form action="{{ route('workers.delete', $worker->id) }}" method="post">
                    @csrf
                    @method('Delete')
                    <input type="submit" value="Удалить">
                </form>
            </div>
        </div>
        <hr>
    @endforeach
</div>

</body>
</html>
