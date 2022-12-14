<x-layout tittle="Controle de Despesas">

   <div class="container mt-5">
       <h1>Adicione uma nova despesa</h1>
       <hr>
       <form name="form_main" action="{{ route('despesa-store') }}" method="POST">
           @csrf
           <div class="form-group">
               <div class="d-flex">
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="frete_id">Selecione a CTe</label>
                       <select class="form-control {{$errors->has('frete_id') ? 'is-invalid' : ''}}" name="frete_id">
                           <option value="">Selecione</option>
                           @foreach($fretes as $frete)
                               <option value="{{$frete->id}}" @if(old('frete_id')==$frete->id) {{'selected'}} @endif>{{$frete->CTe}}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('frete_id') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="frete_id">Selecione a Data de Fim do frete: </label>
                       <select class="form-control {{$errors->has('frete_id') ? 'is-invalid' : ''}}" name="frete_id">
                           <option value="">Selecione</option>
                           @foreach($fretes as $frete)
                               <option value="{{$frete->id}}" @if(old('frete_id')==$frete->id) {{'selected'}} @endif>{{ date('d/m/Y', strtotime($frete->DataFim))}}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('frete_id') }}</div>
                   </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="tipodespesa_id">Tipo Despesa: </label>
                   <select class="form-control {{$errors->has('tipodespesa_id') ? 'is-invalid' : ''}}" name="tipodespesa_id">
                       <option value="">Selecione</option>
                       @foreach($tipodespesas as $tipodespesa)
                           <option value="{{$tipodespesa->id}}" @if(old('tipodespesa_id')==$tipodespesa->id) {{'selected'}} @endif>{{$tipodespesa->TipoDespesa}}</option>
                       @endforeach
                   </select>
                   <div class="invalid-feedback">{{ $errors->first('tipodespesa_id') }}</div>
               </div>
               </div>
               <br>
               <div class="d-flex">
               <br>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="frete_id">Custo do frete: </label>
                       <select class="form-control  {{$errors->has('frete_id') ? 'is-invalid' : ''}}" name="frete_id">
                           <option value="">Selecione</option>
                           @foreach($fretes as $frete)
                               <option value="{{$frete->id}}" @if(old('frete_id')==$frete->id) {{'selected'}} @endif>R${{ number_format($frete->CustoOperacao, 2 , ",", ".")}}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback">{{ $errors->first('frete_id') }}</div>
                   </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="Descricao">Descrição</label>
                       <textarea style="resize: horizontal" class="form-control {{$errors->has('Descricao') ? 'is-invalid' : ''}}" maxlength="50"  id="text" name="Descricao" oninput="countText()" rows="1"  placeholder="Descrição da despesa...">{{old('Descricao')}}</textarea>
                       <label for="characters">Caracteres(máx 50): </label><span id="characters"></span>
                       <div class="invalid-feedback">{{ $errors->first('Descricao') }}</div>
                   </div>
               </div>
               <br>
               <p style="margin-inline: 10px">Obs: Arraste a área de texto para os lados para expandir ou encolher</p>
               <div class="form-group" style="margin: 10px">
                   <input type="submit" name="submit" class="btn btn-primary" value="Salvar">
                   <a href="{{ route('despesa-index')}}" class="btn btn-danger" style="margin-inline: 10px">Voltar</a>
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
