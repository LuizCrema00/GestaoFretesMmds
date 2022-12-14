<x-layout tittle="Despesas do Frete">
    <div class="container">
        <table class="table datatables">
            <thead>
            <tr>
                <th scope="col">CTe</th>
                <th scope="col">Data do Fim do frete</th>
                <th scope="col">Tipo Despesa</th>
                <th scope="col">Valor Despesa</th>
                <th scope="col">Descrição</th>
            </tr>
            </thead>
            <tbody>
            @foreach($despesas as $despesa)
                <tr>
                    <th>{{ $despesa->frete->CTe }}</th>
                    <th>{{ date('d/m/Y', strtotime($despesa->frete->DataFim))}}</th>
                    <th>{{ $despesa->tipodespesa->TipoDespesa }}</th>
                    <th class="text-end">R${{ number_format($despesa->frete->CustoOperacao, 2 , ",", ".")}}</th>
                    <th>{{ $despesa->Descricao }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="form-group">
            <a href="{{ route('frete-index')}}" class="btn btn-danger">Voltar</a>
        </div>

    </div>
</x-layout>
