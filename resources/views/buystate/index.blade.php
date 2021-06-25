@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Estado pedido</div>

                    <div class="card-body">
                        <form id="buystate-form" class="text-center" method="POST" action="{{ route('getState') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="idpedido">Número de pedido*</label>
                                <div class="col-md-6">
                                    <input type="text" class="@error('idpedido') is-invalid @enderror form-control"
                                           id="idpedido"
                                           placeholder="Número de pedido" name="idpedido" value="{{ old('idpedido'),  $response['idpedido']}}">
                                    @error('idpedido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if(!empty($response['message']))
                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">
                                    </div>
                                    <div class="col-md-4 col-form-label text-md-right">
                                        <p>
                                        <div id="buystate"
                                             class="{{  !isset($response['error']) ? "alert alert-success" : "alert alert-danger" }}">
                                            {{ 'Pedido '.$response['idpedido']. ' : '.$response['message'] }}
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="submit">Consultar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $("#buystate-form").validate({
            rules: {
                idpedido: {
                    required: true,
                    digits: true
                }
            },
            messages: {
                idpedido: {
                    required: "Campo obligatorio.",
                    digits: "Solo se permiten números"
                }
            }
        });
    </script>
@endsection
