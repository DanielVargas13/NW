<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Perfil ?username? - Fênix</title>
        <!-- Logo na Aba do Navegador -->
        <link rel="shortcut icon" href="{{ URL::asset('Imagens/LogoPNG2.png')}}" >  

        <!-- IMPORT MATERIALIZE -->
        <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bitter|Playfair+Display" rel="stylesheet">

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
            .altera-cor:hover {
                background: red;
            }

            body {
                background-color: #f2f2f2;
            }

        </style>
    </head>

    <body>
        
        <?php require_once('nav/navbar.php')?>
        <?php require_once('nav/sidenav.php')?>
        <!-- @include('nav.navbar') -->

        <!-- COMPLETE CONTENT -->
        <div class="container white z-depth-2" style="display: table;">

            <!-- BANNER -->
            <div class="BANNER col m12" style="width: 100%; height: 20em">
                <img class=" z-depth-1" src="https://www.noticiasagricolas.com.br/dbimagens/133099bd31e7ebda1b22f84b87be8b17.jpg" alt="" style="width: 100%; height: 20em">
            </div>

            <!-- FOTO+DADOS -->
            <div class="row" style=" margin-left: 5em; margin-top: -12em; position: absolute;">
                <div class="left FOTO_PERFIL blue" style="width: 15em; height: 20em; border-style: solid">
                    <img class="z-depth-5" src="https://bistury.files.wordpress.com/2013/01/lula.jpg?w=1000" alt="" style="width: 100%; height: 100%;">
                </div>

                <div class="dados col offset-m5 white right">
                </div>
            </div>

            <!-- CONTEUDO -->
            <div class="CONTENT container white row" style="height: 35em; margin-top: 2em">

                <div class="ABOUT col m12 offset-m2 white">
                    <h2 style="border-bottom: 0.04em solid green">Sobre</h2>
                
                </div>
                    
            </div>
        </div>



    <!-- JQUERY MATERIALZE-->
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Script SideNav -->
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.collapsible').collapsible();
        });

    </script>
    <script>
        $(document).ready(function() {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('.modal').modal('open');
        });

    </script>
    
    <script>
    $(document).ready(()=>{
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown();
        $('.collapsible').collapsible();
        // MOBILE ARROW     
        $('#mob-especialidades').click(()=>{
            let val = ($('.chevron').html() == 'chevron_right') ? 'keyboard_arrow_down' : 'chevron_right';
            $('.chevron').html(val)
        });
    });
</script>
    </body>
</html>
