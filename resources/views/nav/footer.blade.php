
<style>

.stl-cart{
    margin-left: 15px;
}

.cinza{
    background-color: #323A45 !important;
}

.cinza-claro{
    background-color: #3d4654;
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

    <footer class="page-footer cinza-claro">
        <div class="container">
            <div class="row">
                <div class="col s12 m2">
                    <h5 class="white-text">Navegue</h5>
                    <ul>
                        <li><a href="{{route('home')}}" class="white-text text-lighten-3">Home</a></li>
                        <li><a href="" class="white-text text-lighten-3">Catálogo de Jogos</a></li>
                        <li><a href="" class="white-text text-lighten-3">Eventos</a></li>
                        <li><a href="" class="white-text text-lighten-3">Notícias</a></li>
                        <li><a href="" class="white-text text-lighten-3">Ranking de Jogos</a></li>
                    </ul>
                </div>
                <div class="col s12 m2 offset-m2">
                    <h5 class="white-text">Categorias</h5>
                    <ul>
                        <li><a href="{{route('categoria',3)}}" class="white-text text-lighten-3">Colecionáveis</a></li>
                        <li><a href="{{route('categoria',4)}}" class="white-text text-lighten-3">Nintendo</a></li>
                        <li><a href="{{route('categoria',5)}}" class="white-text text-lighten-3">PC</a></li>
                        <li><a href="{{route('categoria',6)}}" class="white-text text-lighten-3">PS4</a></li>
                        <li><a href="{{route('categoria',7)}}" class="white-text text-lighten-3">X-BOX</a></li>
                        <li><a href="{{route('categoria',8)}}" class="white-text text-lighten-3">Outros</a></li>
                    </ul>
                </div>
                <div class="col s12 m2 offset-m2">
                    <h5 class="white-text">Meus Produtos</h5>
                    <ul>
                        <li><a href="{{route('cProduto', Auth::user()->idGamer)}}" class="white-text text-lighten-3">Cadastrar</a></li>
                        <li><a href="{{route('mProduto', Auth::user()->idGamer)}}" class="white-text text-lighten-3">Listar todos</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright cinza">
            <div class="container">
                © 2018 New world - Todos os direitos reservados
            </div>
        </div>
    </footer>

<!-- MOBILE -->
<div class="hide-on-med-and-up">
    
</div>

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