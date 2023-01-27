@extends('layout.app')

@section('content')

<form>
    @php $total = 0; @endphp
    @if(isset($cart) && count($cart) > 0)
        @foreach($cart as $id => $product)
            @php $total += $product->price; @endphp
        @endforeach
    @endif
    <h1>Dados do cartão</h1>
    @csrf
    <div class="row">
        <div class="col-4">
            Cartão de crédito:
            <input type="text" class="ncredito form-control" name="ncredito" />
        </div>

        <div class="col-4">
            CVV:
            <input type="text" class="cvv form-control" name="cvv" />
        </div>

        <div class="col-4">
            Mês de Expiração:
            <input type="text" class="mes form-control" name="mes" />
        </div>

        <div class="col-4">
            Ano de Expiração:
            <input type="text" class="ano form-control" name="ano" />
        </div>

        <div class="col-4">
            Nome no cartão:
            <input type="text" class="nome form-control" name="nome" />
        </div>

        <div class="col-4">
            <label for="parcela">Parcelas:</label>
            <select class="form-control parcela" name="parcela">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <div class="col-4">
            Valor da parcela:
            <input type="text" class="vparcela form-control" name="vparcela" disabled value="R$ {{ $total }}"/>
        </div>

        <div class="col-4">
            Total:
            <input type="text" class="total form-control" name="total" value="R$ {{ $total }}" disabled />
        </div>
    </div>
    <div class="col-4">
        <button class="pagar btn btn-primary mt-4">Pagar</button>
    </div>
    <input type="hidden" name="senderHash" value="" />
    <input type="hidden" name="brand" value="" />
</form>

@section('scripts')

<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        PagSeguroDirectPayment.setSessionId('{{ $id_session }}');
        $(".ncredito").on("blur", function() {
            PagSeguroDirectPayment.onSenderHashReady(function(response) {
                if (response.status == 'error') {
                    console.log(response.message);
                    return false;
                }
                var hash = response.senderHash;
                $("input[name=senderHash]").val(hash);
            });

            var ncartao = $(this).val();
            $("input[name=brand]").val("");
            if(ncartao.length > 6) {
                let prefix = ncartao.substr(0, 6);
                PagSeguroDirectPayment.getBrand({
                    cardBin: prefix,
                    success: function(response) {
                        let bandeira = response.brand.name;
                        $("input[name=brand]").val(bandeira);
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function(response) {
                        console.log(response);
                    }
                });
            }
        });

        $(".parcela").on("change", function() {
            var bandeira = $("input[name=brand]").val();
            var parcela = $(this).val();

            PagSeguroDirectPayment.getInstallments({
                amount: $("input[name=total]").val().replaceAll('R$ ', ''),
                maxInstallmentNoInterest: 2,
                brand: bandeira,
                success: function(response) {
                    let index = parcela - 1;
                    let valor = response.installments[bandeira][index].installmentAmount;
                    let total = response.installments[bandeira][index].totalAmount;
                    $("input[name=vparcela]").val('R$ ' + valor);
                },
                error: function(response) {
                    console.log(response);
                },
                complete: function(response) {
                    console.log(response);
                }
            });

        });

        $(".pagar").on("click", function(e) {
            e.preventDefault();
            PagSeguroDirectPayment.getPaymentMethods({
                amount: $("input[name=total]").val().replaceAll('R$ ', ''),
                success: function(response) {
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
                complete: function(response) {
                    console.log(response);
                }
            });

            var bandeira = $("input[name=brand]").val();
            var ncartao = $(".ncredito").val();
            var cvv = $(".cvv").val();
            var mes = $(".mes").val();
            var ano = $(".ano").val();
            var nome = $(".nome").val();

            PagSeguroDirectPayment.createCardToken({
                cardNumber: ncartao,
                brand: bandeira,
                cvv: cvv,
                expirationMonth: mes,
                expirationYear: ano,
                success: function(response) {
                    var token = response.card.token;
                    $post('{{ route("finalize_cart") }}', {
                        _token: "{{ csrf_token() }}",
                        token: token,
                        nome: nome,
                        parcela: $(".parcela").val(),
                        total: $("input[name=total]").val().replaceAll('R$ ', ''),
                        vparcela: $("input[name=vparcela]").val().replaceAll('R$ ', ''),
                        senderHash: $("input[name=senderHash]").val(),
                    }, function(response) {
                        console.log(response);
                    });
                },
                error: function(response) {
                    console.log('error 01')
                    console.log(response);
                },
                complete: function(response) {
                    console.log('error 02')
                    console.log(response);
                }
            });
        });
    });
</script>
@endsection
@endsection