@extends('layouts.app')

@section('content')

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Carrito de compra</div>

                    <div class="card-body">
                        @if(isset($order) && $order->status)
                            <div class="form-group">
                                <p>Tu número de pedido es :
                                <div id="ordernumber" class="alert alert-success">
                                    {{ $order->id}}
                                </div>
                                </p>
                            </div>
                        @endif
                        @if(isset($order))
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
                                <?php $subtotal = 0 ?>

                                @foreach($order->products as $product)
                                    <?php
                                    $subtotal = $subtotal + ($product->price * $product->quantity);
                                    ?>
                                    <tr>
                                        <th>{{ $product->name }}</th>
                                        <td>${{ number_format($product->price) }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>${{ number_format($product->price * $product->pivot->quantity) }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Subtotal</th>
                                    <th>${{ number_format($order->total) }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        @endif

                        <form id="register-form" class="text-center" method="POST" action="{{ route('saveCart') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="creditcard_name">Nombre en la
                                    tarjeta*</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="@error('creditcard_name') is-invalid @enderror form-control"
                                           id="creditcard_name"
                                           placeholder="Nombre en la tarjeta" name="creditcard_name"
                                           value="{{ old('creditcard_name', isset($credit_card->name) ? $credit_card->name : '' ) }}">
                                    @error('creditcard_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="creditcard_number">Número de
                                    la tarjeta*</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="@error('creditcard_number') is-invalid @enderror form-control"
                                           id="creditcard_number"
                                           placeholder="Número de la tarjeta" name="creditcard_number"
                                           value="{{ old('creditcard_number', isset($credit_card->number) ? $credit_card->number : '' ) }}">
                                    @error('creditcard_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="creditcard_code">Código de
                                    seguridad*</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="@error('creditcard_code') is-invalid @enderror form-control"
                                           id="creditcard_code"
                                           placeholder="Código de seguridad" name="creditcard_code"
                                           value="{{ old('creditcard_code', isset($credit_card->code) ? $credit_card->code : '' ) }}">
                                    @error('creditcard_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="creditcard_date">Fecha de
                                    vencimiento*</label>
                                <div class="col-md-6">
                                    <input type='text'
                                           class="@error('creditcard_date') is-invalid @enderror form-control"
                                           id="creditcard_date"
                                           name="creditcard_date"
                                           value="{{ old('creditcard_date', isset($credit_card->date) ? $credit_card->date : '' ) }}"/>
                                    @error('creditcard_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
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
                                    @if( isset($order) && !$order->status)
                                        <input type="hidden" name='ordernumber' value="{{ $order->id }}">
                                        <button type="submit" class="btn btn-primary" id="register">Finalizar compra
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
