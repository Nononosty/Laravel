<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
    <h2>{{$edition ? "Список копий издания ".$edition->name : 'Неверный ID издания' }}</h2>
    @if($edition)
    <table border="1">
        <thead>
            <td>id</td>
            <td>id издания</td>
            <td>Коэффициент износа</td>
        </thead>
        @foreach ($edition->copies as $copy)
            <tr>
                <td>{{$copy->id}}</td>
                <td>{{$copy->edition_id}}</td>
                <td>{{$copy->wear_coefficient}}</td>
            </tr>
        @endforeach 
    </table>
    @endif
</body>
</html>