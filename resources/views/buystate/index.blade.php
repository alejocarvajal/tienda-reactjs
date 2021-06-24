@extends('layouts.main')

@section('content')
    <form id="buystate-form" class="text-center" method="POST" action="{{ route('getState') }}">
        @csrf
        <div class="form-group">
            <label for="idpedido">Número de pedido*</label>
            <input type="text" class="@error('idpedido') is-invalid @enderror form-control" id="idpedido"
                   placeholder="Número de pedido" name="idpedido" value="{{ old('idpedido') }}">
            @error('idpedido')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        @if(!empty($response['status']))
            <div class="form-group">
                <p>Su estado es:
                <div id="buystate" class="{{  $response['status'] == 1 ? "alert alert-success" : "alert alert-danger" }}">
                    {{ 'Pedido '.$response['idpedido']. ' : '.$response['message'] }}
                </div>
                </p>
            </div>
        @endif
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Consultar</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
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
