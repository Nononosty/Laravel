<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
<h2>Редактирование экземпляров</h2>
<form method="POST" action="{{ url('copy/update/' . $copy->id) }}">
    @csrf 
    <label>Издание:</label>
    <select name="edition_id">
        <option style="display:none" value="">Выберите издание</option>
        @foreach ($editions as $edition)
            <option value="{{ $edition->id }}"
                @if (old('edition_id'))
                    @if (old('edition_id') == $edition->id) selected @endif
                @else
                    @if ($copy->edition_id == $edition->id) selected @endif
                @endif>
                {{ $edition->name }}
            </option>
        @endforeach
    </select>
    @error('edition_id')
        <div class="is-invalid">{{ $message }}</div>
    @enderror


    <label>Коэффициент износа:</label>
    <input type="number" name="wear_coefficient" step="0.01" min="0" max="1"
        value="@if(old('wear_coefficient')) {{ old('wear_coefficient') }} @else {{ $copy->wear_coefficient }} @endif">
    @error('wear_coefficient')
        <div class="is-invalid">{{ $message }}</div>
    @enderror

<br>
    <input type="submit" value="Обновить">
</form>

</body>
</html>