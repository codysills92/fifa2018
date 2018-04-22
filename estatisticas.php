<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estatisticas</title>
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
     <?php include_once './menu.php'; ?>;
    </div>
    <div id="site_content">
      <div class="sidebar">
       
        <h3>Noticias</h3>
        
         <?php   include './feeds.php';
                    ?>

      </div>
      <div id="content">
      
<?php include_once './menuVerticalEstatisticas.php'; ?>
          
          <img src="estatisticas.jpg" width="400" height="275">
          <?php $golos = golos(); $totag = mysql_num_rows($golos); ?>
          <h4>Total de golos FIFA WORLD CUP: <?php echo $totag; ?></h4>
          <?php $auto = autogolos() ; $totaut = mysql_num_rows($auto); ?>
          <h4>Total de auto-golos FIFA WORLD CUP: <?php echo $totaut; ?></h4>
          <?php $amarelos = cartoesAmarelos(); $tamrelos = mysql_num_rows($amarelos); ?>
          <h4>Total de Amarelos FIFA WORLD CUP: <?php echo $tamrelos; ?></h4>
           <?php $v = cartoesVermelhos(); $tv = mysql_num_rows($v); ?>
          <h4>Total de Amarelos FIFA WORLD CUP: <?php echo $tv; ?></h4>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>

