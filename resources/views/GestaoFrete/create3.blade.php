<x-layout tittle="Controle de Caminhões">

   <div class="container mt-5">
       <h1>Adicione um novo caminhão</h1>
       <hr>
       <form action="{{ route('caminhao-store') }}" method="POST">
           @csrf
           <div class="col-md-2">
           <div class="form-group">
               <div class="form-group">
                   <label for="placa">Placa: </label>
                   <input type="text" class="form-control {{$errors->has('placa') ? 'is-invalid' : ''}}" name="placa" placeholder="Digite uma placa..." value="{{old('placa')}}">
                   <div class="invalid-feedback">{{ $errors->first('placa') }}</div>
               </div>
               <br>
               <div class="form-group">
                   <label for="Carga_Max">Carga Máx (TON): </label>
                   <input type="number" class="form-control {{$errors->has('Carga_Max') ? 'is-invalid' : ''}}" min="0.01." step="0.01" oninput="validity.valid||(value='');" name="Carga_Max" placeholder="Digite a Carga Máxima..." value="{{old('Carga_Max')}}">
                   <div class="invalid-feedback">{{ $errors->first('Carga_Max') }}</div>
               </div>
               <br>
               <div class="form-group">
                  <label for="veiculo">Veiculo</label>
                   <div class="form-check">
                       <input type="radio" class="form-check-input {{$errors->has('veiculo') ? 'is-invalid' : ''}}" name="veiculo" id="veiculoP"
                              {{old('veiculo')=="Proprio" ? 'checked='.'"'.'checked'.'"' : '' }} value="Proprio">
                       <label for="veiculoP" class="form-check-label">Proprio</label>
                       <div class="invalid-feedback">{{ $errors->first('veiculo') }}</div>
                   </div>
                   <div class="form-check">
                       <input type="radio" class="form-check-input {{$errors->has('veiculo') ? 'is-invalid' : ''}}" name="veiculo" id="veiculoT"
                              {{old('veiculo')=="Terceiro" ? 'checked='.'"'.'checked'.'"' : '' }} value="Terceiro">
                       <label for="veiculoT" class="form-check-label">Terceiro</label>
                       <div class="invalid-feedback">{{ $errors->first('veiculo') }}</div>
                   </div>
               </div>
               <br>
               <div class="form-group">
                   <input type="submit" name="submit" class="btn btn-primary" value="Salvar">
                   <a href="{{ route('caminhao-index')}}" style="margin-inline: 10px" class="btn btn-danger">Voltar</a>
               </div>
           </div>
           </div>
       </form>
   </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
    <script>

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
