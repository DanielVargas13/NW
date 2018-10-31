<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> New World - Fênix </title>

    <!-- Logo na Aba do Navegador -->
    <link rel="shortcut icon" href="{{ URL::asset('Imagens/LogoPNG2.png')}}" >    
    
    <!-- IMPORT MATERIALIZE -->
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS-->
    <link rel="stylesheet" href="{{ URL::asset('css/materialize.min.css') }}">
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

        /* Cor preta dos botões */
        .corBtn{
            background: #323A45;   
        }
        
        /* MouseOver para alterar cor dos botões */
        .modal-trigger:hover {
            background: #2ecc71;
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
                <ul class="nav-mobile">
                    <li> <img src="{{URL::asset('Imagens/LogoPNG2.png')}}" style="height: 50px; width: 50px; margin-top:9px;"> </li>
                    <li class="ralewayFont"><a href="{{route('index')}}"> New World </a></li>
                    <li class="right"><a class="ralewayFont modal-trigger" href="#Login"> Login </a></li>
                    <li class="right"><a class="ralewayFont modal-trigger" href="#Cadastrar"> Cadastrar </a></li>
                </ul>
            </div>
        </nav>

        <!-- Modal Cadastrar -->
        <div class="modal modal-fixed-footer" id="Cadastrar">
            <div class="modal-content">
                <br>
                <h4 class="center ralewayFont"> Welcome to the New World </h4>
                <br>
                <div class="center">
                    <img src="{{URL::asset('Imagens/LogoFUNDOPNG.png')}}" style="height: 87px; width: 100px; margin-top:10px;">
                </div>
                <br>
                <form name="EnvioEmail" method="post" action="{{route('gamer.store')}}" style="overflow-y: hidden;">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix"> account_box </i>
                            <label for="cNome" class="ralewayFont">Nome: </label><input class="active validate" type="text" name="nome" id="cNome" maxlength="50" placeholder="Seu nome completo" pattern="[A-Za-z\s]+$" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix"> email </i>
                            <label class="ralewayFont"> E-mail: </label><input class="active validate" type="email" name="email" id="cMailC" maxlength="30" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix"> vpn_key </i>
                            <label class="ralewayFont"> Senha: </label><input class="active validate" type="password" name="senha" id="cSenhaC" minlength="8" maxlength="15" placeholder="Mínimo 8 caracteres" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <button class="btn-large modal-trigger waves-effect waves-light corBtn ralewayFont" type="submit">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close btn-flat"> Sair </a>
            </div>
        </div>

        <!-- Modal Login -->
        <div class="modal modal-fixed-footer" id="Login">
            <div class="modal-content">
                <br>
                <h4 class="center ralewayFont"> Login to the New World </h4>
                <br>
                <div class="center">
                    <img src="{{URL::asset('Imagens/LogoFUNDOPNG.png')}}" style="height: 87px; width: 100px; margin-top:10px;">
                </div>
                <br>
                <form name="EnvioEmail" method="post" action="{{route('login')}}" style="overflow-y: hidden;">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="input-field col s12 m2 l12">
                            <i class="material-icons prefix"> email </i>
                            <label class="ralewayFont"> E-mail: </label><input class="active validate" type="email" name="email" maxlength="30" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix"> vpn_key </i>
                            <label class="ralewayFont"> Senha: </label><input class="active validate" type="password" name="senha"  minlength="8"  placeholder="Senha" maxlength="15" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                             <button class="btn-large modal-trigger waves-effect waves-light corBtn ralewayFont" type="submit">
                                Logar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close btn-flat"> Sair </a>
            </div>
        </div>
    </div>
    
    @if (session('message'))
    <div id="jaCadastrado" class="modal">
        <div class="modal-content">
            <br>
            <h2 class="ralewayFont center">{{ session('message') }}</h2>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
        </div>
    </div>
    @endif
    
    <!-- Se remover isso vai parar de funcionar -->
    <div id='app-js' hashkey='A75312THG10$I21389#'>
       <!-- <p>Made with love by Brian and Daniel</p> -->
    </div>
    
    <!-- JQUERY MATERIALZE-->
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!--Materialize JS-->
    <script src="{{ URL::asset('js/materialize.min.js') }}"></script>
    <!--<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>

    <!-- Modals -->
    <script>
        $(document).ready(function() {
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('.modal-trigger').leanModal();
        });
    </script>
    
    <!-- Modals -->
    <script>
        $(document).ready(function() {
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('#jaCadastrado').modal();
            $('#jaCadastrado').modal('open');
        });
    </script>
    
    
</body>

</html>
