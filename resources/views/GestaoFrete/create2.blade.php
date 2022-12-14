<x-layout tittle="Controle de Clientes">

   <div class="container mt-5">

       <h1>Adicione um novo Cliente</h1>
       <hr>
       <form action="{{ route('cliente-store') }}" method="POST">
           @csrf
           <div class="form-group">
               <div class="d-flex">
               <div class="form-group" style="margin-inline: 10px">
                   <label for="nome">Nome: </label>
                   <input type="text" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" name="nome" placeholder="Digite um nome..." value="{{old('nome')}}">
                   <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="CNPJ">CPF/CNPJ: </label>
                   <input type="text" class="form-control cnpj {{$errors->has('CNPJ') ? 'is-invalid' : ''}}" name="CNPJ" placeholder="Digite um CPF/CNPJ..." value="{{old('CNPJ')}}">
                   <div class="invalid-feedback">{{ $errors->first('CNPJ') }}</div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="CEP">CEP: </label>
                   <input type="text" class="form-control cep {{$errors->has('CEP') ? 'is-invalid' : ''}}" name="CEP" id="cep" placeholder="Digite um CEP..." value="{{old('CEP')}}">
                   <div class="invalid-feedback">{{ $errors->first('CEP') }}</div>
               </div>
                   <div class="form-group" style="margin-inline: 10px">
                       <label for="UF">UF: </label>
                       <input type="text" class="form-control {{$errors->has('UF') ? 'is-invalid' : ''}}" name="UF" id="uf" placeholder="UF..." value="{{old('UF')}}">
                       <div class="invalid-feedback">{{ $errors->first('UF') }}</div>
                   </div>
               </div>
               <br>
               <div class="d-flex">
               <div class="form-group" style="margin-inline: 10px">
                   <label for="Cidade">Cidade: </label>
                   <input type="text" class="form-control {{$errors->has('Cidade') ? 'is-invalid' : ''}}" name="Cidade" id="city" placeholder="Cidade..." value="{{old('Cidade')}}">
                   <div class="invalid-feedback">{{ $errors->first('Cidade') }}</div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="Logradouro">Logradouro: </label>
                   <input type="text" class="form-control {{$errors->has('Logradouro') ? 'is-invalid' : ''}}" name="Logradouro" id="street" placeholder="logradouro..." value="{{old('Logradouro')}}">
                   <div class="invalid-feedback">{{ $errors->first('Logradouro') }}</div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="Numero">Número: </label>
                   <input type="text" class="form-control {{$errors->has('Numero') ? 'is-invalid' : ''}}" name="Numero" placeholder="Numero..." value="{{old('Numero')}}">
                   <div class="invalid-feedback">{{ $errors->first('Numero') }}</div>
               </div>
               </div>
               <br>
               <div class="d-flex">
               <div class="form-group" style="margin-inline: 10px">
                   <label for="Bairro">Bairro: </label>
                   <input type="text" class="form-control {{$errors->has('Bairro') ? 'is-invalid' : ''}}" name="Bairro" id="district" placeholder="Bairro..." value="{{old('Bairro')}}">
                   <div class="invalid-feedback">{{ $errors->first('Bairro') }}</div>
               </div>
               <br>
               <div class="form-group" style="margin-inline: 10px">
                   <label for="Fone">Telefone: </label>
                   <input type="text" class="form-control fone {{$errors->has('Fone') ? 'is-invalid' : ''}}" name="Fone" placeholder="Digite o Telefone..." value="{{old('Fone')}}">
                   <div class="invalid-feedback">{{ $errors->first('Fone') }}</div>
               </div>
               </div>
               <br>
               <div class="form-group">
                   <input type="submit" name="submit" class="btn btn-primary" value="Salvar" style="margin-inline: 10px">
                   <a href="{{ route('cliente-index')}}" class="btn btn-danger">Voltar</a>
               </div>
           </div>
       </form>
   </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script>
        var options = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                $('.cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
            }
        }

        $('.cnpj').length > 11 ? $('.cnpj').mask('00.000.000/0000-00', options) : $('.cnpj').mask('000.000.000-00#', options);
        $('.fone').mask('(00)0000-0000');
        $('.cep').mask('00000-000');

        $(document).on('blur', '#cep', function() {
            const cep = $(this).val();

            $.ajax({
                url: 'https://viacep.com.br/ws/'+cep+'/json/',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#uf').val(data.uf);
                    $('#city').val(data.localidade);
                    $('#street').val(data.logradouro);
                    $('#district').val(data.bairro);
                }
            });
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
