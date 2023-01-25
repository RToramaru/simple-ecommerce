@extends('layout.app')

@section('content')

<form>
    @csrf
    <div class="row">
        <div class="col-4">
            Cartão de crédito:
            <input type="text" class="ncredito form-control" name="ncredito"/>
        </div>

        <div class="col-4">
            CVV:
            <input type="text" class="cvv form-control" name="cvv"/>
        </div>

        <div class="col-4">
            Mês de Expiração:
            <input type="text" class="mes form-control" name="mes"/>
        </div>

        <div class="col-4">
            Ano de Expiração:
            <input type="text" class="ano form-control" name="ano"/>
        </div>

        <div class="col-4">
            Nome no cartão:
            <input type="text" class="nome form-control" name="nome"/>
        </div>

        <div class="col-4">
            Parcelas:
            <input type="text" class="parcela form-control" name="parcela"/>
        </div>

        <div class="col-4">
            Valor da parcela:
            <input type="text" class="vparcela form-control" name="vparcela"/>
        </div>

        <div class="col-4">
            Total:
            <input type="text" class="total form-control" name="total"/>
        </div>
    </div>
    <div class="col-4">
            <button class="pagar btn btn-primary mt-4">Pagar</button>
        </div>
</form>

@section('scripts')
@endsection
@endsection