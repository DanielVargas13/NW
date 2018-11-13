<nav class="navbar-fixed" style="background: #323A45;">
    <div class="container">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="hide-on-med-and-down">
                <li><a href="{{ route('home') }}"><img src="{{URL::asset('Imagens/LogoPNG2.png')}}" style="height: 50px; width: 50px; margin-top:9px;"></a></li>
                <li class="ralewayFont"><a href="{{ route('home') }}" class="waves-effect waves-light modal-trigger">New World</a></li>
                <li class="left"><a class="sidenav-trigger waves-effect waves-light show-on-large modal-trigger" data-target="slide-out"><i class="material-icons">menu</i></a></li>
<<<<<<< HEAD
                <li class="right ralewayFont"><a href="{{route('logout')}}" class="waves-effect waves-light modal-trigger"><i class="material-icons right">exit_to_app</i>Sair</a></li>
                <li class="right ralewayFont"><a href="{{route('carrinho')}}" data-activates="notificarion" class="waves-effect waves-light modal-trigger"><i class="material-icons left notif">shopping_cart</i><small class="notification-badge"> 2 </small>  </a></li>
=======
>>>>>>> f47c3453ca2181a6c9097151fa5d8ef9121b4a8c

                <li class="center" style="margin-left: 18em; height: 64px; width: 65%;position: absolute">
                    <form method="GET" action="{{route('search')}}">
                        {{ csrf_field() }}
                        <div class="input-field" style="background: #383F4A;">
                            <input id="search" name="pesquisa" type="search" placeholder="Procurar" autocomplete="off" required>
                            <label class="label-icon" for="search"><button type="submit" id="search_button" class="waves-effect waves-teal btn-flat" style="margin-left: -18px; height: 64px; width: 60px;"><i class="material-icons">search</i></button></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </li>

                <li class="right ralewayFont" style="margin-right: -10em"><a href="{{route('logout')}}" class="waves-effect waves-light modal-trigger"><i class="material-icons right">exit_to_app</i>Sair</a></li>
                <li class="right ralewayFont" style="margin-right: -3em"><a href="{{route('carrinho')}}" class="waves-effect waves-light modal-trigger"><i class="material-icons">shopping_cart</i></a></li>
            </ul>
        </div>        
    </div>
</nav>

<nav style="background: #323A45;">
    <div class="container">
        <div class="nav-wrapper">
            <ul class="left hide-on-med-and-down">
                <li><a href="{{ route('home') }}" class="waves-effect waves-light modal-trigger">Home</a></li>
                <li>
                <a class="dropdown-trigger waves-effect waves-light modal-trigger"  data-target="drop-especialidade">Categorias<i class="material-icons right">arrow_drop_down</i></a>        
                </li>
                <li><a href="" class="waves-effect waves-light modal-trigger">Catálogo de Jogos</a></li>
                <li><a href="" class="waves-effect waves-light modal-trigger">Eventos</a></li>
                <li><a href="" class="waves-effect waves-light modal-trigger">Notícias</a></li>
                <li><a href="" class="waves-effect waves-light modal-trigger">Ranking de Jogos</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- DROPDOWN STRUCTURE -->
<ul id="drop-especialidade" class="dropdown-content" style="background: #383F4A;">
    <li><a href="{{route('categoria',3)}}" class="white-text waves-effect waves-light modal-trigger">Colecionáveis</a></li>
    <li><a href="{{route('categoria',4)}}" class="white-text waves-effect waves-light modal-trigger">Nintendo</a></li>
    <li><a href="{{route('categoria',5)}}" class="white-text waves-effect waves-light modal-trigger">PC</a></li>
    <li><a href="{{route('categoria',6)}}" class="white-text waves-effect waves-light modal-trigger">PS4</a></li>
    <li><a href="{{route('categoria',7)}}" class="white-text waves-effect waves-light modal-trigger">X-BOX</a></li>
    <li><a href="{{route('categoria',8)}}" class="white-text waves-effect waves-light modal-trigger">Outros</a></li>
</ul>
  