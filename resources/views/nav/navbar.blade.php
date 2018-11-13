
<style>

    .stl-cart{
        margin-left: 15px;
    }

    .cinza{
        background: #323A45;
    }

    .cinza-claro{
        background: #3d4654;
    }

    .navbar-fixed{
        position: fixed
    }

    .perfil-btn-mobile {
    position: fixed absolute; /* Sit on top of the page content */

    position: fixed;
    bottom: 8px;
    right: 16px;
    font-size: 18px;
    z-index: 999;
    }

    .categ-body{
        margin-left: 25px;
    }

</style>

<div class="hide-on-small-only">

    <!-- navbar superior -->
    <nav class="navbar-fixed cinza" style="margin-top: -64px;">
        <div class="container">
            <div class="nav-wrapper row">
                <ul class="hide-on-med-and-down">
                    <div class="col m1">
                        <li><a href="{{ route('home') }}"><img src="{{URL::asset('Imagens/LogoPNG2.png')}}" style="height: 50px; width: 50px; margin-top:9px;"></a></li>
                    </div>

                    <div class="col m4">
                        <li class="ralewayFont"><a href="{{ route('home') }}" class="waves-effect waves-light modal-trigger">New World</a></li>
                        <li class="left"><a class="sidenav-trigger waves-effect waves-light show-on-large modal-trigger" data-target="slide-out"><i class="material-icons">menu</i></a></li>
                    </div>
                
                    <div class="col m4">
                        <li class="center" style="height: 64px; width: 100%; margin-left: -2.5em">
                            <form method="GET" action="{{route('search')}}">
                                {{ csrf_field() }}
                                <div class="input-field" style="background: #383F4A;">
                                    <input id="search" name="pesquisa" type="search" placeholder="Procurar" autocomplete="off" required>
                                    <label class="label-icon" for="search"><button type="submit" id="search_button" class="waves-effect waves-teal btn-flat" style="margin-left: -18px; height: 64px; width: 60px;"><i class="material-icons">search</i></button></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </form>
                        </li>
                    </div>

                    <div class="col m3" style="margin-left: -2.5em">
                        <li class="right ralewayFont">
                            <a href="{{route('logout')}}" class="waves-effect waves-light modal-trigger">
                                <i class="material-icons right">exit_to_app</i>Sair
                            </a>
                        </li>

                        <li class="right ralewayFont" style="margin-right: 5px;">
                            <a href="{{route('carrinho')}}" data-activates="notificarion" class="waves-effect waves-light modal-trigger" style="width: 4em;">
                                <span class="stl-cart">
                                    <i class="material-icons left notif stl-cart">shopping_cart</i><small class="notification-badge"> 2 </small>  
                                </span>
                            </a>
                        </li>
                    </div>
                </ul>
            </div>        
        </div>
    </nav>

    <!-- navbar inferior -->
    <nav class="cinza" style="margin-top: 64px; display: block;">
        <div class="container">
            <div class="nav-wrapper">
                <ul class="left hide-on-small-only">
                    <li><a href="{{ route('home') }}" class="waves-effect waves-light modal-trigger">Home</a></li>
                    <li>
                        <a class="dropdown-trigger waves-effect waves-light modal-trigger"  data-target="drop-especialidade">Categorias<i class="material-icons right">arrow_drop_down</i></a>        
                    </li>
                    <li><a class="waves-effect waves-light modal-trigger">Catálogo de Jogos</a></li>
                    <li><a class="waves-effect waves-light modal-trigger">Eventos</a></li>
                    <li><a class="waves-effect waves-light modal-trigger">Notícias</a></li>
                    <li><a class="waves-effect waves-light modal-trigger">Ranking de Jogos</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- MOBILE -->
<div class="hide-on-med-and-up">
    <div class="perfil-btn-mobile">
        <a class="z-depth-3 btn-floating btn-large direction-top waves-effect cinza sidenav-trigger show-on-large modal-trigger" data-target="slide-out"><i class="material-icons">apps</i></a>
    </div>

    <nav class="cinza">
        <div class="container">
            <!-- Dropdown Trigger -->
        <ul class="nav-wrapper row">
            <a class="dropdown-trigger" data-target="mobile-menu"><i class="material-icons">menu</i></a>
        </ul>
            
        </div>

        <ul id="mobile-menu" class="cinza dropdown-content hide-on-med-and-up">
            <li><a href="{{ route('home') }}" class="waves-effect waves-light modal-trigger">Home</a></li>

            <li><a class="white-text waves-effect waves-light modal-trigger">Categorias</a></li>

            <li class="cinza-claro"><a href="{{route('categoria',3)}}" class="white-text waves-effect waves-light modal-trigger"><span class="categ-body">Colecionáveis</a></li>
            <li class="cinza-claro"><a href="{{route('categoria',4)}}" class="white-text waves-effect waves-light modal-trigger"><span class="categ-body"></span>Nintendo</a></li>
            <li class="cinza-claro"><a href="{{route('categoria',5)}}" class="white-text waves-effect waves-light modal-trigger"><span class="categ-body">PC</a></li>
            <li class="cinza-claro"><a href="{{route('categoria',6)}}" class="white-text waves-effect waves-light modal-trigger"><span class="categ-body">PS4</a></li>
            <li class="cinza-claro"><a href="{{route('categoria',7)}}" class="white-text waves-effect waves-light modal-trigger"><span class="categ-body">X-BOX</a></li>
            <li class="cinza-claro"><a href="{{route('categoria',8)}}" class="white-text waves-effect waves-light modal-trigger"><span class="categ-body">Outros</a></li>

            <li><a class="waves-effect waves-light modal-trigger">Catálogo de Jogos</a></li>
            <li><a class="waves-effect waves-light modal-trigger">Eventos</a></li>
            <li><a class="waves-effect waves-light modal-trigger">Notícias</a></li>
            <li><a class="waves-effect waves-light modal-trigger">Ranking de Jogos</a></li>
        </ul>


    </nav>
</div>

<!-- DROPDOWN STRUCTURE -->
<ul id="drop-especialidade" class="dropdown-content" style="background: #383F4A;">
    <li><a href="{{route('categoria',3)}}" class="white-text waves-effect waves-light modal-trigger">Colecionáveis</a></li>
    <li><a href="{{route('categoria',4)}}" class="white-text waves-effect waves-light modal-trigger">Nintendo</a></li>
    <li><a href="{{route('categoria',5)}}" class="white-text waves-effect waves-light modal-trigger">PC</a></li>
    <li><a href="{{route('categoria',6)}}" class="white-text waves-effect waves-light modal-trigger">PS4</a></li>
    <li><a href="{{route('categoria',7)}}" class="white-text waves-effect waves-light modal-trigger">X-BOX</a></li>
    <li><a href="{{route('categoria',8)}}" class="white-text waves-effect waves-light modal-trigger">Outros</a></li>
</ul>

<script>
    $(document).ready(() => {
        $('.collapsible').collapsible();

        // MOBILE ARROW     
        $('#mob-categ').click(() => {
            let val = ($('.chevron').html() == 'chevron_right') ? 'keyboard_arrow_down' : 'chevron_right';
            $('.chevron').html(val)
        })
    })
</script>