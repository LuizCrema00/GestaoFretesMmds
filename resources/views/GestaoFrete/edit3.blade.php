<x-layout tittle="Controle de Caminhões">

   <div class="container mt-5">
       <h1>Alterar caminhão</h1>
       <hr>
       <form action="{{ route('caminhao-update', ['id'=>$caminhaos->id]) }}" method="POST">
           @csrf
           @method('PUT')
           <div class="col-md-2">
           <div class="form-group">
               <div class="form-group">
                   <label for="placa">Placa: </label>
                   <input type="text" class="form-control {{$errors->has('placa') ? 'is-invalid' : ''}}" name="placa" value="{{$caminhaos->placa}}" placeholder="Digite uma placa...">
                   <div class="invalid-feedback">{{ $errors->first('placa') }}</div>
               </div>
               <br>
               <div class="form-group">
                   <label for="Carga_Max">Carga Máxima: </label>
                   <input type="text" class="form-control {{$errors->has('Carga_Max') ? 'is-invalid' : ''}}" name="Carga_Max" value="{{$caminhaos->Carga_Max}}" placeholder="Digite a Carga Máxima...">
                   <div class="invalid-feedback">{{ $errors->first('Carga_Max') }}</div>
               </div>
               <br>
               <div class="form-group">
                   <label for="veiculo">Veiculo</label>
                   <div class="form-check">
                       <input type="radio" class="form-check-input {{$errors->has('veiculo') ? 'is-invalid' : ''}}" {{ $caminhaos->veiculo == 'Proprio' ? 'checked' : '' }} name="veiculo" id="veiculoP" value="Proprio">
                       <label for="veiculoP" class="form-check-label">Proprio</label>
                       <div class="invalid-feedback">{{ $errors->first('veiculo') }}</div>
                   </div>
                   <div class="form-check">
                       <input type="radio" class="form-check-input  {{$errors->has('veiculo') ? 'is-invalid' : ''}}" {{ $caminhaos->veiculo == 'Terceiro' ? 'checked' : '' }} name="veiculo" id="veiculoT" value="Terceiro">
                       <label for="veiculoT" class="form-check-label">Terceiro</label>
                       <div class="invalid-feedback">{{ $errors->first('veiculo') }}</div>
                   </div>
               </div>
               <br>
               <div class="form-group">
                   <input type="submit" name="submit" class="btn btn-primary" value="Atualizar">
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
