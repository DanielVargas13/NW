<!-- SIDE-NAV CONSOLES -->
<ul id="slide-out" class="sidenav sidenav-fixed">
    <div class="container">
        <form method="GET" action="{{route('filtragem')}}">
            {{ csrf_field() }}
            <h4 class="ralewayFont"> Tipos </h4>

            <label>
                <input name="tipos[]" value="Acessório" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Acessórios </span>
            </label>
            <label>
                <input name="tipos[]" value="Console" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Console </span>
            </label>
            <label>
                <input name="tipos[]" value="Jogo" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Jogos </span>
            </label>

            <div class="divider"></div>

            <h4 class="ralewayFont"> Status </h4>

            <label>
                <input name="status[]" value="Novo" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Novo </span>
            </label>
            <label>
                <input name="status[]" value="Seminovo" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Seminovo </span>
            </label>
            <label>
                <input name="status[]" value="Usado" type="checkbox" class="filled-in" />
                <span class="center textoSideNav"> Usado </span>
            </label>

            <div class="divider"> </div>

            <h4 class="ralewayFont"> Preço </h4>
            <label>
                <input value="0" class="with-gap" name="preco" type="radio" />
                <span>Menor Preço</span>
            </label>
            <label>
                <input value="1" class="with-gap" name="preco" type="radio" />
                <span>Maior Preço</span>
            </label>

            <div class="divider"> </div>

            <br><br>

            <button id="filtrar" class="btn waves-effect waves-light ralewayFont modal-trigger corbtn" type="submit"><i class="material-icons right"> search </i> Fazer Busca </button>

        </form>
    </div>
</ul>
