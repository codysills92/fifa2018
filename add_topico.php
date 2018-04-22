<!DOCTYPE HTML>
<html>

<head>
  <title>HOME</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css.css" title="style" />
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
      
     <?php


ligar_base_dados();

date_default_timezone_set("Europe/Lisbon");


$topico = $_POST['topico'];
$descricao = $_POST['descricao'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$datetime = date("j/m/y h:i:s",time());

if (empty($descricao)) {
    if (empty($email)) {
        if (empty($nome)) {
            if (empty($topico)) {
                echo "<h1>Por favor, preencha os campos em falta.</h1>";
                  echo "<h5>So é possivel criar um topico caso preencha os dados</h5>";
                echo "<a href=criartopico.php>Crie o seu topico</a>";
            }
        }
    }
} else {
    $sql = "INSERT INTO `f_pergunta`(topico, descricao, nome, email, data_h)VALUES('$topico', '$descricao', '$nome', '$email', '$datetime')";
    $result = mysql_query($sql);

    if ($result) {
        echo "Pergunta adicionado com sucesso<BR>";
        echo "<a href=forum.php>Ver topico </a>";
    } else {
        echo "ERROR";
        echo "<a href=forum.php>Voltar ao Forum</a>";
    }
    mysql_close();
}
?>

      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>



