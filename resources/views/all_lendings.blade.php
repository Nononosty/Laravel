@extends('layout')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Все выданные книги</h2>

    @foreach ($users as $user)
        @if ($user->copies->isNotEmpty())
            <div class="mb-4">
            <h5>Читатель ID: {{ $user->id }} — {{ $user->last_name }} {{ $user->first_name }} {{ $user->middle_name }}</h5>
                <table class="table table-bordered">
                    <thead class="table-light text-center">
                        <tr>
                            <th>ID экземпляра</th>
                            <th>Издание</th>
                            <th>Коэффициент износа</th>
                            <th>Дата выдачи</th>
                            <th>План. возврат</th>
                            <th>Факт. возврат</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->copies as $copy)
                            <tr>
                                <td>{{ $copy->id }}</td>
                                <td>{{ $copy->edition->name ?? '—' }}</td>
                                <td>{{ $copy->wear_coefficient }}</td>
                                <td>{{ $copy->pivot->lending_date }}</td>
                                <td>{{ $copy->pivot->plan_return_date }}</td>
                                <td>{{ $copy->pivot->fact_return_date ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach
</div>
@endsection
