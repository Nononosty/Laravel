<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
    <h2>{{$copy ? "Список читателей, бравших экземпляр № ".$copy->id : 'Неверный ID экземпляра' }}</h2>
    @if($copy)
    <table border="1">
        <thead>
            <td>ID читателя</td>
            <td>Фамилия</td>
            <td>Имя</td>
            <td>Отчество</td>
            <td>Дата выдачи</td>
            <td>Планируемая дата возврата</td>
            <td>Фактическая дата возврата</td>
        </thead>
        @foreach ($copy->users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->middle_name}}</td>
                <td>{{$user->pivot->lending_date}}</td>
                <td>{{$user->pivot->plan_return_date}}</td>
                <td>{{$user->pivot->fact_return_date}}</td>
            </tr>
        @endforeach 
    </table>
    @endif
</body>
</html>