

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home - Fênix </title>
    
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
        .altera-cor:hover {
            background: red;
        }

        body {
            background-color: #f2f2f2;
        }
        
        .textoSideNav{
            color: black;
            font-family: 'Raleway';
            font-size: 18px !important;
        }
        
        /* Cor preta dos botões */
        .corBtn{
            background: #323A45;   
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
            <h4 class="center ralewayFont">{{ session('message') }}</h4>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
        </div>
    </div>
    @endif

<!-- Side Nav -->
     @include('nav.sidenav')
    
    <ul id="slide-out" class="sidenav sidenav-fixed">
    <div class="container">
        <form method="GET" action="{{route('filtragemPad')}}">
            {{ csrf_field() }}
            <h4 class="ralewayFont"> Tipos </h4>
            <input id="pesquisa" name="pesquisa" value="{{$pesquisa}}" type="text" hidden>
            <label>
                <input name="tipos[]" value="Troca" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Troca </span>
            </label><br>
            <label>
                <input name="tipos[]" value="Venda" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Venda </span>
            </label><br>

            <div class="divider"></div>

            <h4 class="ralewayFont"> Status </h4>

            <label>
                <input name="status[]" value="Novo" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Novo </span>
            </label><br>
            <label>
                <input name="status[]" value="Seminovo" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Seminovo </span>
            </label><br>
            <label>
                <input name="status[]" value="Usado" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Usado </span>
            </label>

            <div class="divider"> </div>

            <h4 class="ralewayFont"> Preço </h4>
            <label>
                <input value="0" class="with-gap" name="preco" type="radio" />
                <span>Menor Preço</span>
            </label><br>
            <label>
                <input value="1" class="with-gap" name="preco" type="radio" />
                <span>Maior Preço</span>
            </label>

            <div class="divider"> </div>

            <br><br>

            <button id="filtrar" class="btn waves-effect waves-light ralewayFont modal-trigger corBtn" type="submit"><i class="material-icons right"> search </i> Fazer Busca </button>

        </form>
    </div>
</ul>
    
    <br><br><br>
<!-- Exibe produtos do E-Commerce -->
    <div class="container">
        <div class="row">
            @foreach($produtos as $prod)
            <div class="col s4 m4 l4">
                <div class="card">
                    <div class="card-image">
                        <br>
                        <img src="{{ URL::asset('Imagens/'.$prod->foto)}}" style="height: 230px;">
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
                         <a href="{{route('paginaV',$cliente->idCliente)}}" class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$cliente->gamer->nome}}</a>
                        @endforeach
                         <span class="card-title activator center">
                        <a href="{{route('produto.show',$prod->idProduto)}}"><button class="btn corBtn waves-effect waves-blue darken-3 center modal-trigger" type="button" onclick=""> Ver Produto <i class="material-icons right"> launch </i></button></a>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div id='app-js' hashkey='A75312THG10$I21389#'>
        <!-- <p>Made with love by Brian and Daniel</p> -->
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
