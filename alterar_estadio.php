<?php
$estadio = $_GET['id_procura'];
?>
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
     <?php  include './funcaoSeguranca.php';
     include 'menu.php';
      if (quemPode() === 1) {
            ?>;
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
          <h2>Alterar Estadio</h2>
        <?php
            if (isset($_POST['estadion']) && isset($_POST['local']) && isset($_POST['lotation'])) {
                $nestadio = $_POST['estadion'];
                $estadiol = $_POST['local'];
                $size = $_POST['lotation'];


                $s = "UPDATE `estadio` SET nome = '$nestadio', localizacao = '$estadiol', capacidade ='$size' WHERE id_estadio ='$estadio'";


                if (!mysql_query($s)) {
                    die('Error: ' . mysql_error());
                }
                ?> <script> alert("Efetuada com sucesso!");</script> <?php
            }
            ?><?php
            $query = mysql_query("SELECT * FROM estadio WHERE `id_estadio` = '$estadio'");

            while ($dados = mysql_fetch_array($query)) {
                $nombre = $dados['id_estadio'];
                $unombre = $dados['nome'];
                $morada = $dados['localizacao'];
                $acess = $dados['capacidade'];
            }
            ?>
                 <div id="stadium">
                <form method="post">
                    <pre>
         <label>ID:</label><br/><input type="text" name="idestadio" value="<?php echo $nombre; ?>" disabled="disabled" />  
        <label>Nome:</label><br/><input type="text" name="estadion" value="<?php echo$unombre; ?>"  />
        <label>Local:</label><br/><input type="text" name="local" value="<?php echo$morada; ?>"/>
        <labe>Capacidade:</labe><br/><input type="number" name="lotation" value="<?php echo $size; ?>" />
     <input type="submit" name="submit" value="Gravar"/> 
    <input name="Cancelar" type="reset" value="Cancelar"> 
     <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">

                    </pre>
                </form>
            </div>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
    <?php
} else {
    echo redirect('estadio.php');
}
?>  
</body>
</html>

