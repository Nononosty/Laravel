<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
    <h2>{{$user ? "Список экземпляров читателя № ".$user->id : 'Неверный ID читателя' }}</h2>
    @if($user)
    <table border="1">
        <thead>
            <td>id экземпляра</td>
            <td>id издания</td>
            <td>Коэффициент износа</td>
            <td>Дата выдачи</td>
            <td>Планируемая дата возврата</td>
            <td>Фактическая дата возврата</td>
        </thead>
        @foreach ($user->copies as $copy)
            <tr>
                <td>{{$copy->id}}</td>
                <td>{{$copy->edition_id}}</td>
                <td>{{$copy->wear_coefficient}}</td>
                <td>{{$copy->pivot->lending_date}}</td>
                <td>{{$copy->pivot->plan_return_date}}</td>
                <td>{{$copy->pivot->fact_return_date}}</td>
            </tr>
        @endforeach 
    </table>
    @endif
</body>
</html>