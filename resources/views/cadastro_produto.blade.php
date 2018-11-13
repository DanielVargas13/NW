

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro de Produtos - Fênix </title>
    
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
        /* Cor do botão de foto */
        .corbtn{
            background: #323A45;
        }
        
        
        body{
            background-image: url("{{URL::asset('Imagens/cad.jpg')}}");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
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
    
    <script>
        //MASCARA PARA TELELEFONE CELULAR
        function mascara_cel(telefone){ 
            if(telefone.value.length == 0)
                telefone.value = '(' + telefone.value; 
            if(telefone.value.length == 3)
                telefone.value = telefone.value + ') '; 

            if(telefone.value.length == 10)
                telefone.value = telefone.value + '-'; 
        } 
        function tNegocio(negocio){
            var preco = document.getElementById('preco');
            var div = document.getElementById('divprec');
            if(negocio.value == 'Troca'){
                div.hidden = true;
                preco.value = 0;
            }else{
                div.hidden = false;
            }
        }
    </script>

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
           
    <!-- Formulário de Cadastro de Produto -->
    <div class="row">
        <div class="col s8 m8 l4 container z-depth-0 offset-s2 offset-m2 offset-l4">
            <div class="card-panel z-depth-0" style="border-radius: 15px;">
                <h4 class="center ralewayFont"> Cadatrar Produto </h4>
                <br>
                <div class="row">
                    <form method="POST" action="{{route('produto.store')}}" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> devices_other </i>
                                <input id="nome" name="nome" type="text" class="active validate" required>
                              <label for="nome"> Nome do Produto </label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> message </i>
                            <textarea id="descricao" name="descricao" class="materialize-textarea active validate" required></textarea>
                            <label for="descricao"> Descrição </label>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> storage </i>
                                <select name="idTipoProduto" id="cTipo">
                                  <option value="" disabled selected> Selecione a Categoria do seu Produto </option>
                                    @foreach($tipoproduto as $tipo)
                                  <option value="{{$tipo->idTipo}}">{{$tipo->nome}}</option> 
                                     @endforeach
                                </select>
                              </div>
                        </div>
                        <div id="divcat" class="row"> <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1"> 
                            <i class="material-icons prefix"> shop </i> 
                            <select id="idcategoria" name="categoria">
                                <option value="" disabled selected> Selecione o Tipo do seu Produto </option>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> shop </i>
                                <select onchange="tNegocio(this)" id="idnegocio" name="tiponegocio">
                                  <option value="" disabled selected> Selecione o Método de Negócio </option>
                                  <option value="Troca"> Troca </option> 
                                  <option value="Venda"> Venda </option> 
                                </select>
                              </div>
                        </div>
                        <div id="divprec" class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> attach_money </i>
                                <input id="preco" name="preco" type="text" class="active validate" required placeholder="999,99">
                              <label for="preco"> Preço </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> beenhere </i>
                                <select name="status">
                                  <option value="" disabled selected> Selecione o Status do Produto </option>
                                  <option value="Novo"> Novo </option> 
                                  <option value="Seminovo"> Seminovo </option> 
                                  <option value="Usado"> Usado </option> 
                                </select>
                              </div>
                        </div>
                        
                    <div id=esconde>
                         <!--<div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> attach_money </i>
                                <input id="data_ini" name="dataInicio" type="date" class="active validate" required>
                              <label for="datainicio"> Data de Início </label>
                            </div>
                        </div>   
                         <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> attach_money </i>
                                <input id="data_fim" name="dataFim" type="date" class="active validate" required>
                              <label for="datafim"> Data de Fim </label>
                            </div>
                        </div>-->                          
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> beenhere </i>
                                <select name="situacao">
                                  <option value="Suspenso" selected>Suspenso</option> 
                                  <option value="Ativo" >Ativo</option> 
                                </select>
                              </div>
                        </div>
                        </div>
                        
                        <div class="row">
                            <div class="file-field input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <div class="btn waves-effect waves-light ralewayFont modal-trigger corbtn">
                                  <span> Foto </span>
                                  <input type="file" name="foto">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <input id="idCliente" name="idCliente" value="{{Auth::user()->cliente->idCliente}}" type="text" hidden>
                        <div class="row">
                            <div class="center">
                                <button class="btn waves-effect waves-light ralewayFont modal-trigger corbtn" type="submit"> Cadastrar
                                    <i class="material-icons right"> edit </i>    
                                </button>                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
 
 
        <!-- Script Select Estados -->
    <script> $(document).ready(function() {

  // initialize
  $('select').not('.disabled').formSelect();
  
  $("#cTipo").on('change',function() {
    
    // clear contents
      var $cat = $("#divcat");
    var $selectDropdown = 
      $("#idcategoria")
        .empty()
        .html(' ');

    // add new value
    var idx = $("#cTipo").val();

if(idx == 3){
    $cat.attr("hidden",false);
      $selectDropdown.append('<option value="Acessório">Acessório</option>');
    $selectDropdown.append('<option value="Action Figure">Action Figure</option>');
    $selectDropdown.append('<option value="Caneca">Caneca</option>');
    $selectDropdown.append('<option value="Funko POP">Funko POP</option>');
    $selectDropdown.append('<option value="Livro">Livro</option>');
    $selectDropdown.append('<option value="Miniatura">Miniatura</option>');
    $selectDropdown.append('<option value="Poster">Poster</option>');
    $selectDropdown.append('<option value="Quadro">Quadro</option>');
     $selectDropdown.append('<option value="Roupa">Roupa</option>');
}else if(idx == 5){
    $cat.attr("hidden",false);
    $selectDropdown.append('<option value="Jogo">Jogo</option>');
    $selectDropdown.append('<option value="Acessório">Acessório</option>');
}else if(idx == 8){
    $cat.attr("hidden",true);
      $selectDropdown.append('<option value=""></option>');
}else{
    $cat.attr("hidden",false);
     $selectDropdown.append('<option value="Jogo">Jogo</option>');
    $selectDropdown.append('<option value="Acessório">Acessório</option>');
    $selectDropdown.append('<option value="Console">Console</option>');
}
    

    // trigger event
    $selectDropdown.trigger('contentChanged');
  });
$('#idcategoria').on('contentChanged', function() {
    // re-initialize (update)
    $(this).not('.disabled').formSelect();
  });
  
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
