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
         
          <li class="selected"><a href="index.php">Incio</a></li>
          <li><a href="registos.php">Registos</a></li>
          <li><a href="manipular.php">Manipular</a></li>
          <li><a href="ferramentas.php">Ferramentas</a></li>
          <li><a href="listas.php">Listas</a></li>
          <li><a href="estatisticas.php">Estatisticas</a></li>
          <li><a href="calendario.php">Jogos</a></li>
          <li><a href="logout.php">Sair</a></li>
           
        </ul>
      </div>
    </body>
</html>
