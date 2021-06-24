@extends('layouts.main')

@section('content')

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

    @if(!empty($idpedido))
        <div class="form-group">
            <p>Tu número de pedido es :
            <div id="ordernumber" class="alert alert-success">
                {{ $idpedido }}
            </div>
            </p>
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <th>{{ $product['product'] }}</th>
                <td>${{ $product['price'] }}</td>
                <td>{{ $product['quantity'] }}</td>
                <td>${{ $product['total'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <form id="register-form" class="text-center" method="POST" action="{{ route('saveCart') }}">
        @csrf
        <div class="form-group">
            <label for="creditcard_name">Nombre en la tarjeta*</label>
            <input type="text" class="@error('creditcard_name') is-invalid @enderror form-control" id="creditcard_name"
                   placeholder="Nombre en la tarjeta" name="creditcard_name"
                   value="{{ $creditcard['creditcard_name'] }}">
            @error('creditcard_name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="creditcard_number">Número de la tarjeta*</label>
            <input type="text" class="@error('creditcard_number') is-invalid @enderror form-control"
                   id="creditcard_number"
                   placeholder="Número de la tarjeta" name="creditcard_number"
                   value="{{ $creditcard['creditcard_number'] }}">
            @error('creditcard_number')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="creditcard_code">Código de seguridad*</label>
            <input type="text" class="@error('creditcard_code') is-invalid @enderror form-control" id="creditcard_code"
                   placeholder="Código de seguridad" name="creditcard_code"
                   value="{{ $creditcard['creditcard_code'] }}">
            @error('creditcard_code')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="creditcard_date">Fecha de vencimiento*</label>
            <input type='text' class="@error('creditcard_date') is-invalid @enderror form-control" id="creditcard_date"
                   name="creditcard_date" value="{{ $creditcard['creditcard_date'] }}"/>
            @error('creditcard_date')
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
                <button type="submit" class="btn btn-primary" id="register">Finalizar compra</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $('#creditcard_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-dd-mm'
        });

        $("#register-form").validate({
            rules: {
                creditcard_name: {
                    required: true
                },
                creditcard_number: {
                    required: true
                },
                creditcard_code: {
                    required: true
                },
                creditcard_date: {
                    required: true
                }
            },
            messages: {
                creditcard_name: {
                    required: "Campo obligatorio"
                },
                creditcard_number: {
                    required: "Campo obligatorio"
                },
                creditcard_code: {
                    required: "Campo obligatorio."
                },
                creditcard_date: {
                    required: "Campo obligatorio"
                },
            }
        });
    </script>
@endsection
