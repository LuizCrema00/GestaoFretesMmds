<x-layout tittle="Controle de Fretes">

   <div class="container mt-5">
       <h1>Fechar Frete</h1>
       <hr>
       <form action="{{ route('frete-update', ['id'=>$fretes->id]) }}" method="POST">
           @csrf
           @method('PUT')
           <div class="form-group">
               <div class="d-flex">
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="cliente_id">Selecione o cliente deste frete</label>
                       <select class="form-control {{$errors->has('cliente_id') ? 'is-invalid' : ''}}" name="cliente_id">
                           @foreach($clientes as $cliente)
                               <option value="{{$cliente->id}}
                               "{{old('cliente_id', $fretes->cliente->id ?? '') == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('cliente_id') }}</div>
                   </div>
                   <br>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="DataFrete">Data Inicio do Frete: </label>
                       <input type="date" class="form-control {{$errors->has('DataFrete') ? 'is-invalid' : ''}}" id="date" name="DataFrete" value="{{$fretes->DataFrete}}">
                       <div class="invalid-feedback">{{ $errors->first('DataFrete') }}</div>
                   </div>
                   <br>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="CTe">CTe: </label>
                       <input type="text" class="form-control {{$errors->has('CTe') ? 'is-invalid' : ''}}" name="CTe" value="{{$fretes->CTe}}" placeholder="Digite uma CTe...">
                       <div class="invalid-feedback">{{ $errors->first('CTe') }}</div>
                   </div>
                   <br>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="motorista_id">Selecione o motorista deste frete</label>
                       <select class="form-control {{$errors->has('motorista_id') ? 'is-invalid' : ''}}" name="motorista_id">
                           @foreach($motoristas as $motorista)
                               <option value="{{$motorista->id}}
                               "{{old('motorista_id', $fretes->motorista->id ?? '') == $motorista->id ? 'selected' : ''}}>{{$motorista->nome}}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('motorista_id') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="ValorNF">Valor NF: </label>
                       <input type="number" class="form-control {{$errors->has('ValorNF') ? 'is-invalid' : ''}}" name="ValorNF" value="{{$fretes->ValorNF}}"  min="0.01." step="0.01" oninput="validity.valid||(value='');" placeholder="Digite o valor da Nota Fiscal...">
                       <div class="invalid-feedback">{{ $errors->first('ValorNF') }}</div>
                   </div>
               </div>
               <br>
               <div class="d-flex">
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="CidadeOrigem">Cidade Origem: </label>
                       <select class="form-control {{$errors->has('CidadeOrigem') ? 'is-invalid' : ''}}" id="cidade" name="CidadeOrigem">
                           <option value="">Selecione</option>
                           <option></option>
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('CidadeOrigem') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="UFOrigem">UF Origem: </label>
                       <select class="form-control {{$errors->has('UFOrigem') ? 'is-invalid' : ''}}" id="uf" name="UFOrigem">
                           <option value="">Selecione</option>
                           <option></option>
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('UFOrigem') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="CidadeDestino">Cidade Destino: </label>
                       <select class="form-control {{$errors->has('CidadeDestino') ? 'is-invalid' : ''}}" id="cidade2" name="CidadeDestino">
                           <option value="">Selecione</option>
                           <option></option>
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('CidadeDestino') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="UFDestino">UF Destino: </label>
                       <select class="form-control {{$errors->has('UFDestino') ? 'is-invalid' : ''}}" id="uf2" name="UFDestino">
                           <option value="">Selecione</option>
                           <option></option>
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('UFDestino') }}</div>
                   </div>
               </div>
               <br>
               <div class="d-flex">
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="DataFim">Data Fim do Frete: </label>
                       <input type="date" class="form-control {{$errors->has('DataFim') ? 'is-invalid' : ''}}" id="date" name="DataFim" value="{{$fretes->DataFim}}">
                       <div class="invalid-feedback">{{ $errors->first('DataFim') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="ValorFrete">Venda do frete: </label>
                       <input type="number" class="form-control {{$errors->has('ValorFrete') ? 'is-invalid' : ''}}" name="ValorFrete"  value="{{$fretes->ValorFrete}}" min="0.01." step="0.01" oninput="validity.valid||(value='');" placeholder="Digite o valor do Frete...">
                       <div class="invalid-feedback">{{ $errors->first('ValorFrete') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="CustoOperacao">Custo do frete: </label>
                       <input type="number" class="form-control  {{$errors->has('CustoOperacao') ? 'is-invalid' : ''}}" name="CustoOperacao" value="{{$fretes->CustoOperacao}}" min="0.01." step="0.01" oninput="validity.valid||(value='');" placeholder="Digite o custo do Frete...">
                       <div class="invalid-feedback">{{ $errors->first('CustoOperacao') }}</div>
                   </div>
               </div>
               <br>
               <p style="margin-inline: 10px">Obs: UF deve ser selecionada antes da cidade, caso o contr??rio aparecer?? vazia</p>
               <br>
               <div class="form-group" style="margin: 10px">
                   <input type="submit" name="submit" class="btn btn-primary" value="Atualizar">
                   <a href="{{ route('frete-index')}}" style="margin-inline: 10px" class="btn btn-danger">Voltar</a>
               </div>
           </div>
       </form>
   </div>

    <script>
        const urlUF= 'https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome'
        const cidade = document.getElementById("cidade")
        const uf = document.getElementById("uf")

        uf.addEventListener('change', async function (){
            const urlCidades='https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+uf.value+'/municipios'
            const request = await fetch(urlCidades)
            const response = await request.json()
            let options = ''
            response.forEach(function (cidades){
                options += '<option>'+cidades.nome+'</option>'
            })
            cidade.innerHTML = options
        });

        window.addEventListener('load', async ()=>{
            const request = await fetch(urlUF)
            const response = await request.json()

            const options = document.createElement("optgroup")
            options.setAttribute('label', 'UFs')
            response.forEach(function (uf){
                options.innerHTML += '<option>'+uf.sigla+'</option>'
            })
            uf.append(options)
        });

    </script>

    <script>
        const urlUF2= 'https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome'
        const cidade2 = document.getElementById("cidade2")
        const uf2 = document.getElementById("uf2")

        uf2.addEventListener('change', async function (){
            const urlCidades='https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+uf2.value+'/municipios'
            const request = await fetch(urlCidades)
            const response = await request.json()
            let options = ''
            response.forEach(function (cidades){
                options += '<option>'+cidades.nome+'</option>'
            })
            cidade2.innerHTML = options
        });

        window.addEventListener('load', async ()=>{
            const request = await fetch(urlUF2)
            const response = await request.json()

            const options = document.createElement("optgroup")
            options.setAttribute('label', 'UFs')
            response.forEach(function (uf){
                options.innerHTML += '<option>'+uf.sigla+'</option>'
            })
            uf2.append(options)
        });

    </script>
    <footer class="text-center text-white fixed-bottom" style="background-color: #0c63e4;">
        <!-- Grid container -->
        <div class="container p-4"></div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #0c63e4;">
            ?? 2022 Copyright: M.M.D.S Transportes Rodovi??rios
            <a class="text-white" href="https://mdbootstrap.com/"></a>
        </div>
        <!-- Copyright -->
    </footer>
</x-layout>
