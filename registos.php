<head>
  <title>Registo</title>
  <meta name="description" content="website description" />
  <?php
 include_once './funcaoSeguranca.php';
  ?>
       
            <title>FIFA_WC_2018_NOVA CONTA</title>
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
        <?php  include_once 'menu.php'?>
    
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
          <h1>Registos:</h1>
      <?php            include_once './menuVerticalRegistos.php'; ?> 
        
          <img src="registos.jpg" width="500" height="500">
          
          
          
          
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
