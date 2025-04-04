<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
    <h2>Список экземпляров:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Издание</td>
            <td>Коэффициент износа</td>
            <td>Действия</td>
        </thead>
@foreach ($copies as $copy)
    <tr>
        <td>{{$copy->id}}</td>
        <td>{{$copy->edition->name}}</td>
        <td>{{$copy->wear_coefficient}}</td>
        <td><a href="{{url('copy/destroy/' .$copy->id)}}">Удалить</a>
            <a href="{{url('copy/edit/' .$copy->id)}}">Редактировать</a>
    </td>
    </tr>
@endforeach 
    </table>
</body>
</html>