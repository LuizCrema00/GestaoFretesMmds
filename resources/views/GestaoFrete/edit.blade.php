<x-layout tittle="Controle Motoristas">

   <div class="container mt-5">
       <h1>Alterar Motorista</h1>
       <hr>
       <form action="{{ route('motorista-update', ['id'=>$motoristas->id]) }}" method="POST">
           @csrf
           @method('PUT')
           <div class="form-group">
               <div class="d-flex">
               <div class="form-group" style="margin-inline: 10px">
                   <label for="nome">Nome: </label>
                   <input type="text" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" name="nome" value="{{$motoristas->nome}}" placeholder="Digite um nome...">
                   <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="Fone">Telefone: </label>
                   <input type="text" class="form-control fone {{$errors->has('Fone') ? 'is-invalid' : ''}}" name="Fone" value="{{$motoristas->Fone}}" placeholder="Digite um Telefone...">
                   <div class="invalid-feedback">{{ $errors->first('Fone') }}</div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="CPF_CNPJ">CPF: </label>
                   <input type="text" class="form-control cpf_cnpj {{$errors->has('CPF_CNPJ') ? 'is-invalid' : ''}}" name="CPF_CNPJ" value="{{$motoristas->CPF_CNPJ}}" placeholder="Digite um CPF/CNPJ...">
                   <div class="invalid-feedback">{{ $errors->first('CPF_CNPJ') }}</div>
               </div>
               </div>
               <br>
               <div class="d-flex">
               <div class="form-group" style="margin-inline: 10px">
                   <label for="CNH">CNH: </label>
                   <input type="text" class="form-control cnh {{$errors->has('CNH') ? 'is-invalid' : ''}}" name="CNH" value="{{$motoristas->CNH}}" placeholder="Digite uma CNH...">
                   <div class="invalid-feedback">{{ $errors->first('CNH') }}</div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="Validade_CNH">Validade da CNH: </label>
                   <input type="date" class="form-control {{$errors->has('Validade_CNH') ? 'is-invalid' : ''}}" id="date" name="Validade_CNH" value="{{$motoristas->Validade_CNH}}">
                   <div class="invalid-feedback">{{ $errors->first('Validade_CNH') }}</div>
               </div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="Tipo_Contrato">Tipo Contratado</label>
                   <div class="form-check">
                       <input type="radio" class="form-check-input {{$errors->has('Tipo_Contrato') ? 'is-invalid' : ''}}" {{ $motoristas->Tipo_Contrato == 'Proprio' ? 'checked' : '' }} name="Tipo_Contrato"  id="Tipo_ContratoP" value="Proprio">
                       <label for="Tipo_ContratoP" class="form-check-label">Proprio</label>
                       <div class="invalid-feedback">{{ $errors->first('Tipo_Contrato') }}</div>
                   </div>
                   <div class="form-check">
                       <input type="radio" class="form-check-input {{$errors->has('Tipo_Contrato') ? 'is-invalid' : ''}}" {{ $motoristas->Tipo_Contrato == 'Terceiro' ? 'checked' : '' }} name="Tipo_Contrato" id="Tipo_ContratoT" value="Terceiro">
                       <label for="Tipo_ContratoT" class="form-check-label">Terceiro</label>
                       <div class="invalid-feedback">{{ $errors->first('Tipo_Contrato') }}</div>
                   </div>
               </div>
               <br>
               <div class="form-group">
                   <input type="submit" name="submit" class="btn btn-primary" value="Atualizar">
                   <a href="{{ route('motorista-index')}}" style="margin-inline: 10px" class="btn btn-danger">Voltar</a>
               </div>
           </div>
       </form>
   </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
    <script>
        var options = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                $('.cpf_cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
            }
        }

        $('.cpf_cnpj').length > 11 ? $('.cpf_cnpj').mask('00.000.000/0000-00', options) : $('.cpf_cnpj').mask('000.000.000-00#', options);
        $('.fone').mask('(00)0000-0000');
        $('.cnh').mask('000000000000');
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
