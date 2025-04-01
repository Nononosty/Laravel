<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
    <h2>Список изданий:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Наименование</td>
            <td>Автор</td>
        </thead>
@foreach ($editions as $edition)
    <tr>
        <td>{{$edition->id}}</td>
        <td>{{$edition->name}}</td>
        <td>{{$edition->author}}</td>
    </tr>
@endforeach 
    </table>
</body>
</html>