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
    <?php
        include './funcaoSeguranca.php';
        include("menu.php");
        if (quemPode() === 0) {
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
        <?php include_once './menuVerticalRegistos.php';?>
         <?php
            if ((isset($_POST['nomeGr'])) && (isset($_POST['idGrupo']))) {
                $nomeGr = $_POST['nomeGr'];
                $idGrupo = $_POST['idGrupo'];
                $ligacao = ligar_base_dados();
                $r = mysql_query("SELECT * FROM grupo WHERE id_grupo='$idGrupo'", $ligacao);

                if ((mysql_num_rows($r)) == 0) {

                    $grupo = "INSERT INTO `wc_bd`.`grupo` (`id_grupo`, `designacao`) VALUES ('$idGrupo', '$nomeGr'); ";

                    if (!mysql_query($grupo)) {
                        die('Error: ' . mysql_error());
                        ?> <script>alert("Nao foi adicionado");</script> 
                        <?php
                    }
                    ?> <script>alert("Adicionado com sucesso!");</script> 
                    <?php
                } else {
                    ?><script>alert('Grupo já se encontra criado!');</script> <?php
                }mysql_close($ligacao);
            }
            ?>
            <div class="registar">
                <p><h4 class="paragrafo">WELCOME FIFA!</h4></p>
            <p><h2 class="paragrafo">Criar Grupos</h2></p>
        <form action="" method="post">
            <label>idGrupo<br></label><select name="idGrupo"><option name="a" value= "A" >A</option> <option name="b" value="B" >B</option><option name="c" value="C">C</option><option name="d" value= "D" >D</option> 
                <option name="e" value="E" >E</option><option name="f" value="F">F</option><option name="g" value= "G" >G</option> <option name="h" value="H" >H</option></select><br/>
            <label >Nome Grupo</label><br/><input id="nome"type="text" name="nomeGr" value=""/><br/>



            <br/>


            <input type="submit" name="confirmar"  value="Confirmar"/><br/>
            <input type="reset" value="Limpar"><br/>
            <a href="index.php">Pagina Principal</a>
      </div>
    </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>

    <?php
} else {
    echo redirect('login.php');
}?>
