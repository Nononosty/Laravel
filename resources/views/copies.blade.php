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
        </thead>
@foreach ($copies as $copy)
    <tr>
        <td>{{$copy->id}}</td>
        <td>{{$copy->edition->name}}</td>
        <td>{{$copy->wear_coefficient}}</td>
    </tr>
@endforeach 
    </table>
</body>
</html>