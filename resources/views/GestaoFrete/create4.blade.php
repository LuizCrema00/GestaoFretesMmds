<x-layout tittle="Controle de Fretes">

   <div class="container mt-5">
       <h1>Adicione um novo Frete</h1>
       <hr>
       <form name="personForm" id="personForm" action="{{ route('frete-store') }}" method="POST">
           @csrf
           <div class="form-group">
               <div class="d-flex">
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="cliente_id">Selecione o cliente deste frete</label>
                       <select class="form-control {{$errors->has('cliente_id') ? 'is-invalid' : ''}}" name="cliente_id">
                           <option value="">Selecione</option>
                           @foreach($clientes as $cliente)
                               <option value="{{$cliente->id}}" @if(old('cliente_id')==$cliente->id) {{'selected'}} @endif>{{$cliente->nome}}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('cliente_id') }}</div>
                   </div>
                   <br>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="DataFrete">Data Início do frete: </label>
                       <input type="date" class="form-control {{$errors->has('DataFrete') ? 'is-invalid' : ''}}" id="date" name="DataFrete" value="{{old('DataFrete')}}">
                       <div class="invalid-feedback">{{ $errors->first('DataFrete') }}</div>
                   </div>
                   <br>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="CTe">CTe: </label>
                       <input type="text" class="form-control {{$errors->has('CTe') ? 'is-invalid' : ''}}" name="CTe" placeholder="Digite uma CTe..." value="{{old('CTe')}}">
                       <div class="invalid-feedback">{{ $errors->first('CTe') }}</div>
                   </div>
                   <br>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="motorista_id">Selecione o motorista deste frete</label>
                       <select class="form-control {{$errors->has('motorista_id') ? 'is-invalid' : ''}}" name="motorista_id">
                           <option value="">Selecione</option>
                           @foreach($motoristas as $motorista)
                               <option value="{{$motorista->id}}" @if(old('motorista_id')==$motorista->id) {{'selected'}} @endif>{{$motorista->nome}}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('motorista_id') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="ValorNF">Valor NF: </label>
                       <input type="number" class="form-control {{$errors->has('ValorNF') ? 'is-invalid' : ''}}" name="ValorNF" min="0.01." step="0.01" oninput="validity.valid||(value='');" placeholder="Digite o valor da Nota Fiscal..." value="{{old('ValorNF')}}">
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
                   <br>
               </div>
               <br>
               <p style="margin-inline: 10px">Obs: UF deve ser selecionada antes da cidade, caso o contrário aparecerá vazia</p>
               <div class="d-flex">
                   <div class="form-group" style="margin: 10px">
                       <input type="submit" name="submit" class="btn btn-primary" value="Salvar" >
                       <a href="{{ route('frete-index')}}" style="margin: 10px" class="btn btn-danger">Voltar</a>
                   </div>
               </div>
           </div>
       </form>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>


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
            © 2022 Copyright: M.M.D.S Transportes Rodoviários
            <a class="text-white" href="https://mdbootstrap.com/"></a>
        </div>
        <!-- Copyright -->
    </footer>
</x-layout>
