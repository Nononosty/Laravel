@extends('layout')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Выдача книги пользователю</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('lending/store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Читатель:</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">Выберите читателя</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">№{{ $user->id }} - {{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="copy_id" class="form-label">Экземпляр книги:</label>
            <select name="copy_id" class="form-select">
                @foreach ($copies as $copy)
                    <option value="{{ $copy->id }}" @if(isset($selectedCopyId) && $selectedCopyId == $copy->id) selected @endif>
                        {{ $copy->id }} — {{ $copy->edition->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="lending_date" class="form-label">Дата выдачи:</label>
            <input type="date" name="lending_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="plan_return_date" class="form-label">Планируемая дата возврата:</label>
            <input type="date" name="plan_return_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fact_return_date" class="form-label">Фактическая дата возврата</label>
            <input type="date" name="fact_return_date" class="form-control" id="fact_return_date">
        </div>

        <button type="submit" class="btn btn-primary">Выдать</button>
    </form>
</div>
@endsection
