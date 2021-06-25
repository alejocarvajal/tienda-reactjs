@extends('layouts.app')

@section('content')

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Método de pago</div>

                    <div class="card-body">
                        <form id="register-form" class="text-center" method="POST"
                              action="{{ route('registerPaymentMethod') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="creditcard_name">Nombre*</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="@error('creditcard_name') is-invalid @enderror form-control"
                                           id="creditcard_name"
                                           placeholder="Nombre en la tarjeta" name="creditcard_name"
                                           value="{{ old('creditcard_name', isset($credit_card_data->name) ? $credit_card_data->name : '' ) }}">
                                    @error('creditcard_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="creditcard_number">Número*</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="@error('creditcard_number') is-invalid @enderror form-control"
                                           id="creditcard_number"
                                           placeholder="Número de la tarjeta" name="creditcard_number"
                                           value="{{ old('creditcard_number', isset($credit_card_data->number) ? $credit_card_data->number : '' ) }}">
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
                                           value="{{ old('creditcard_code', isset($credit_card_data->code) ? $credit_card_data->code : '' ) }}">
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
                                           name="creditcard_date" value="{{ old('creditcard_date', isset($credit_card_data->date) ? $credit_card_data->date : '' ) }}"/>
                                    @error('creditcard_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <div class="invalid-feedback">{{ $error }}</div>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" id="register">Registrar</button>
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
            format: 'yyyy-mm-dd'
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
