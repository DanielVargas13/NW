

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
        
        /*  BADGE DO CARRINHO*/
        .notification-badge {
            position: relative;
            right: 5px;
            top: -20px;
            color: #941e1e;
            background-color: #f5f1f2;
            margin: 0 -.8em;
            border-radius: 50%;
            padding: 5px 10px;
        }
        .notif{
            position: absolute;
            left: 0px;
        }
        .notification-badge {
            position:relative;
            padding:5px 9px;
            background-color: #2ecc71;
            color: white;
            bottom: 15px;
            left: 5px;
            border-radius: 50%;
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
                        <br>
                        <img src="{{ URL::asset('Imagens/'.$prod->foto)}}" style="height: 300px;">                        
                    </div>
                    <br>
                    <div class="divider"></div>

                    <div class="card-content">
                        @if ($prod->tiponegocio == "Venda")
                            <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$prod->nome}} - {{$prod->tiponegocio}} - R$ {{$prod->preco}} </span>
                        @else
                            <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$prod->nome}} - {{$prod->tiponegocio}} </span>
                        @endif
                        @foreach($prod->cliente as $cliente)
                        <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> <b>{{$cliente->pivot->situacao}}</b> </span>
                        @endforeach
                        <span class="card-title activator center">
                            <a href="{{route('suspender', $prod->idProduto)}}"><button class="btn red waves-effect waves-red darken-3 center" type="button" onclick=""> Suspender <i class="material-icons right"> close </i></button></a>
                            <a href="{{route('anunciar', $prod->idProduto)}}"><button class="btn green waves-effect waves-green darken-3 center" type="button" onclick=""> Anunciar <i class="material-icons right"> check </i></button></a><br><br>
                            <a href="{{route('deletar', $prod->idProduto)}}"><button class="btn red waves-effect waves-red darken-3 center" type="button" onclick="return confirm('Confirma exclusão?')" style="background-color: #fff"> Excluir <i class="material-icons"> close </i></button></a>
                            <a href="{{route('produto.edit', $prod->idProduto)}}"><button class="btn green waves-effect waves-green darken-3 center" type="button" onclick=""> Alterar <i class="material-icons"> edit </i></button></a>   
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
        });

    </script>
    <script>
        $(document).ready(function() {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('#modal1').modal('open');
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

   @include('nav.footer')
</body>

</html>
