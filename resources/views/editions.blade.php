@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Список изданий</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light text-center">
                <tr>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th>Автор</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($editions as $edition)
                    <tr>
                        <td>{{ $edition->id }}</td>
                        <td>{{ $edition->name }}</td>
                        <td>{{ $edition->author }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
