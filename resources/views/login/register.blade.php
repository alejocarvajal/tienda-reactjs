@extends('layouts.main')

@section('content')
    <form id="register-form" class="text-center" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre*</label>
            <input type="text" class="@error('name') is-invalid @enderror form-control" id="name"
                   placeholder="Nombre" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastname">Apellidos*</label>
            <input type="text" class="@error('lastname') is-invalid @enderror form-control" id="password"
                   placeholder="Apellidos" name="lastname" value="{{ old('lastname') }}">
            @error('lastname')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
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
            <label for="cellphone">Celular*</label>
            <input type="text" class="@error('cellphone') is-invalid @enderror form-control" id="cellphone"
                   placeholder="Celular" name="cellphone" value="{{ old('cellphone') }}">
            @error('cellphone')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Dirección*</label>
            <input type="text" class="@error('lastname') is-invalid @enderror form-control" id="address"
                   placeholder="Dirección" name="address" value="{{ old('address') }}">
            @error('address')
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
                <button type="submit" class="btn btn-primary" id="register">Registrarme</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $("#register-form").validate({
            rules: {
                name: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
                cellphone: {
                    required: true
                },
                address: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Campo obligatorio"
                },
                lastname: {
                    required: "Campo obligatorio"
                },
                email: {
                    required: "Campo obligatorio.",
                    email: "Ingrese un email válido"
                },
                password: {
                    required: "Campo obligatorio"
                },
                cellphone: {
                    required: "Campo obligatorio"
                },
                address: {
                    required: "Campo obligatorio"
                },
            }
        });
    </script>
@endsection
