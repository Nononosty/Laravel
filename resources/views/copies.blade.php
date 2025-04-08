@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Список экземпляров</h2>
        <table class="table table-bordered">
            <thead class="table-light text-center">
                <tr>
                    <th>ID</th>
                    <th>Издание</th>
                    <th>Коэффициент износа</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($copies as $copy)
                    <tr>
                        <td>{{ $copy->id }}</td>
                        <td>{{ $copy->edition->name }}</td>
                        <td>{{ $copy->wear_coefficient }}</td>
                        <td class="text-center">
                            <a href="{{ url('copy/edit/' . $copy->id) }}" class="btn btn-sm btn-warning me-1">Редактировать</a>
                            <a href="{{ url('copy/destroy/' . $copy->id) }}" class="btn btn-sm btn-danger">Удалить</a>
                            <a href="{{ url('lending/create/' . $copy->id) }}" class="btn btn-sm btn-success">Выдать</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $copies->links() }}
        </div>

    </div>
@endsection
