@extends('layout')
@section('content')
    <h2 class="mt-4 mb-4 text-center">Вход в систему</h2>

    <div class="row justify-content-center">
        <div class="col-4">
            <form method="POST" action="{{ url('auth') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" 
                           name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Введите ваш email</div>
                    @error('email')
                        <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" id="password" aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text">Введите пароль</div>
                    @error('password')
                        <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>
@endsection
