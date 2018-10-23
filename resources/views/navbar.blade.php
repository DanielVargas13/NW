<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
<!--Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Kalam|Nunito|Patrick+Hand|Roboto+Mono|Raleway" rel="stylesheet">
        
<!-- Jquery-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>    <!-- Compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Google Plus Button-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

                <!----------------
                    REMOVER
                    IMPORT
                    DE
                    SCRIPT
                    E
                    CSS
                    DEPOIS
                ----------------->

<nav class="navbar-fixed" style="background: #323A45;">
    <div class="container">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="hide-on-med-and-down">
                <li><a><img src="{{URL::asset('Imagens/LogoPNG2.png')}}" style="height: 50px; width: 50px; margin-top:9px;"></a></li>
                <li class="left"><a class="sidenav-trigger waves-effect waves-light show-on-large modal-trigger" data-target="slide-out"><i class="material-icons">menu</i></a></li>
                <li class="ralewayFont"><a href="{{ route('home') }}">New World</a></li>
                <li class="right ralewayFont"><a href=""><i class="material-icons right">exit_to_app</i>Sair</a></li>
                <li class="right ralewayFont"><a href="" ><i class="material-icons">shopping_cart</i></a></li>

                <li class="right">
                    <form>
                        <div class="input-field" style="background: #383F4A;">
                            <input id="search" type="search" placeholder="Procurar" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </li>

            </ul>
        </div>        
    </div>
</nav>

<nav style="background: #323A45;">
    <div class="container">
        <div class="nav-wrapper">
            <ul class="left hide-on-med-and-down">
                <li><a href="">Home</a></li>
                <li>
                <a class="dropdown-trigger"  data-target="drop-especialidade">Categorias<i class="material-icons right">arrow_drop_down</i></a>        
                </li>
                <li><a href="">Catálogo de Jogos</a></li>
                <li><a href="">Eventos</a></li>
                <li><a href="">Notícias</a></li>
                <li><a href="">Ranking de Jogos</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- DROPDOWN STRUCTURE -->
<ul id="drop-especialidade" class="dropdown-content" style="background: #383F4A;">
    <li><a href="" class="white-text">Categ1</a></li>
    <li><a href="" class="white-text">Categ2</a></li>
    <li><a href="" class="white-text">Categ3</a></li>
</ul>
  
<!-- NAVBAR SCRIPT -->
<script>
    $(document).ready(()=>{
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown();
        $('.collapsible').collapsible();
        // MOBILE ARROW     
        $('#mob-especialidades').click(()=>{
            let val = ($('.chevron').html() == 'chevron_right') ? 'keyboard_arrow_down' : 'chevron_right';
            $('.chevron').html(val)
        })
    })
</script>