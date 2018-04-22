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
          <h2>Criar Estadio</h2>
         <?php
            if ( (isset($_POST['nomeE'])) && (isset($_POST['local']) && (isset($_POST['cp'])))) {
             
                $nameE = $_POST['nomeE'];
                $place = $_POST['local'];
                $size = $_POST['cp'];

                $estadio = "INSERT INTO `wc_bd`.`estadio`(`id_estadio`,`localizacao`,`capacidade`,`nome`) VALUES('','$place','$size','$nameE')";
                if (!mysql_query($estadio)) {
                    die('Error: ' . mysql_error());
                    ?> <script>alert("Nao foi adicionado");</script> 
                    <?php
                }
                ?> <script>alert("Adicionado com sucesso!");</script> <?php
            }
            ?>





            <p>
            <div id="estadio">

                <p><h4 class="paragrafo1">WELCOME FIFA!</h4></p>
            <p><h5 class="paragrafo2">Registar o Estadio:</h5></p>
        <form action="" method="post">
          
            <label>Nome:</label><br/><input type="text" name="nomeE" value=""/><br/> 
            <label>Local:</label><br/><input type="text" name="local" value=""/><br/>  
            <label >Capacidade:</label><br/><input  type="number" name="cp" value=""/><br/>
            <br/>
            <input type="submit" name="confirmar"  value="Confirmar"/><br/><input type="reset" value="Limpar">
            <input type="button" value="Voltar" onClick="parent.location='index.php?'">   
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
    echo redirect('login.php');
}
?>  
</body>
</html>

