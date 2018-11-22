

<!DOCTYPE html>
<html>
    <head>  
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS-->
        <link rel="stylesheet" href="{{ URL::asset('css/materialize.min.css')}}">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

        <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
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
        

        
        .titulo{
            font-size: 20px; 
        }
        
        .nome{
            font-size: 20px;
        }
        
        .vendedor{
            font-size: 17px;
        }
        
        .valorCompra{
            font-size: 25px;
            font-weight: bold;
        }
        
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

    <body class="white">
           @include('nav.navbar')

<!-- Side Nav -->
     @include('nav.sidenav')
        <h1 class="ralewayFont center"> Minha Cesta </h1>
        
        <div class="container">

            <table class="highlight responsive-table">
                <thead>
                    <tr>
                        <th class="ralewayFont titulo"> <b> Produto </b> </th>
                        <th class="ralewayFont titulo"> <b> Quantidade </b> </th>
                        <th class="ralewayFont titulo"> <b> Preço </b> </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($produtos as $prod)
                    <tr>
                        <td> <img src="{{ URL::asset('Imagens/'.$prod->foto)}}" style="height:150px; width: 120px; float:left;"> <br> <p class="ralewayFont nome"> <b>{{$prod->categoria}} - {{$prod->nome}} - {{$prod->tipo->nome}} </b> </p><p class="ralewayFont vendedor">
                        @foreach($prod->cliente as $cliente)
                            <b> Vendido por: </b> <a href="{{route('paginaV',$cliente->idCliente)}}" class="card-title activator center" style="font-size: 1.2rem; color: #0d47a1;"> {{$cliente->gamer->nome}}</a> 
                        @endforeach
                        </p></td>
                        <td>  
                            <div class="row">
                                <div class="input-field col s4 m4 l4">
                                    <b> Quantidade: </b>{{$qtd[$prod->idProduto]}}
                              </div>
                            </div>
                            <div class="row"> 
                                <div class="input-field col s4 m4 l4 center">
                                    <a href="{{route('removerP',$prod->idProduto)}}" class="ralewayFont red-text"> Remover </a>
                                </div>
                            </div>
                        </td>
                        <td class="ralewayFont vendedor"> <b>R$ {{Cart::session(Auth::user()->cliente->idCliente)->get($prod->idProduto)->getPriceSum()}}</b> </td>
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
        
        <br>
        
        <div class="row">
            <div class="container">
                <div class="col s6 m6 l6 offset-s4 offset-m4 offset-l4">
                <a href="{{route('limparCar')}}" class= "waves-effect waves-light btn-large red"><i class="material-icons left"> close </i> Cancelar Compra </a>
                    @php
                        $idprods = implode(",",$idps);
                    @endphp
                <a href="{{route('comprarP', $idprods)}}" class="waves-effect waves-light btn-large green"><i class="material-icons right"> attach_money </i> Comprar Produtos </a>
                </div>
            </div>           
        </div>
        
        <br><br><br>

        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--Materialize JS-->
        <script src="{{ URL::asset('js/materialize.min.js')}}"></script>        
<script>
        $(document).ready(function() {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
        });

    </script>
    <script>
        $(document).ready(function() {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('#modal1').modal('open');
        });

    </script>
        <script>
            $(document).ready(function(){
              $('select').formSelect();
            });
        </script>

        @include('nav.footer')
        
    </body>
</html>