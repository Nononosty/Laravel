<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
<h2>Добавление экземпляров</h2>
<form method="POST" action="{{ url('copy') }}">
    @csrf 
    <label>Издание:</label>
    <select name="edition_id">
        <option value="" disabled selected>Выберите издание</option>
        @foreach ($editions as $edition)
            <option value="{{ $edition->id }}" 
                {{ old('edition_id') == $edition->id ? 'selected' : '' }}>
                {{ $edition->name }}
            </option>
        @endforeach
    </select>
    @error('edition_id')
        <div class="is-invalid">{{ $message }}</div>
    @enderror

    <br>
    <label>Коэффициент износа:</label>
    <input type="number" name="wear_coefficient" step="0.01" min="0" max="1" 
           value="{{ old('wear_coefficient') }}">
    @error('wear_coefficient')
        <div class="is-invalid">{{ $message }}</div>
    @enderror

    <br>
    <input type="submit" value="Добавить">
</form>

</body>
</html>
