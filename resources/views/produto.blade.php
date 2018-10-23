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

    </style>

</head>

<body>

    <!-- Nav-Bar -->
    <div class="navbar-fixed">
        <nav class="z-depth-0" style="background: #323A45;">
            <div class="nav-wrapper">
                <ul id="nav-mobile">
                    <li> <img src="{{URL::asset('Imagens/LogoPNG2.png')}}" style="height: 50px; width: 50px; margin-top:9px;"> </li>
                    <li class="left"><a class="sidenav-trigger waves-effect waves-light show-on-large modal-trigger" data-target="slide-out"> <i class="material-icons">menu</i> </a></li>
                    <li class="ralewayFont"><a href="{{ route('home') }}"> New World </a></li>
                    <li class="right"><a class="ralewayFont altera-cor" href="{{route('logout')}}"> Sair </a></li>
                    <li class="right"><a class="ralewayFont modal-trigger" href="#"> E-Commerce </a></li>
                </ul>
            </div>
        </nav>
    </div>

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
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="{{ URL::asset('Imagens/brackground2.jpg')}}">
                </div>
                @if (Auth::user()->cliente)
                <a href="#user"><img class="circle" src="{{ URL::asset('Imagens/'.Auth::user()->cliente->foto)}}"></a>
                @else
                <a href="#user"><img class="circle" src="{{ URL::asset('Imagens/homem_perfil.jpg')}}"></a>
                @endif
                <a href="#name"><span class="white-text name"> {{ Auth::user()->nome }} </span></a>
            </div>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li><a class="waves-effect collapsible-header" href="#"> Gerênciar Perfil <i class="material-icons"> arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect" href="cadastroCompleto/{{ Auth::user()->idGamer }}"> Cadastro Completo </a></li>
                            <li><a class="waves-effect" href="atualizarCadastro/{{ Auth::user()->idGamer }}"> Atualizar Cadastro </a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li>
            <div class="divider"></div>
        </li>

        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li><a class="waves-effect collapsible-header" href="#"> Gerênciar Produtos <i class="material-icons"> arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect" href="cadastroProduto/{{ Auth::user()->idGamer }}"> Cadastrar Produto </a></li>
                            <li><a class="waves-effect" href="meusProdutos/{{ Auth::user()->idGamer }}"> Meus Produtos </a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li>
            <div class="divider"></div>
        </li>

    </ul>
	
	<!--Conteudo do corpo da pÃ¡gina-->
	<!--Imagens a esquerda-->	
	<div class="col s6 m6 l4 container">
		<div class="row">
			<div class="col s12 m12 l6 container z-depth-0 offset-s2 offset-m2 offset-l4">
				<img id="imagem-perfil1" class="materialboxed" width="300" src="{{ URL::asset('Imagens/'.$produto->foto)}}">
			</div>
		</div>
		<div class="row">
			<div class="col s12 m12 l6 container z-depth-0 offset-s2 offset-m2 offset-l4">
				<img id="imagem-perfil2" class="materialboxed" width="150" src="{{ URL::asset('Imagens/'.$produto->foto)}}">				
                <img id="imagem-perfil3" class="materialboxed" width="150" src="{{ URL::asset('Imagens/'.$produto->foto)}}">				
                <img id="imagem-perfil4" class="materialboxed" width="150" src="{{ URL::asset('Imagens/'.$produto->foto)}}">
			</div>
		</div>
	</div>
	<!--DescriÃ§Ã£o a direita-->	
	<div class="col s6 m6 l4 container">
		<div class="row">
			<div class="col s12 m6">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title">{{$produto->nome}} - {{$produto->tipo->nome}}</span>
                        <p>Status do Produto: {{$produto->status}}</p>
                        @foreach($produto->cliente as $vendedor)
                        <p>Vendido por: {{$vendedor->gamer->nome}}</p>
                        @endforeach
                        <p></p>
						<p>Descrição: {{$produto->descricao}}</p>
                        @if ($produto->tiponegocio == "Venda")
                            <p>Preço: R$ {{$produto->preco}}</p>
                        @endif
                        <span class="card-title activator center">
                        <a href="#"><button class="btn blue waves-effect waves-blue darken-3 center" type="button" onclick=""> Comprar <i class="material-icons right"> add_shopping_cart </i></button></a>
                        </span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Outras Ofertas a baixo-->	
	<div class="divider">
	</div>
	<div class="row">
		<div class="col s12 m12 l6 container z-depth-0 offset-s2 offset-m2 offset-l4">
		Veja também essas outras ofertas do nosso site!
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l6 container z-depth-0 offset-s2 offset-m2 offset-l4">
			<!-- Exibe produtos do E-Commerce -->
            @foreach($anuncios as $prod)
            <div class="col s4 m4 l4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('Imagens/'.$prod->foto)}}">
                    </div>
                    <div class="card-content">
                         @if ($prod->tiponegocio == "Venda")
                            <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$prod->tipo->nome}} - {{$prod->nome}} - {{$prod->tiponegocio}} - R$ {{$prod->preco}} </span>
                        @else
                            <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$prod->tipo->nome}} - {{$prod->nome}} - {{$prod->tiponegocio}} </span>
                        @endif
                        @foreach($prod->cliente as $cliente)
                        <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$cliente->gamer->nome}}</span>
                        @endforeach
                         <span class="card-title activator center">
                        <a href="{{route('produto.show',$prod->idProduto)}}"><button class="btn blue waves-effect waves-blue darken-3 center" type="button" onclick=""> Comprar <i class="material-icons right"> add_shopping_cart </i></button></a>
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

</body>

</html>