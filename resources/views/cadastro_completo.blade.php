

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro Completo - Fênix </title>
    
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
        
        
        /* Cor do botão de foto e cadastrar */
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
        
        //Mascara para CEP
        function mascara_cep(src, mask){
            var i = src.value.length;
            var saida = mask.substring(0,1);
            var texto = mask.substring(i)
            if (texto.substring(0,1) != saida){
                src.value += texto.substring(0,1);
            }
        }
    </script>

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

    <br><br><br>
    
    <!-- Formulario de Cadastro Completo -->
    <div class="row">
        <div class="col s8 m8 l4 container z-depth-0 offset-s2 offset-m2 offset-l4">
            <div class="card-panel z-depth-0" style="border-radius: 15px;">
                <h4 class="center ralewayFont"> Cadatro Completo </h4>
                <br>
                <div class="row">
                    <form method="POST" action="{{route('cliente.store')}}" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> adb </i>
                                <input id="nick" name="nick" type="text" class="active validate" maxlength="25" required placeholder="PS4, X-Box, Steam">
                              <label for="nick"> Nick </label>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix">phone</i>
                                <input id="icon_telephone" name="telefone" type="tel" class="active validate" maxlength="15" onKeypress="mascara_cel(this);" required>
                                <label for="icon_telephone"> Telefone Celular </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> filter_hdr </i>
                                <select name="estado">
                                  <option value="" disabled selected> Selecione seu Estado </option>
                                  <option value="Acre">Acre</option> 
                                  <option value="Alagoas">Alagoas</option> 
                                  <option value="Amazonas">Amazonas</option> 
                                  <option value="Amapá">Amapá</option> 
                                  <option value="Bahia">Bahia</option> 
                                  <option value="Ceará">Ceará</option> 
                                  <option value="Destrito Federal">Distrito Federal</option> 
                                  <option value="Espírito Santo">Espírito Santo</option> 
                                  <option value="Goiás">Goiás</option> 
                                  <option value="Maranhão">Maranhão</option> 
                                  <option value="Mato Grosso">Mato Grosso</option> 
                                  <option value="Mato Grosso do Sul">Mato Grosso do Sul</option> 
                                  <option value="Minas Gerais">Minas Gerais</option> 
                                  <option value="Pará">Pará</option> 
                                  <option value="Paraíba">Paraíba</option> 
                                  <option value="Paraná">Paraná</option> 
                                  <option value="Pernambuco">Pernambuco</option> 
                                  <option value="Piuaí">Piauí</option> 
                                  <option value="Rio de Janeiro">Rio de Janeiro</option> 
                                  <option value="Rio Grande do Norte">Rio Grande do Norte</option> 
                                  <option value="Rondônia">Rondônia</option> 
                                  <option value="Rio Grande do Sul">Rio Grande do Sul</option> 
                                  <option value="Roraima">Roraima</option> 
                                  <option value="Santa Catarina">Santa Catarina</option> 
                                  <option value="Sergipe">Sergipe</option> 
                                  <option value="São Paulo">São Paulo</option> 
                                  <option value="Tocantins">Tocantins</option> 
                                </select>
                              </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> location_city </i>
                                <input id="cidade" name="cidade" type="text" class="active validate" maxlength="60" required>
                              <label for="cidade"> Cidade </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> nature_people </i>
                                <input id="bairro" name="bairro" type="text" class="active validate" maxlength="60" required>
                              <label for="bairro"> Bairro </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 offset-s1 m6 offset-m1 l6 offset-l1">
                                <i class="material-icons prefix"> directions </i>
                                <input id="rua" name="rua" type="text" class="active validate" maxlength="60" required>
                              <label for="rua"> Rua </label>
                            </div>
                            <div class="input-field col s4 m4 l4">
                                <i class="material-icons prefix"> local_convenience_store </i>
                                <input id="numero" name="numero" type="number" class="active validate" required>
                              <label for="numero"> Número </label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                <i class="material-icons prefix"> edit_location </i>
                                <input id="cep" name="cep" type="text" class="active validate" maxlength="9" onkeypress="mascara_cep(this, '#####-###');" required>
                              <label for="cep"> CEP </label>
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
        <script>
            $(document).ready(function(){
            $('select').not('.disabled').formSelect();
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
