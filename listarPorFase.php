<!DOCTYPE HTML>
<html>

<head>
  <title>HOME</title>
  <meta charset="UTF-8">
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a>FIFA WORLD CUP RUSSIA 2018</a></h1>
       
        </div>
      </div>
     <?php include 'menu.php' ?>;
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
      <?php include './menuVerticalEstatisticas.php'; ?>
          <h1 align='center'>Equipas por fase</h1>
        <h3 align='center'>Oitavos Final</h3>
 <?php listarEquipasPorFase('oitavosFinal'); ?>
       
          <hr>
        <h3 align='center'>Quartos final</h3>
         <?php listarEquipasPorFase('quartosFinal'); ?>
        <hr>
        <h3 align='center'>Meias final</h3>
         <?php listarEquipasPorFase('semiFinal'); ?>
        
        <hr>
        <h3 align='center'>Final</h3>
         <?php listarEquipasPorFase('final'); ?>
        <hr>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
