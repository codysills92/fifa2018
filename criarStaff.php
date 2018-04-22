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
      

        require_once './menu.php';
        if (quemPode() === 2) {
              $id = $_GET['ids'];
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
            if ((isset($_POST['nomeS'])) && (isset($_POST['data']))  && (isset($_POST['sexo'])) && (isset($_POST['f'])) && (isset($_POST['tpS']))) {
                $nome = $_POST['nomeS'];
                $nasc = $_POST['data'];
              
                $s = $_POST['tpS'];
                $f = $_POST['f'];
                $sexo = $_POST['sexo'];
                $selecao = "INSERT INTO `wc_bd`.`staff/eqtecnica` (`id_staff`, `nome`, `sexo`,`data_nasc`,`id_selecao`,`g_sanguineo`,`funcao`) VALUES ('', '$nome','$sexo', '$nasc', '$id', '$s','$f')";

                if (!mysql_query($selecao)) {
                    die('Error: ' . mysql_error());
                    ?> <script>alert("Nao foi adicionado");</script> 
                    <?php
                }
                ?> <script>alert("Adicionado com sucesso!");</script> 
                <?php
            }
            ?>
            <p>
            <div id="jogador">
                <p><h4 class="paragrafo">WELCOME FIFA!</h4></p>
            <p><h5 class="paragrafo">Registar Staff/Equipa Técnica:</h5></p>
        <form action="" method="post">
     
            <label>Seleção:</label><?php echo $id ?><br/>
            <label>Nome:</label><br/><input type="text" name="nomeS" value=""/><br/> 
            <label >Sexo:<input type="radio" name="sexo"
                <?php if (isset($sexo) && $sexo == "feminino") echo "checked"; ?>
                                value="feminino">Mulher
                <input type="radio" name="sexo"
                <?php if (isset($sexo) && $sexo == "masculino") echo "checked"; ?>
                       value="masculino">Homem<br/>
                <label >Data Nascimento:</label><br/><input  type="date" name="data" value="" /><br/>
                <label>Função:<br></label><select name="f"><option  value= "Fisioterapeuta" >Fisioterapeuta</option> <option value="Preparador Fisico" >Preparador Fisico</option><option  value="Treinador Adjunto">Treinador Adjunto</option><option  value="Treinador ">Treinador</option></select><br/>
                <label>Tipo sanguineo:</label><br><select name="tpS"><option value="A">A</option><option value="B">B</option><option value="O">O</option><option value="AB">AB</option></select><br/>

                <input type="submit" name="confirmar"  value="Confirmar"/><br/>
                <input type="reset" value="Limpar">
                </form>
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
                echo redirect('listarSelecoes.php');
            }