<?php 
 $id=$_GET['id'];
?>
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
          <h2>Alterar Jogador</h2>
            <?php
                  if ((isset($_POST['nomeJ'])) && (isset($_POST['data']))  && (isset($_POST['nrC'])) && (isset($_POST['peso'])) && (isset($_POST['altura'])) && (isset($_POST['tpS'])) && (isset($_POST['inter']))) {
                $nomeJ = $_POST['nomeJ'];
                $nomeR = $_POST['data'];
              
                $nrC = $_POST['nrC'];
                $pes = $_POST['peso'];
                $alt = $_POST['altura'];
                $s = $_POST['tpS'];
                $it = $_POST['inter'];

                $selecao = "UPDATE `wc_bd`.`jogador` SET  `data`='$nomeR', `nome`='$nomeJ', `num_camisola`='$nrC',`peso`='$pes',`altura`='$alt',`g_sanguineo`='$s',`internacionalizacao`='$it' WHERE `id_jogador`='$id'";
                if (!mysql_query($selecao)) {
                    die('Error: ' . mysql_error());
                    ?> <script>alert("Não foram alterado as informações");</script> 
                    <?php
                }
                ?> <script>alert("Alterado com sucesso!");</script> 
                <?php
            }
            ?><?php
            $query = mysql_query("SELECT * FROM jogador WHERE `id_jogador` = '$id'");

            while ($dados = mysql_fetch_array($query)) {
               
                $name = $dados['nome'];
               
                $nr = $dados['num_camisola'];
                $peso=$dados['peso'];
                $altura=$dados['altura'];
                $sangue=$dados['g_sanguineo'];
                $inter=$dados['internacionalizacao'];
                
            }
            ?>
        
      
     <form action="" method="post">

                <label>ID:<?php echo $id;?></label><br/>
                <label>Nome:</label><br/><input type="text" name="nomeJ" value="<?php echo $name;?>"/><br/>  
                <label >Data Nascimento:</label><br/><input  type="date" name="data" value=""/><br/>
                <label>Número de Camisolas<br></label><input type='number'min="1" max="23"  name="nrC"value="<?php echo $nr; ?>"/><br/>
                
                <label>Peso:</label><br><input type="number" min="50"  max="150" name="peso" value="<?php echo $peso; ?>"/><br/>
                <label>Altura:</label><br><input type="number" name="altura" value="<?php echo $altura; ?>"/><br/>
                <label>Tipo sanguineo:</label><br><select name="tpS"><option value="A">A</option><option value="B">B</option><option value="O">O</option><option value="AB">AB</option></select><br/>
                <label>Internacionalização:</label><br><input type="number" name="inter"value="<?php echo $inter; ?>"/><br/>
                <input type="submit" name="confirmar"  value="Confirmar"/><br/>
                <input type="reset" value="Limpar">    <input type="button" value="Voltar" onClick="JavaScript: window.history.back();"> 
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
