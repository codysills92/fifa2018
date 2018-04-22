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
        <title>Anonimo</title>
        <?php ?>
    </head>
    <body>
        <div id="menubar">
            <ul id="menu">

                <li class="selected"><a href="index.php">Inicio</a></li>
                <li><a href="estatisticas.php">Estatistica</a></li>
                <li><a href="calendario.php">Calendario</a></li>
                <li><a href="converte.php">Ferramenta</a></li>
                <li><a href="about.php">Contactos</a></li>
                 <li><a href="forum.php">Forum</a></li>
                <li><a href="login.php">Login</a></li>
               
                
                <li> <button class="botao01" onclick="document.cookie = 'fich=css.css;expires=Thu,01-Jan-2020 00:00:01 GMT';
                  window.location = 'index.php';">Estilo 1</button>
                    <button class="botao01" onclick="document.cookie = 'fich=css2.css;expires=Thu,01-Jan-2020 00:00:01 GMT';
               window.location = 'index.php';">Estilo 2</button>
                    <button  class="botao01" onclick="document.cookie = 'fich=css3.css;expires=Thu,01-Jan-2020 00:00:01 GMT';
                    window.location = 'index.php';">Estilo 3</button></li>

            </ul>
        </div>
    </body>
</html>
