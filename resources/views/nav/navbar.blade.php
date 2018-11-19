
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
        margin-top: -64px;
        position: fixed
    }

    .perfil-btn-mobile {
        position: fixed;
        bottom: 8px;
        right: 16px;
        font-size: 18px;
        z-index: 999;
    }

    .categ-body{
        margin-left: 25px;
    }

    #mobile-menu{
        max-height: 25em;
    }

</style>

<div class="hide-on-small-only">

    <!-- navbar superior -->
    <nav class="navbar-fixed cinza">
        <div class="col m1" style="position: absolute">
            <a href="{{ route('home') }}"><img src="{{URL::asset('Imagens/LogoPNG2.png')}}" style="height: 50px; width: 50px; margin-top:9px;"></a>
        </div>
        <div class="container">
            <div class="nav-wrapper row">
                <ul>

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
                            <a href="#modalCarrinho" class="waves-effect waves-light modal-trigger" style="width: 4em;">
                                @if (app('App\Http\Controllers\ProdutoController')->totalCar() == 0)
                                    <i class="material-icons left">shopping_cart</i>
                                @else
                                <span class="stl-cart">
                                        <i class="material-icons left notif stl-cart">shopping_cart</i><small class="notification-badge"> {{ app('App\Http\Controllers\ProdutoController')->totalCar()}} </small> 
                                </span>
                                 @endif 
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
                    <li><a class="dropdown-trigger waves-effect waves-light modal-trigger"  data-target="drop-especialidade">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
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
            <li><a class="waves-effect waves-light modal-trigger"><i class="material-icons">close</i></a></li>
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

    <!-- Mobile : Navbar inferior -->
    <nav class="cinza">
        
    <div style="margin: 0px -10px">
            <div class="nav-wrapper row">
                <ul class="hide-on-med-and-up">
                
                    <div class="col s12">
                        <li class="center" style="height: 64px; width: 100%">
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
                </ul>
            </div>        
        </div>
    </nav>
    
    <nav class="cinza" style="margin-top: .5em">
        <div class="container">
            <ul class="hide-on-med-and-up">
                <div class="col s12">
                        <li class="right ralewayFont">
                            <a href="{{route('logout')}}" class="waves-effect waves-light modal-trigger">
                                <i class="material-icons right">exit_to_app</i>Sair
                            </a>
                        </li>

                    <li class="left ralewayFont">
                        <a href="{{route('carrinho')}}" data-activates="notificarion" class="waves-effect waves-light modal-trigger">
                            <span class="stl-cart">
                                <i class="material-icons notif stl-cart">shopping_cart</i><small class="notification-badge"> 2 </small>  
                            </span>
                        </a>
                    </li>
                </div>
            </ul>
        </div>
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
@php
    $itens = app('App\Http\Controllers\ProdutoController')->carrinhoModal();
    $prd = $itens[0];
    $quant = $itens[1];
@endphp

  <!-- Modal Structure -->
  <div id="modalCarrinho" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center ralewayFont"> Meu Carrinho de Compras </h4>
        <div class="container">
            <table class="highlight responsive-table">
                <thead>
                    <tr>
                        <th class="ralewayFont titulo"> <b> Produto </b> </th>
                        <th class="ralewayFont titulo"> <b> Preço </b> </th>
                    </tr>
                </thead>

                <tbody>
                     @foreach($prd as $prod)
                    <tr>
                        <td> <img src="{{ URL::asset('Imagens/'.$prod->foto)}}" style="height:150px; width: 120px; float:left;"> 
                            <br> <p class="ralewayFont nome"> <b> {{$prod->categoria}} - {{$prod->nome}} - {{$prod->tipo->nome}} </b> </p>
                            <p class="ralewayFont nome"> <b> Quantidade: </b> {{$quant[$prod->idProduto]}} </p>
                            <a href="{{route('removerMod',$prod->idProduto)}}" class="ralewayFont red-text"> Remover </a>
                        </td>
                        <td class="ralewayFont vendedor"> <b>R$ {{Cart::session(Auth::user()->cliente->idCliente)->get($prod->idProduto)->getPriceSum()}} </b> </td>
                  </tr>
                    @endforeach
                </tbody>
            </table>
            
            <br><br>
            
            <div class="col s6 m6 l6 z-depth-3">
                <div class="card horizontal grey lighten-3">
                    <div class="card-stacked">
                        <div class="card-content">
                            <p class="valorCompra ralewayFont center"> <b>Valor Total da Compra: R$ {{Cart::session(Auth::user()->cliente->idCliente)->getTotal()}} </b> </p>
                        </div>
                    </div> 
              </div>
            </div>
        </div>      
    </div>
    <div class="modal-footer">
        <a href="{{route('carrinho')}}" class="modal-close waves-effect waves-green btn-flat green-text right"> Ver Carrinho </a>
        <a href="{{route('limparMod')}}" class="modal-close waves-effect waves-green btn-flat red-text right"> Cancelar Pedido </a>
    </div>
  </div>
    
    <!-- Script Modal Carrinho -->
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
    
<script>
    $(document).ready(() => {
        $('.collapsible').collapsible();

    })
</script>