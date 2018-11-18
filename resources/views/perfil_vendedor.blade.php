<!DOCTYPE html>

<html>
    <head>
        <title> New World - Avaliação Vendedor </title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta charset="UTF-8">
    <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS-->
    <link rel="stylesheet" href="{{ URL::asset('css/materialize.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <style>
        h3 {
            font-size: 24px;
        }
        .fontes{
            font-family: 'Raleway';
        }
        
        .nome{
            font-size: 20px;
        }

        /* SVG PARA MOSTRAR RESULTADO DA AVALIAÇÃO */
        .flex-wrapper {
            display: flex;
            flex-flow: row nowrap;
        }

        .single-chart {
            width: 33%;
            justify-content: space-around ;
        }

        .circular-chart {
            display: block;
            margin: 10px auto;
            max-width: 80%;
            max-height: 250px;
        }

        .circle-bg {
            fill: none;
            stroke: #323A45;
            stroke-width: 3.8;
        }

        .circle {
            fill: none;
            stroke-width: 2.8;
            stroke-linecap: round;
            animation: progress 1s ease-out forwards;
        }

        @keyframes progress {
            0% {
                stroke-dasharray: 0 100;
            }
        }

        .circular-chart.orange .circle {
            stroke: #2ecc71;
        }


        .percentage {
            fill: #323A45;
            font-family: sans-serif;
            font-size: 0.7em;
            text-anchor: middle;
        }   

        .orange{
            background-color: #f2f2f2 !important;
        }
        
        .avaliacao{
            fill: #2ecc71;
            font-family: sans-serif;
            font-size: 0.3em;
            text-anchor: middle;           
        }
        
        .numAvaliacoes{
            font-size: 20px;
        }
        
        /* ESTRELAS DE AVALIAÇÃO */
        .glyphicon-star-empty, .glyphicon-star { 
            font-size: 32px;
        }
        .glyphicon {
            position: relative;
            top: 1px;
            display: inline-block;
            font-family: 'Glyphicons Halflings';
            font-style: normal;
            font-weight: normal;
            line-height: 1;
  
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .glyphicon-star:before {
            content: "\e006";
        }
        .glyphicon-star-empty:before {
            content: "\e007";
        }
        
        /* Informações Vendedor CARD */
        .infoVendedor{
            font-size: 18px;
        }
        
        .infomaVendedor{
            font-size: 20px;
        }
        
        /* Cor do botão de foto e cadastrar */
        .corbtn{
            background: #323A45;
        }
        
        .modal-trigger:hover {
            background: #2ecc71;
        }
        
        .pegaInfo{
            color: #2ecc71;
        }
        
        .comentarioNome{
            font-size: 20px;
        }
        
        .comentarioComent{
            font-size: 20px;
        }
        
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
        .altera-cor:hover {
            background: red;
        }

        body {
            background-color: #f2f2f2;
        }

        /* Cor preta dos botões */
        .corBtn{
            background: #323A45;   
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
    
    </head>
    
    <body>
         @include('nav.navbar')

<!-- Side Nav -->
     @include('nav.sidenav')
        <br><br><br><br>
        
        <div class="row">
            <!-- LADO ESQUERDO -->
            <div class="col s6 m6 l6">
                <br><br>
                <div class="col s5 m5 l5 offset-s5 offset-m5 offset-l5">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ URL::asset('Imagens/'.$cliente->foto)}}" style="height: 400px;">                 
                    </div>
                    <div class="card-content">
                        <span class="card-title fontes nome"> {{$cliente->gamer->nome}} </span>
                        <p class="fontes infoVendedor"> <b>Produtos Vendidos:</b> 20 </p>
                    </div>
                  </div>
                </div>
            </div>
           
            <!-- LADO DIREITO -->
            <div class="col s6 m6 l6">
                <div class="row">
                    <div class="col s8 m8 l8 offset-s2 offset-m2 offset-l2">
                        <div class="flex-wrapper">
                            <div class="single-chart">
                                <svg viewBox="0 0 36 36" class="circular-chart orange">
                                    <path class="circle-bg"
                                        d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                    />
                                    <path class="circle"
                                        stroke-dasharray="90, 100"
                                        d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                    />
                                    <text x="18" y="18.35" class="percentage fontes"> 90 </text>
                                    <text x="18" y="23.35" class="avaliacao fontes"> Ótimo </text>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="col s8 m8 l8 center">
                        <p class="fontes numAvaliacoes"> Baseado em <b>10</b> avaliações de compradores. </p>
                    </div>
                    <br>
                    <br>
                    <div class="col s8 m8 l8">
                        <div class="divider"></div>
                    </div>
                    <br>
                    <div class="col s8 m8 l8 center">
                        <h3 class="fontes">  Como você classificaria este vendedor? </h3>

                        <div class="ten stars">
                        </div>
                        <br>
                    </div>
                    <div class="col s8 m8 l8">
                        <div class="divider grey lighten-1"></div>
                        <br><br>
                    </div>
   
                    <div class="col s8 m8 l8 center grey lighten-2">      
                        <form>
                            <div class="row">
                                <h3 class="fontes"> Comente sobre este vendedor </h3>
                                <div class="input-field col s8 m8 l8 offset-s2 offset-m2 offset-l2">
                                    <i class="material-icons prefix">attach_file</i>
                                    <textarea id="icon_prefix2" class="materialize-textarea" maxlength="200"></textarea>
                                    <label for="icon_prefix2"> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s10 m10 l10">
                                    <a class="waves-effect waves-light btn corbtn modal-trigger white-text right"> Postar </a>
                                </div>
                            </div>
                        </form>
                   </div>
                </div>
            </div>    
        </div>
        
        <div class="row">
            <div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">
                <div class="divider grey lighten-1"></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col s6 m6 l6 grey lighten-2 offset-s3 offset-m3 offset-l3">
                <h2 class="fontes center"> <b>Informações do Vendedor</b> </h2> 
                <br><br>
                <div class="col s8 m8 l8 offset-s2 offset-m2 offset-l2">
                    <div class="col s12 m12 l12">
                        <div class="col s6 m6 l6">
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> account_box </i> <b> Nome: </b></p>
                            <p class="fontes infomaVendedor"> {{$cliente->gamer->nome}} </p>
                            <br>
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> adb </i> <b> Nick: </b></p> 
                            <p class="fontes infomaVendedor"> {{$cliente->nick}} </p>
                            <br>
                        </div>
                        <div class="col s6 m6 l6">
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> email </i> <b> E-mail: </b></p> 
                            <p class="fontes infomaVendedor"> {{$cliente->gamer->email}} </p>
                            <br>
                            <p class="fontes infomaVendedor"><i class="material-icons prefix">phone</i> <b> Telefone Celular: </b></p> 
                            <p class="fontes infomaVendedor"> {{$cliente->telefone}} </p>
                            </div>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="divider grey lighten-1"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="col s6 m6 l6">
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> filter_hdr </i> <b> Estado </b></p> 
                            <p class="fontes infomaVendedor"> {{$cliente->estado}} </p>
                            <br>
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> location_city </i> <b> Cidade </b></p> 
                            <p class="fontes infomaVendedor"> {{$cliente->cidade}} </p>
                            <br>
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> nature_people </i> <b> Bairro </b></p>
                            <p class="fontes infomaVendedor"> {{$cliente->bairro}} </p>
                            <br>
                        </div>
                        <div class="col s6 m6 l6">
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> directions </i> <b> Rua </b></p> 
                            <p class="fontes infomaVendedor"> {{$cliente->rua}} </p>
                            <br>
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> local_convenience_store </i> <b> Número </b></p> 
                            <p class="fontes infomaVendedor"> {{$cliente->numero}} </p>
                            <br>
                            <p class="fontes infomaVendedor"><i class="material-icons prefix"> edit_location </i> <b> CEP </b></p> 
                            <p class="fontes infomaVendedor"> {{$cliente->cep}} </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">
                <div class="divider grey lighten-1"></div>
            </div>
        </div>
        
        <br><br>
        
        <h2 class=" center fontes"> <b> Produtos deste Vendedor </b> </h2>
        <br>
        
    <div class="container">
        <div class="row">
            @foreach($produtos as $prod)
            <div class="col s4 m4 l4">
                <div class="card">
                    <div class="card-image">
                        <br>
                        <img src="{{ URL::asset('Imagens/'.$prod->foto)}}" style="height: 230px;">
                    </div>
                    <br>
                    <div class="divider"></div>
                    <div class="card-content">
                         @if ($prod->tiponegocio == "Venda")
                            <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$prod->nome}} - {{$prod->tiponegocio}} - R$ {{$prod->preco}} </span>
                        @else
                            <span class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$prod->nome}} - {{$prod->tiponegocio}} </span>
                        @endif
                        @foreach($prod->cliente as $cliente)
                        <a href="{{route('paginaV',$cliente->idCliente)}}" class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$cliente->gamer->nome}}</a>
                        @endforeach
                         <span class="card-title activator center">
                        <a href="{{route('produto.show',$prod->idProduto)}}"><button class="btn corBtn waves-effect waves-blue darken-3 center modal-trigger" type="button" onclick=""> Ver Produto <i class="material-icons right"> launch </i></button></a>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        
        <div class="row">
            <div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">
                <div class="divider grey lighten-1"></div>
            </div>
        </div>
        
        <br><br>
        
        <h2 class=" center fontes"> <b> Comentários Sobre Este Vendedor </b> </h2>
        <br>
        <div class="row">
            <div class="col s6 m6 l6 grey lighten-2 offset-s3 offset-m3 offset-l3">
                <div class="col s8 m8 l8 offset-s2 offset-m2 offset-l2">
                    <div class="col s12 m12 l12">
                        <div class="row">
                            <br>
                            <div class="col s8 m8 l8">
                                <img class="circle" src="{{ URL::asset('Imagens/noctis.jpg')}}" style="height: 100px; width: 110px;"> <span class="fontes comentarioNome"> &nbsp;&nbsp;&nbsp;<b> Noctis Lucius Caelum </b> </span>                        
                                <br><br>
                            </div>
                            <div class="col s12 m12 l12">
                                <div class="idA">
                                </div>
                                <span class="fontes comentarioComent">  Excelente vendedor de jogos, nunca tive problemas.</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="divider grey lighten-1"></div>
                            </div>
                        </div>

                        <div class="row">
                            <br>
                            <div class="col s8 m8 l8">
                                <img class="circle" src="{{ URL::asset('Imagens/ciri.jpg')}}" style="height: 100px; width: 110px;"> <span class="fontes comentarioNome"> &nbsp;&nbsp;&nbsp;<b> Ciri </b> </span>
                                <br><br>
                            </div>
                            <div class="col s12 m12 l12">
                                <div class="idB">
                                </div>
                                <span class="fontes comentarioComent">  Excelente vendedor, vende ótimos produtos, em ótimo estado, sempre compro e vou comprar com ele.</span>
                            </div>
                        </div>   
                        
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="divider grey lighten-1"></div>
                            </div>
                        </div>

                        <div class="row">
                            <br>
                            <div class="col s8 m8 l8">
                                <img class="circle" src="{{ URL::asset('Imagens/kratos.jpg')}}" style="height: 100px; width: 110px;"> <span class="fontes comentarioNome"> &nbsp;&nbsp;&nbsp;<b> Kratos </b> </span>
                                <br><br>
                            </div>
                            <div class="col s12 m12 l12">
                                <div class="idC">
                                </div>
                                <span class="fontes comentarioComent">  Péssimo vendedor, os produtos demoram chegar, sempre chegam estragados ou com defeitos, sempre tivep roblemas com ele.</span>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--Materialize JS-->
        <script src="{{ URL::asset('js/materialize.min.js')}}"></script>     
        
        <!-- SCRIPT AVALIAÇÃO ESTRELAS -->
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="{{ URL::asset('js/stars.js')}}"></script>
        <script>
            $(".ten").stars({emptyIcon: 'glyphicon glyphicon-star-empty',
                filledIcon: 'glyphicon glyphicon-star',stars: 10, color:'#2ecc71'});
        </script>
        <script>
            $(".idA").stars({emptyIcon: 'glyphicon glyphicon-star-empty',
                filledIcon: 'glyphicon glyphicon-star',stars: 10, color:'#2ecc71', value:9});
        </script>
        <script>
            $(".idB").stars({emptyIcon: 'glyphicon glyphicon-star-empty',
                filledIcon: 'glyphicon glyphicon-star',stars: 10, color:'#2ecc71', value:10});
        </script>
      <script>
            $(".idC").stars({emptyIcon: 'glyphicon glyphicon-star-empty',
                filledIcon: 'glyphicon glyphicon-star',stars: 10, color:'#2ecc71', value:2});
        </script>
        
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
       
        @include('nav.footer')

    </body>
</html>
