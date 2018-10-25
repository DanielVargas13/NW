<nav class="navbar-fixed" style="background: #323A45;">
    <div class="container">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="hide-on-med-and-down">
                <li><a><img src="{{URL::asset('Imagens/LogoPNG2.png')}}" style="height: 50px; width: 50px; margin-top:9px;"></a></li>
                <li class="left"><a class="sidenav-trigger waves-effect waves-light show-on-large modal-trigger" data-target="slide-out"><i class="material-icons">menu</i></a></li>
                <li class="ralewayFont"><a href="{{ route('home') }}">New World</a></li>
                <li class="right ralewayFont"><a href="{{route('logout')}}"><i class="material-icons right">exit_to_app</i>Sair</a></li>
                <li class="right ralewayFont"><a href="" ><i class="material-icons">shopping_cart</i></a></li>

                <li class="right">
                    <form method="GET" action="{{route('search')}}">
                        {{ csrf_field() }}
                        <div class="input-field" style="background: #383F4A;">
                            <input id="search" name="pesquisa" type="search" placeholder="Procurar" required>
                            <label class="label-icon" for="search"><button class="btn waves-effect waves-light ralewayFont modal-trigger corbtn" type="submit"><i class="material-icons"> search </i>    
                                </button> </label>
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
    <li><a href="{{route('categoria',3)}}" class="white-text">Collections</a></li>
    <li><a href="{{route('categoria',4)}}" class="white-text">Nintendo</a></li>
    <li><a href="{{route('categoria',5)}}" class="white-text">PC</a></li>
    <li><a href="{{route('categoria',6)}}" class="white-text">Personagens</a></li>
    <li><a href="{{route('categoria',7)}}" class="white-text">PS4</a></li>
    <li><a href="{{route('categoria',8)}}" class="white-text">X-BOX</a></li>
    <li><a href="{{route('categoria',9)}}" class="white-text">Outros</a></li>
</ul>
  