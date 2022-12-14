<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $tittle }}</title>
    <link rel="stylesheet" href="{{asset('/resources/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    @vite(['resources/js/app.js'])
</head>
<body>
<h1 class="text-bg-primary text-center">{{$tittle}}</h1>
{{ $slot }}


<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
    $(document).ready( function () {
        $('.datatables').DataTable({
            "info": false,
            language: {
            'search': 'Pesquisar',
                "lengthMenu": "Exibir _MENU_ resultados por página",
            "paginate": {
            "next": "Próximo",
                "previous": "Anterior",
                "first": "Primeiro",
                "last": "Último"
        },
        }
        });

    } );
</script>
<br>


</body>
</html>
