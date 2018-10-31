

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produto - Fênix </title>
    
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
        
        .titulo{
            font-family: 'Raleway' !important;
            font-size: 40px !important;
        }
        .subtitulo{
            font-family: 'Raleway' !important;
            font-size: 22px !important;            
        }
        
        .ofertas{
            font-family: 'Raleway' !important;
            font-size: 40px;
        }
        
        /* Cor preta dos botões */
        .corBtn{
            background: #323A45;   
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
	
     <br><br><br>
	<!--Conteudo do corpo da pÃ¡gina-->
        
	<!--Imagens a esquerda-->
        <div class="container">
            <div class="row">
                <!-- LADO ESQUERDO -->
                <div class="col s6 m6 l6">
                    <div class="col s12 m12 l12">
                        <img id="imagem-perfil1" class="materialboxed" src="{{ URL::asset('Imagens/'.$produto->foto)}}" style="width: 620px; height: 450px;">
                        <br>
                        <div class="row">
                            <div class="col s4 m4 l4">
                                <img id="imagem-perfil2" class="materialboxed" width="150" src="{{ URL::asset('Imagens/'.$produto->foto)}}" style="width: 260px; height: 170px;">
                            </div>
                            <div class="col s4 m4 l4">
                                <img id="imagem-perfil2" class="materialboxed" width="150" src="{{ URL::asset('Imagens/'.$produto->foto)}}" style="width: 260px; height: 170px;">
                            </div>
                            <div class="col s4 m4 l4">
                                <img id="imagem-perfil2" class="materialboxed" width="150" src="{{ URL::asset('Imagens/'.$produto->foto)}}" style="width: 260px; height: 170px;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LADO DIREITO -->
                <div class="col s5 m5 l5 offset-s1 offset-m1 offset-l1">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="card white z-depth-2">
                                <div class="card-content black-text">
                                    <span class="card-title titulo center"> <b>{{$produto->nome}} - {{$produto->tipo->nome}} </b></span><br>
                                    <p class="subtitulo"><b>Status do Produto:</b> {{$produto->status}}</p>
                                    @foreach($produto->cliente as $vendedor)
                                    <p class="subtitulo"><b>Vendido por:</b> {{$vendedor->gamer->nome}}</p>
                                    @endforeach
                                    <p></p>
                                    <p class="subtitulo"><b>Descrição: </b>{{$produto->descricao}}</p>
                                    @if ($produto->tiponegocio == "Venda")
                                    <p class="subtitulo"><b>Preço:</b> R$ {{$produto->preco}}</p>
                                    @endif
                                    <br>
                                    <div class="divider"></div>
                                    <br>
                                    <span class="card-title activator center">
                                        <a href="{{route('adicionarCar',$produto->idProduto)}}"><button class="btn blue waves-effect waves-blue darken-3 center" type="button" onclick=""> Comprar <i class="material-icons right"> add_shopping_cart </i></button></a>
                                         <a href="{{route('adicionar',$produto->idProduto)}}"><button class="btn blue waves-effect waves-blue darken-3 center" type="button" onclick=""> Adicionar ao Carrinho <i class="material-icons right"> add_shopping_cart </i></button></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>

        <br><br>
        
	<!--Outras Ofertas a baixo-->	
	<div class="divider"> </div>
        
        <br><br>
        
	<div class="row">
            <div class="col s12 m12 l12 center ofertas">
		Essas ofertas podem te interessar!
            </div>
	</div>
        
        <br>
        
	<div class="row">
            <div class="col s8 m8 l8 offset-s2 offset-m2 offset-l2">
                <!-- Exibe produtos do E-Commerce -->
                @foreach($anuncios as $prod)
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
                        <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$cliente->gamer->nome}}</span>
                        @endforeach
                         <span class="card-title activator center">
                        <a href="{{route('produto.show',$prod->idProduto)}}"><button class="btn waves-effect waves-blue corBtn modal-trigger center" type="button" onclick=""> Comprar <i class="material-icons right"> add_shopping_cart </i></button></a>
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

    <!-- JQUERY MATERIALBOXED -->
    <script>
        $(document).ready(function(){
          $('.materialboxed').materialbox();
        });
    </script>
</body>

</html>