<?php 

    require app_path() . '\..\resources\views\navbar.blade.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Atualizar Produto - Fênix </title>
    
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
        
        /*Escurece a imagem
        #bkg { 
 
            height: 1017px;
            width: 500px;
        }
      */
        /*Posição da imagem com o texto*/
        #image {
            position: absolute; 
        }
        #imagem-perfil, .texto {
            position: absolute;
            font-size: 32px;
        }
        
        /* Configuração do Texto com os dados do usuário */
        .texto-usuario-titulo{
            font-size: 15px;
            line-height: 1.2;
            color: #fff;
        }
        .texto-usuario-resposta{
            color: #00ad5f;
            font-size: 18px;
        }
        
        /* Bordas na Imagem do Perfil */
        #imagem-perfil {
            border-style: outset;
            border-bottom-width: 10px;
            border-top-width: 10px;;
            border-right-width: 10px;
            border-left-width: 10px;
            border-color: #2ecc71;
        }
        
        body{
            background-color: #f2f2f2;
        }
        
        /* Cor do botão de foto e cadastrar */
        .corbtn{
            background: #323A45;
        }
        
        #bkg{
            background-image: url("{{ URL::asset('Imagens/esquerdo.jpg')}}");       
            background-repeat: no-repeat;
            height: 100%;
            background-size: 100%;
        }
        
        
    </style>

</head>
<body>

    <!-- Nav-Bar -->
    <?php 
        require app_path() . '\..\resources\views\navbar.blade.php';
    ?>

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

    <br><br><br>
    
    <!-- Informações e Alteração -->
    <div class="container white">
        <div class="row">
            <!-- Lado Esquerdo -->
            <div id="bkg" class="col s6 m6 l6">
                <br><br><br>
                <div class="col s8 offset-s2 m8 offset-m2 l8 offset-l2">
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> devices_other </i>  Nome do Produto </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$produto->nome}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> storage </i> Categoria </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$produto->tipo->nome}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> shop </i> Método de Negócio </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$produto->tiponegocio}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> attach_money </i> Preço </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$produto->preco}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> beenhere </i> Status do Produto </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$produto->status}} </p>
                    <br><br><br>
                </div>
                <div class="col s8 offset-s2 m8 offset-m2 l8 offset-l2">
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> assignment_ind </i> Foto </p><br><br><br>
                    <img id="imagem-perfil" class="materialboxed" width="120" src="{{ URL::asset('Imagens/'.$produto->foto)}}">
                </div>
            </div>
            
            <!-- Lado Direito -->
            <div class="col s6 m6 l6">
                <h4 class="ralewayFont center"> Alterar Informações </h4>
                <br>
                <div class="col s12 m12 l12">
                    <form method="POST" action="{{route('produto.update',$produto->idProduto)}}" enctype='multipart/form-data'>
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> devices_other </i>
                            <input id="nome" name="nome" type="text" value="{{$produto->nome}}" class="active validate" required>
                            <label for="nome"> Nome do Produto </label>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> message </i>
                            <textarea id="descricao" name="descricao" class="materialize-textarea active validate" required>{{$produto->descricao}}</textarea>
                            <label for="descricao"> Descrição </label>
                            </div>                      
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> storage </i>
                            <select name="idTipoProduto">
                                  <option value="{{$produto->tipo->idTipo}}" selected> {{$produto->tipo->nome}} </option>
                                    @foreach($tipoproduto as $tipo)
                                  <option value="{{$tipo->idTipo}}">{{$tipo->nome}}</option> 
                                     @endforeach
                                </select>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> shop </i>
                            <select name="tiponegocio">
                              <option value="{{$produto->tiponegocio}}" selected> {{$produto->tiponegocio}} </option>
                              <option value="Troca"> Troca </option> 
                              <option value="Venda"> Venda </option> 
                            </select>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> attach_money </i>
                            <input id="preco" name="preco" type="text" value="{{$produto->preco}}" class="active validate" required placeholder="R$ XXX,YY">
                            <label for="preco"> Preço </label>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> beenhere </i>
                            <select name="status">
                              <option value="{{$produto->status}}" selected> {{$produto->status}} </option>
                              <option value="Novo"> Novo </option> 
                              <option value="Seminovo"> Seminovo </option> 
                              <option value="Usado"> Usado </option> 
                            </select>
                        </div>
                        <div class="file-field input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <div class="btn waves-effect waves-light ralewayFont modal-trigger corbtn">
                              <span> Foto </span>
                              <input type="file" name="foto">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" value="{{$produto->foto}}">
                            </div>
                        </div>
                        <div class="center">
                            <button class="btn waves-effect waves-light ralewayFont modal-trigger corbtn" type="submit"> Cadastrar
                                <i class="material-icons right"> edit </i>    
                            </button>                                
                        </div>
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </div>

    
    <br><br><br><br><br><br><br><br>
           
    <div class="row">
        kdjaklsjdlkasjd
    </div>

        <!-- JQUERY MATERIALZE-->
        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--Materialize JS-->
        <script src="{{ URL::asset('js/materialize.min.js')}}"></script>

        <!-- Script SideNav -->
        <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.collapsible').collapsible();
        });
      </script>
      
      <!-- Ampliar Imagem Perfil -->
      <script>
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
      </script>
      
        <!-- Script Select Estados -->
        <script>
            $(document).ready(function(){
            $('select').not('.disabled').formSelect();
            });
        </script>
</body>
</html>
