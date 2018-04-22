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
     <?php include_once 'menu.php';
    
    if (quemPode() === 2) {
              $id = $_GET['ids'];
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
         <?php
            if ((isset($_POST['nomeJ'])) && (isset($_POST['data'])) && (isset($_POST['nrC'])) && (isset($_POST['peso'])) && (isset($_POST['altura'])) && (isset($_POST['tpS'])) && (isset($_POST['inter']))) {
                $nomeJ = $_POST['nomeJ'];
                $data = $_POST['data'];

                $nrC = $_POST['nrC'];
                $pes = $_POST['peso'];
                $alt = $_POST['altura'];
                $s = $_POST['tpS'];
                $it = $_POST['inter'];

                $jogador = "INSERT INTO `wc_bd`.`jogador` (`id_jogador`, `nrGolos`, `id_selecao`, `data`, `nome`, `num_camisola`, `peso`, `altura`, `g_sanguineo`, `internacionalizacao`, `c_amarelo`, `c_vermelho`) "
                        . "VALUES ('', '', '$id', '$data', '$nomeJ', '$nrC', '$pes', '$alt', '$s', '$it', '', '')";
                if (!mysql_query($jogador)) {
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
            <p><h5 class="paragrafo">Registar o jogador:</h5></p>
        <form  method="post">

            <label>Seleção:</label><br/><?php echo $id ?><br/>
            <label>Nome:</label><br/><input type="text" name="nomeJ" value=""/><br/>  
            <label >Data Nascimento:</label><br/><input  type="date" name="data" value="" /><br/>
            <label>Número de Camisolas<br></label><input name='nrC' type='number'min="1" max="23"/><br/>

            <label>Peso:</label><br><input type="number" min="50"  max="150" name="peso" value=""/><br/>
            <label>Altura:</label><br><input type="number" name="altura" value=""/><br/>
            <label>Tipo sanguineo:</label><br><select name="tpS"><option value="A">A</option><option value="B">B</option><option value="O">O</option><option value="AB">AB</option></select><br/>
            <label>Internacionalização:</label><br><input type="number" name="inter"value=""/><br/>
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
    <?php
} else {
    echo redirect('login.php');
}
?>  
</body>
</html>

