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
        <h1>Tabela Melhores marcadores</h1>
  <div class="tabela" align='center'>
          <?php
     $jog =  listar_jogador_porGolos();
     
     ?>
      
        <ul >
        <?php
     while ($row = mysql_fetch_array($jog)) {
         ?>
     <ol><?php echo $row['nome'].'   '.$row['nrGolos']  ?></ol>
      <?php 
}
?>
      </div>
    </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
