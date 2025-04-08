@extends('layout')
@section('content')

<head>
    <meta charset="UTF-8">
    <title>609-22</title>
    <style> .is-invalid { color: red; } </style>
</head>
<h2 class="mt-4 mb-4 text-center">Добавление экземпляров</h2>

<div class="row justify-content-center">
    <div class="col-4">
        <form method="POST" action="{{ url('copy') }}">
            @csrf 
            <div class="mb-3">
                <label for="edition" class="form-label">Издание:</label>
                <select class="form-select" id="edition" name="edition_id" aria-describedby="editionHelp" value={{ old('edition_id') }}>
                    <option value="" disabled selected></option>
                    @foreach ($editions as $edition)
                        <option value="{{ $edition->id }}" 
                            {{ old('edition_id') == $edition->id ? 'selected' : '' }}>
                            {{ $edition->name }}
                        </option>
                    @endforeach
                </select>
                <div id="editionHelp" class="form-text">Выберите издание</div>
                @error('edition_id')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="wear_coefficient" class="form-label">Коэффициент износа:</label>
                <input type="number" class="form-control @error('wear_coefficient') is-invalid @enderror" 
                    id="wear_coefficient" name="wear_coefficient" aria-describedby="wear_coefficientHelp" step="0.01" min="0" max="1" 
                    value="{{ old('wear_coefficient') }}">
                    <div id="wear_coefficientHelp" class="form-text">Укажите коэффициент износа от 0 до 1</div>
                @error('wear_coefficient')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection

