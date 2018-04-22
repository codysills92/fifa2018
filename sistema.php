
<!DOCTYPE HTML>
<html>

<head>
  <title>HOME</title>
 
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
       include_once './menuVerticalManipular.php';
        $sistema = selecion_sistema();
        if (mysql_num_rows($sistema) == 0) {


            if (isset($_POST['datai']) && (isset($_POST['dataf']))) {
                $dataIn = $_POST['datai'];
                $dataFim = $_POST['dataf'];
                $ligacao = ligar_base_dados();
                $sql = "INSERT INTO `wc_bd`.`calendario` (`id`, `inicio_evento`, `fim_evento`) VALUES ('FifaWc_2018', '$dataIn', '$dataFim')";

              if (!mysql_query($sql)) {
                    die('Error: ' . mysql_error());
                    ?> <script>alert("Nao foi adicionado");</script> 
                    <?php 
                                mysql_close($ligacao);
                }
                ?> <script>alert("Adicionado com sucesso!");window.location = "index.php";</script> 
                
                
                <?php
                
            }
            ?> 

                <form method="post">

                <label >Data inicio:</label><br/><input  type="date" name="datai" value=""/><br/>
    <?php ?>
                <label> Data final:</label><br/><input  type="date" name="dataf" value=""/><br>    
                <input type="submit" name="confirmar"  value="Confirmar"/><br/>
                <input type="reset" value="Limpar">
            </form>
<?php } else {
    ?> <h3 align='center'>Alterar Inicio e fim de envento</h3>
            <h4>ATENCAO!! Ao Alterar o inicio e Fim do Envento será reiniciado todo o sistema FifaWc_2018</h4>

            Apagar todos os jogos? 
          <form method="post"><input type="submit" name='reset' value="Reiniciar Sistema">
               <?php if(isset($_POST['reset'])){
                    reiniciar();
               }
?>
            </form>

      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
<?php }