<x-layout tittle="Controle de Despesas">

   <div class="container mt-5">
       <h1>Alterar Despesa do Frete</h1>
       <hr>
       <form name="form_main" action="{{ route('despesa-update', ['id'=>$despesas->id]) }}" method="POST">
           @csrf
           @method('PUT')
           <div class="form-group">
               <div class="d-flex">
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="frete_id">Selecione a CTe: </label>
                       <select class="form-control" name="frete_id">
                           @foreach($fretes as $frete)
                               <option value="{{$frete->id}}
                               "{{old('frete_id', $despesas->frete->id ?? '') == $frete->id ? 'selected' : ''}}>{{$frete->CTe}}</option>
                           @endforeach
                       </select>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="frete_id">Selecione a Data de Fim do Frete: </label>
                       <select class="form-control" name="frete_id">
                           @foreach($fretes as $frete)
                               <option value="{{$frete->id}}
                               "{{old('frete_id', $despesas->frete->id ?? '') == $frete->id ? 'selected' : ''}}>{{ date('d/m/Y', strtotime($frete->DataFim))}}</option>
                           @endforeach
                       </select>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="tipodespesa_id">Tipo Despesa: </label>
                       <select class="form-control" name="tipodespesa_id">
                           @foreach($tipodespesas as $tipodespesa)
                               <option value="{{$tipodespesa->id}}
                               "{{old('tipodespesa_id', $despesas->tipodespesa->id ?? '') == $tipodespesa->id ? 'selected' : ''}}>{{$tipodespesa->TipoDespesa}}</option>
                           @endforeach
                       </select>
                   </div>
               </div>
               <br>
               <div class="d-flex">
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="frete_id">Custo do Frete: </label>
                       <select class="form-control" name="frete_id">
                           @foreach($fretes as $frete)
                               <option value="{{$frete->id}}
                               "{{old('frete_id', $despesas->frete->id ?? '') == $frete->id ? 'selected' : ''}}>{{$frete->CustoOperacao}}</option>
                           @endforeach
                       </select>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="Descricao">Descrição</label>
                       <textarea style="resize: horizontal" class="form-control {{$errors->has('Descricao') ? 'is-invalid' : ''}}" maxlength="50"  id="text" name="Descricao" oninput="countText()" rows="1"  placeholder="Descrição da despesa...">{{$despesas->Descricao}}</textarea>
                       <label for="characters">Caracteres(máx 50): </label><span id="characters"></span>
                       <div class="invalid-feedback">{{ $errors->first('Descricao') }}</div>
                   </div>
               </div>
               <br>
               <p style="margin-inline: 10px">Obs: Arraste a área de texto para os lados para expandir ou encolher</p>
               <div class="form-group">
                   <input type="submit" name="submit" value="Atualizar" class="btn btn-primary" style="margin-inline: 10px">
                   <a href="{{ route('despesa-index')}}" class="btn btn-danger">Voltar</a>
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
