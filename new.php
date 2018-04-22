<!DOCTYPE HTML>
<html>

    <head>
        <title>Mapa</title>

        <meta charset="UTF-8">

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=weather"
        type="text/javascript"></script>
        <script type="text/javascript" src="funcoes_e_bd/funcoes.js"></script>
    </head>

    <body onload="start()" >
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <!-- class="logo_colour", allows you to change the colour of the text -->
                        <h1><a>FIFA WORLD CUP RUSSIA 2018</a></h1>

                    </div>
                </div>
                <?php
                include_once './menu.php';
                ?>
            </div>
            <div id="site_content">
                <div class="sidebar">
                    <!-- insert your sidebar items here -->
                    <h3>Noticias</h3>
 <?php 
                    include './feeds.php';
                    ?>


                </div>
                <div id="content">
                    <?php include_once './menuVerticalFerramentas.php'; ?>
                    <textarea id="endereco" rows="3" cols="10"></textarea>
                    <br />
                    <input type="button" onclick="obterEndereco()" value="Pesquisar" />
                    <div id="mapa_base" style="width: 200px; height: 400px;"></div>

                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                João silva , João Gomes, Mario Cardoso
            </div>
        </div>
    </body>
</html>