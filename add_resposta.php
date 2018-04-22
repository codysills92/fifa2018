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

error_reporting(E_ALL ^ E_DEPRECATED);
ini_set("display_errors", 1);
require_once './funcoes_e_bd/basedados.php';

date_default_timezone_set("Europe/Lisbon");
$r_nome = $_POST['a_name'];
$r_email = $_POST['a_email'];
$resposta = $_POST['a_answer'];
$datetime = date("j/m/y h:i:s",time());
$iD = $_POST['id'];

if (empty($r_nome)) {
    if (empty($r_email)) {
        if (empty($resposta)) {
            echo "Por favor, preencha os campos em falta.";
            echo "<a href=vertopico.php?id=" . $iD . " '>Submita a sua resposta correctamente</a>";
        }
    }
} else {
    $result = seleciona_idresposta();
    $rows = mysql_fetch_array($result);
// adicionar + 1 ao maior id de resposta "$Max_id". se ainda não for criada nenhuma resposta ,será definida como = 1 .
    if ($rows) {
        $Max_id = $rows['Max_a_id'] + 1;
    } else {
        $Max_id = 1;
    }
//criado uma nova resposta ,introduz na base dados os dados da resposta criada.
    $sql2 = "INSERT INTO `f_resposta`(id_pergunta, r_id, r_nome, r_email, resposta, r_data_h)VALUES('$iD', '$Max_id', '$r_nome', '$r_email', '$resposta', '$datetime')";
    $result2 = mysql_query($sql2, ligar_base_dados());

    if ($result2) {
        echo "<h3>Adicionado com sucesso!<BR></h3>";
        echo "<h5><a href='vertopico.php?id=" . $iD . "'>Tua resposta</a></h5>";

// adiciona + 1 ao coluna reply na tabela forum_question (questões) 
        contar_resposta($iD);
    } else {
        echo "ERROR";
    }
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

