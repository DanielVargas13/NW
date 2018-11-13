
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Atualizar Cadastro - Fênix </title>
    
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
            height: 100;
            background-size: 100%;
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
    
    <!-- Informações e Alteração -->
    <div class="container white">
        <div class="row">
            <!-- Lado Esquerdo -->
            <div id="bkg" class="col s6 m6 l6">
                <br><br><br>
                <div class="col s8 offset-s2 m8 offset-m2 l8 offset-l2">
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> account_box </i>  Nome </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->gamer->nome}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> email </i> E-mail </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->gamer->email}} </p>                    
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> vpn_key </i> Senha </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->gamer->senha}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> adb </i> Nick </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->nick}} </p>                    
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix">phone</i> Telefone Celular </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->telefone}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> filter_hdr </i> Estado </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->estado}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> location_city </i> Cidade </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->cidade}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> nature_people </i> Bairro </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->bairro}} </p>
                    <br><br>                    
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> directions </i> Rua </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->rua}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> local_convenience_store </i> Número </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->numero}} </p>
                    <br><br>
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> edit_location </i> CEP </p><br>
                    <p class="texto texto-usuario-resposta ralewayFont"> {{$cliente->cep}} </p>
                    <br><br><br>
                </div>
                <div class="col s8 offset-s2 m8 offset-m2 l8 offset-l2">
                    <p class="texto texto-usuario-titulo ralewayFont"><i class="material-icons prefix"> assignment_ind </i> Foto </p><br><br><br>
                    <img id="imagem-perfil" class="materialboxed" width="120" src="{{ URL::asset('Imagens/'.$cliente->foto)}}">
                </div>
            </div>
            
            <!-- Lado Direito -->
            <div class="col s6 m6 l6">
                <h4 class="ralewayFont center"> Alterar Informações </h4>
                <br>
                <div class="col s12 m12 l12">
                    <form method="POST" action="{{route('cliente.update',$cliente->idCliente)}}" enctype='multipart/form-data'>
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> account_box </i>
                            <label for="cNome" class="ralewayFont">Nome: </label><input class="active validate" type="text" value="{{$cliente->gamer->nome}}" name="nome" id="cNome" maxlength="60" placeholder="Seu nome completo" pattern="[A-Za-z\s]+$" required>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> email </i>
                            <label class="ralewayFont"> E-mail: </label><input class="active validate" type="email" value="{{$cliente->gamer->email}}" name="email" id="cMail" maxlength="80" placeholder="E-mail" required>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> vpn_key </i>
                            <label class="ralewayFont"> Senha: </label><input class="active validate" type="password" value="{{$cliente->gamer->senha}}" name="senha" id="cSenha" minlength="8"  maxlength="15" required>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> adb </i>
                            <input id="nick" name="nick" type="text" value="{{$cliente->nick}}" class="active validate" required maxlength="25" placeholder="PS4, X-Box, Steam">
                          <label for="nick"> Nick </label>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix">phone</i>
                            <input id="icon_telephone" name="telefone" type="tel" value="{{$cliente->telefone}}" class="active validate" maxlength="15" onKeypress="mascara_cel(this);" required>
                            <label for="icon_telephone"> Telefone Celular </label>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> filter_hdr </i>
                            <select name="estado">
                              <option value="{{$cliente->estado}}" selected> {{$cliente->estado}} </option>
                              <option value="ac">Acre</option> 
                              <option value="al">Alagoas</option> 
                              <option value="am">Amazonas</option> 
                              <option value="ap">Amapá</option> 
                              <option value="ba">Bahia</option> 
                              <option value="ce">Ceará</option> 
                              <option value="df">Distrito Federal</option> 
                              <option value="es">Espírito Santo</option> 
                              <option value="go">Goiás</option> 
                              <option value="ma">Maranhão</option> 
                              <option value="mt">Mato Grosso</option> 
                              <option value="ms">Mato Grosso do Sul</option> 
                              <option value="mg">Minas Gerais</option> 
                              <option value="pa">Pará</option> 
                              <option value="pb">Paraíba</option> 
                              <option value="pr">Paraná</option> 
                              <option value="pe">Pernambuco</option> 
                              <option value="pi">Piauí</option> 
                              <option value="rj">Rio de Janeiro</option> 
                              <option value="rn">Rio Grande do Norte</option> 
                              <option value="ro">Rondônia</option> 
                              <option value="rs">Rio Grande do Sul</option> 
                              <option value="rr">Roraima</option> 
                              <option value="sc">Santa Catarina</option> 
                              <option value="se">Sergipe</option> 
                              <option value="sp">São Paulo</option> 
                              <option value="to">Tocantins</option> 
                            </select>
                          </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> location_city </i>
                            <input id="cidade" name="cidade" type="text" value="{{$cliente->cidade}}" maxlength="60" class="active validate" required>
                          <label for="cidade"> Cidade </label>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> nature_people </i>
                            <input id="bairro" value="{{$cliente->bairro}}" name="bairro" type="text" maxlength="60" class="active validate" required>
                          <label for="bairro"> Bairro </label>
                        </div>
                        <div class="input-field col s6 offset-s1 m6 offset-m1 l6 offset-l1">
                            <i class="material-icons prefix"> directions </i>
                            <input id="rua" name="rua" type="text" value="{{$cliente->rua}}" maxlength="60" class="active validate" required>
                          <label for="rua"> Rua </label>
                        </div>
                        <div class="input-field col s4 m4 l4">
                            <i class="material-icons prefix"> local_convenience_store </i>
                          <input id="numero" name="numero" type="number" value="{{$cliente->numero}}" class="active validate" required>
                          <label for="numero"> Número </label>
                        </div>
                        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <i class="material-icons prefix"> edit_location </i>
                          <input id="cep" name='cep' type="text" value="{{$cliente->cep}}" class="active validate" maxlength="9" onkeypress="mascara_cep(this, '#####-###');" required>
                          <label for="cep"> CEP </label>
                        </div>
                        <div class="file-field input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                            <div class="btn waves-effect waves-light ralewayFont modal-trigger corbtn">
                              <span> Foto </span>
                              <input type="file" name="foto">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" value="{{$cliente->foto}}" type="text">
                            </div>
                        </div>
                        <div class="center">
                            <button class="btn waves-effect waves-light ralewayFont modal-trigger corbtn" type="submit"> Alterar
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
