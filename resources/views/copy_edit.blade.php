@extends('layout')
@section('content')
    <h2 class="mt-4 mb-4 text-center">Редактирование экземпляра</h2>

    <div class="row justify-content-center">
        <div class="col-4">
            <form method="POST" action="{{ url('copy/update/' . $copy->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="edition" class="form-label">Издание:</label>
                    <select class="form-select @error('edition_id') is-invalid @enderror"
                            id="edition" name="edition_id" aria-describedby="editionHelp">
                        <option value="" disabled selected hidden>Выберите издание</option>
                        @foreach ($editions as $edition)
                            <option value="{{ $edition->id }}"
                                {{ old('edition_id', $copy->edition_id) == $edition->id ? 'selected' : '' }}>
                                {{ $edition->name }}
                            </option>
                        @endforeach
                    </select>
                    <div id="editionHelp" class="form-text">Выберите издание для экземпляра</div>
                    @error('edition_id')
                        <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="wear_coefficient" class="form-label">Коэффициент износа:</label>
                    <input type="number" class="form-control @error('wear_coefficient') is-invalid @enderror"
                           id="wear_coefficient" name="wear_coefficient" step="0.01" min="0" max="1"
                           value="{{ old('wear_coefficient', $copy->wear_coefficient) }}"
                           aria-describedby="wearHelp">
                    <div id="wearHelp" class="form-text">Укажите коэффициент от 0 до 1</div>
                    @error('wear_coefficient')
                        <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection
