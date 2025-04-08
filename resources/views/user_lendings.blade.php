@extends('layout')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Выданные вам книги</h2>

    @if ($user->copies->isEmpty())
        <p class="text-center">У вас нет выданных книг.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-light text-center">
                <tr>
                    <th>Название издания</th>
                    <th>Дата выдачи</th>
                    <th>Планируемая дата возврата</th>
                    <th>Фактическая дата возврата</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->copies as $copy)
                    <tr>
                        <td>{{ $copy->edition->name }}</td>
                        <td>{{ $copy->pivot->lending_date }}</td>
                        <td>{{ $copy->pivot->plan_return_date }}</td>
                        <td>{{ $copy->pivot->fact_return_date ?? '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
