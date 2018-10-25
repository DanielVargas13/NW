<?php
require_once('navbar.php');
?>

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
        
    </style>
    
    </head>

    <body class="white">
           
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
                    <tr>
                        <td> <img src="{{ URL::asset('Img_Prog/gow.png')}}" style="height:150px; width: 120px; float:left;"> <br> <p class="ralewayFont nome"> <b>Jogo Gof of War - PS4 </b> </p><p class="ralewayFont vendedor"> <b> Vendido por: </b>Daniel Vargas </p></td>
                        <td>  
                            <div class="row">
                                <div class="input-field col s4 m4 l4">
                                    <select>
                                        <option value="1" selected> 1 Unidade </option>
                                        <option value="2"> 2 Unidades </option>
                                        <option value="3"> 3 Unidades </option>
                                        <option value="4"> 4 Unidades </option>
                                        <option value="5"> 5 Unidades </option>
                                    </select>
                              </div>
                            </div>
                            <div class="row"> 
                                <div class="input-field col s4 m4 l4 center">
                                    <a href="#" class="ralewayFont red-text"> Remover </a>
                                </div>
                            </div>
                        </td>
                        <td class="ralewayFont vendedor"> <b>R$ 160,00</b> </td>
                  </tr>
                    <tr>
                        <td> <img src="{{ URL::asset('Img_Prog/funko.jpg')}}" style="height:150px; width: 120px; float:left;"> <br> <p class="ralewayFont nome"> <b> Funko Pop Sub-Zero - Collections </b> </p><p class="ralewayFont vendedor"> <b> Vendido por: </b> Grabriel Magno </p></td>
                        <td>  
                            <div class="row">
                                <div class="input-field col s4 m4 l4">
                                    <select>
                                        <option value="1" selected> 1 Unidade </option>
                                        <option value="2"> 2 Unidades </option>
                                        <option value="3"> 3 Unidades </option>
                                        <option value="4"> 4 Unidades </option>
                                        <option value="5"> 5 Unidades </option>
                                    </select>
                              </div>
                            </div>
                            <div class="row"> 
                                <div class="input-field col s4 m4 l4 center">
                                    <a href="#" class="ralewayFont red-text"> Remover </a>
                                </div>
                            </div>

                        </td>
                        <td class="ralewayFont vendedor"> <b>R$ 70,00</b> </td>
                  </tr>
                    <tr>
                        <td> <img src="{{ URL::asset('Img_Prog/3max.jpg')}}" style="height:150px; width: 120px; float:left;"> <br> <p class="ralewayFont nome"> <b> PS4 - Console </b> </p><p class="ralewayFont vendedor"> <b> Vendido por: </b> Davi Brandão </p></td>
                        <td>  
                            <div class="row">
                                <div class="input-field col s4 m4 l4">
                                    <select>
                                        <option value="1" selected> 1 Unidade </option>
                                        <option value="2"> 2 Unidades </option>
                                        <option value="3"> 3 Unidades </option>
                                        <option value="4"> 4 Unidades </option>
                                        <option value="5"> 5 Unidades </option>
                                    </select>
                              </div>
                            </div>
                            <div class="row"> 
                                <div class="input-field col s4 m4 l4 center">
                                    <a href="#" class="ralewayFont red-text"> Remover </a>
                                </div>
                            </div>

                        </td>
                        <td class="ralewayFont vendedor"> <b>R$ 1800,00</b> </td>
                  </tr>
                </tbody>
            </table>
            
            <br><br>
            
            <div class="col s6 m6 l6 z-depth-3">
                <div class="card horizontal grey lighten-3">
                    <div class="card-stacked">
                        <div class="card-content">
                            <p class="valorCompra ralewayFont center"> <b>Valor Total da Compra: R$ 2030,00 </b> </p>
                        </div>
                    </div> 
              </div>
            </div>
        </div>
        
        <br>
        
        <div class="row">
            <div class="container">
                <div class="col s6 m6 l6 offset-s4 offset-m4 offset-l4">
                <a class="waves-effect waves-light btn-large red"><i class="material-icons left"> close </i> Cancelar Compra </a>
                <a class="waves-effect waves-light btn-large green pulse"><i class="material-icons right"> attach_money </i> Comprar Produtos </a>
                </div>
            </div>           
        </div>
        
        <br><br><br>

        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--Materialize JS-->
        <script src="{{ URL::asset('js/materialize.min.js')}}"></script>        

        <script>
            $(document).ready(function(){
              $('select').formSelect();
            });
        </script>
        
    </body>
</html>