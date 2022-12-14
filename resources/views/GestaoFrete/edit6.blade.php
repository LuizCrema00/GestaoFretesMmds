<x-layout tittle="Controle de Despesas Fixas">

   <div class="container mt-5">
       <h1>Alterar Despesa Fixa</h1>
       <hr>
       <form name="form_main" action="{{ route('despesasfixas-update', ['id'=>$despesasfixas->id]) }}" method="POST">
           @csrf
           @method('PUT')
            <div class="form-group">
                <div class="d-flex">
                    <div class="form-group" style="margin-inline: 10px" >
                        <label for="DataLanc">Data de lançamento: </label>
                        <input type="date" class="form-control {{$errors->has('DataLanc') ? 'is-invalid' : ''}}" name="DataLanc" id="date" value="{{$despesasfixas->DataLanc}}">
                        <div class="invalid-feedback">{{ $errors->first('DataLanc') }}</div>
                    </div>
                    <br>
                    <div class="form-group" style="margin-inline: 10px">
                        <label for="tipodespesa_id">Tipo Despesa: </label>
                        <select class="form-control {{$errors->has('tipodespesa_id') ? 'is-invalid' : ''}}" name="tipodespesa_id">
                            @foreach($tipodespesas as $tipodespesa)
                                <option value="{{$tipodespesa->id}}
                               "{{old('tipodespesa_id', $despesasfixas->tipodespesa->id ?? '') == $tipodespesa->id ? 'selected' : ''}}>{{$tipodespesa->TipoDespesa}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('tipodespesa_id') }}</div>
                    </div>
                    <br>
                    <div class="form-group" style="margin-inline: 10px">
                        <label for="Valor">Valor: </label>
                        <input type="number" class="form-control  {{$errors->has('Valor') ? 'is-invalid' : ''}}" name="Valor" placeholder="Digite o Valor..." min="0" oninput="validity.valid||(value='');" value="{{$despesasfixas->Valor}}">
                        <div class="invalid-feedback">{{ $errors->first('Valor') }}</div>
                    </div>
                </div>
                <br>
                <div class="d-flex">
                    <div class="form-group" style="margin-inline: 10px" >
                        <label for="DataVenc">Data de de Vencimento: </label>
                        <input type="date" class="form-control {{$errors->has('DataVenc') ? 'is-invalid' : ''}}" name="DataVenc" id="date" value="{{$despesasfixas->DataVenc}}">
                        <div class="invalid-feedback">{{ $errors->first('DataVenc') }}</div>
                    </div>
                    <div class="form-group" style="margin-inline: 10px">
                        <label for="Descricao">Descrição</label>
                        <textarea style="resize: horizontal" class="form-control {{$errors->has('Descricao') ? 'is-invalid' : ''}}" maxlength="50"  id="text" name="Descricao" oninput="countText()" rows="1"  placeholder="Descrição da despesa...">{{$despesasfixas->Descricao}}</textarea>
                        <label for="characters">Caracteres(máx 50): </label><span id="characters"></span>
                        <div class="invalid-feedback">{{ $errors->first('Descricao') }}</div>
                    </div>
                </div>
               <br>
                <p style="margin-inline: 10px">Obs: Arraste a área de texto para os lados para expandir ou encolher</p>
               <div class="form-group" style="margin: 15px">
                   <input type="submit" name="submit" class="btn btn-primary" value="Atualizar" >
                   <a href="{{ route('despesasfixas-index')}}" style="margin-inline: 10px" class="btn btn-danger">Voltar</a>
               </div>
           </div>
       </form>
   </div>

    <script>
        function countText(){
            let text = document.form_main.text.value;
            document.getElementById("characters").innerText = text.length;
        }
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
