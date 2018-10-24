

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Remover Produto - Fênix </title>
    
    <!-- Logo na Aba do Navegador -->
    <link rel="shortcut icon" href="{{ URL::asset('Imagens/LogoPNG2.png')}}" >  

    <!-- IMPORT MATERIALIZE -->
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS-->
    <link rel="stylesheet" href="{{ URL::asset('css/materialize.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Playfair+Display" rel="stylesheet">
    <!-- Se remover isso vai parar de funcionar -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        /* Fonte */
        .ralewayFont {
            font-family: 'Raleway';
        }
        
        /* Tamanho do Modal */
        .modal {
            width: 40% !important;
            max-height: 100%;
        }

        /*MouseOver para alterar cor dos botões*/
        .modal-trigger:hover {
            background: #2ecc71;
        }
        .altera-cor:hover{
            background: red;
        }
        
        body{
            background-color: #f2f2f2;
        }
        
    </style>

</head>

<body>

    @include('nav.navbar')

    @if (session('message'))
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h2>{{ session('message') }}</h2>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
        </div>
    </div>
    @endif

<!-- Side Nav -->
     @include('nav.sidenav')

    <!-- Produtos -->
    <h1 class="ralewayFont center"> Meus Produtos </h1>

    <div class="container">
        <div class="row">
            @foreach($produtos as $prod)
            <div class="col s4 m4 l4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('Imagens/'.$prod->foto)}}">
                        <div class="fixed-action-btn click-to-toggle direction-top" style="position: absolute;">
                            <a class="btn-floating btn-flat green">
                                <i class="large material-icons"> autorenew </i>
                            </a>
                            <ul>
                                <form style="display: inline-block;" method="POST" action="{{route('produto.destroy', $prod->idProduto)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                                    {{method_field('DELETE')}}{{ csrf_field() }}
                                    <button id="remover" class="btn-floating red" type="submit" style="background-color: #fff">
                                        <a><i class="material-icons"> close </i></a>
                                    </button></form>
                                <li><a href="{{route('produto.edit', $prod->idProduto)}}" class="btn-floating blue"><i class="material-icons"> edit </i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        @if ($prod->tiponegocio == "Venda")
                            <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$prod->tipo->nome}} - {{$prod->nome}} - {{$prod->tiponegocio}} - R$ {{$prod->preco}} </span>
                        @else
                            <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$prod->tipo->nome}} - {{$prod->nome}} - {{$prod->tiponegocio}} </span>
                        @endif
                        @foreach($prod->cliente as $cliente)
                        <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$cliente->pivot->situacao}}</span>
                        @endforeach
                        <span class="card-title activator center">
                        <a href="{{route('suspender', $prod->idProduto)}}"><button class="btn red waves-effect waves-red darken-3 center" type="button" onclick=""> Suspender <i class="material-icons right"> close </i></button></a>
                         <a href="{{route('anunciar', $prod->idProduto)}}"><button class="btn green waves-effect waves-green darken-3 center" type="button" onclick=""> Anunciar <i class="material-icons right"> check </i></button></a>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



    <!-- JQUERY MATERIALZE-->
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!--Materialize JS-->
    <script src="{{ URL::asset('js/materialize.min.js')}}"></script>

    <!-- Script SideNav -->
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.collapsible').collapsible();
        });

    </script>

    <!-- INICIALIZA BTN-FLOATING-->
    <script>
        var elem = document.querySelector('.fixed-action-btn');
        var instance = M.FloatingActionButton.init(elem, {
            direction: 'left',
            hoverEnabled: false
        });

    </script>
    
    <!-- Script MODAL -->
    <script>
        $(document).ready(function() {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('.modal').modal('open');
        });

    </script>
<script>
    $(document).ready(()=>{
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown();
        $('.collapsible').collapsible();
        // MOBILE ARROW     
        $('#mob-especialidades').click(()=>{
            let val = ($('.chevron').html() == 'chevron_right') ? 'keyboard_arrow_down' : 'chevron_right';
            $('.chevron').html(val)
        });
    });
</script>
</body>

</html>
