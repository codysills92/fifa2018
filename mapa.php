<!DOCTYPE HTML>
<html>

<head>
  <title>Mapa</title>
 
        <meta charset="UTF-8">

        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAAaVFxs6kNq7gWY59qf5XMxSec6s_uUscdbTyPSy8oWl8zYzqFRRanjFebOU60thMmEQQDEPx3A3y5Q"
        type="text/javascript"></script>
        <script type="text/javascript" src="funcoes_e_bd/funcoes.js"></script>
</head>

<body onload="start()" onunload="GUnload()">
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
   <?php  include_once './menuVerticalFerramentas.php'; ?>
        <form id="form_mapa" action="#" method="get">
           
                            <label for="partida">Origem: </label> 
                            <input type="text" name="partida" id="partida" value="" size="50" />
                            <br />
                            <label for="destino">Destino: </label> 
                            <input type="text" name="destino" id="destino" value="Gualtar" size="50" /> 
                            <br />
                            <input type="button" name="enviar" id="enviar" value="Rota" onclick="gerarRota()"/>
                        </form>
                        <div id="mapa_base" style="width: 600px; height: 500px;"></div>
                        <div id="route" style="width: 100px; height: 200px; position: absolute; right: 0; top: 0;"></div>
                        
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
