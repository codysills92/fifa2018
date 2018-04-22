<?php
if (isset($_COOKIE["fich"]))
    $nome = $_COOKIE["fich"];
else {
    $nome = "css.css";
}

setcookie('fich', $nome, time() + 3600);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo $nome ?>"/>
        <title>admin</title>
        <?php ?>
    </head>
    <body>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">Inicio</a></li>
          <li><a href="personal_Page.php">Perfil</a></li>
          <li><a href="criarEstadio.php">Criar estadios</a></li>
          <li><a href="estadio.php">Estadios</a></li>
          
          <li><a href="ferramentas.php">Ferramentas</a></li>
          <li><a href="forum.php">Forum</a></li>
          <li><a href="logout.php">Sair</a></li>
           
        </ul>
      </div>
    </body>
</html>