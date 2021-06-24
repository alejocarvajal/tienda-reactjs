@extends('layouts.main')

@section('content')
    <form id="login-form" class="text-center" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email*</label>
            <input type="text" class="@error('email') is-invalid @enderror form-control" id="email"
                   placeholder="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Clave*</label>
            <input type="password" class="@error('password') is-invalid @enderror form-control" id="password"
                   name="password" value="{{ old('password') }}">
            @error('email')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <ul>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mt-1 mb-1">{{ $error }}</div>
                @endforeach
            </ul>
        </div>
        <div class="form-group row justify-content-center">
            <div class="col">
                <button type="submit" class="btn btn-primary" id="submit">Login</button>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary" id="register">Registrarme</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $("#login-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Campo obligatorio.",
                    email: "Ingrese un email válido"
                },
                password: {
                    required: "Campo obligatorio"
                }
            }
        });
    </script>
@endsection
