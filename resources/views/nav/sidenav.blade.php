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
                            <li><a class="waves-effect" href="{{route('cCadastro', Auth::user()->idGamer)}}"> Cadastro Completo </a></li>
                            <li><a class="waves-effect" href="{{route('aCadastro', Auth::user()->idGamer)}}"> Atualizar Cadastro </a></li>
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
                            <li><a class="waves-effect" href="{{route('cProduto', Auth::user()->idGamer)}}"> Cadastrar Produto </a></li>
                            <li><a class="waves-effect" href="{{route('mProduto', Auth::user()->idGamer)}}"> Meus Produtos </a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li>
            <div class="divider"></div>
        </li>

    </ul>