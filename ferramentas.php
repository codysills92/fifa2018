<!DOCTYPE HTML>
<html>
<head>
  <title>ferramentas</title>
         <meta charset="UTF-8">
      
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          
          <h1><a>FIFA WORLD CUP RUSSIA 2018</a></h1>
       
        </div>
      </div>
        <?php include_once './menu.php'; ?>;
    
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
          <br>
          <br>
          <h1>Ferramentas:</h1>
      <?php            include_once './menuVerticalFerramentas.php'; ?> 
        
          <img src="ferramentas.jpg" width="500" height="500">
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
