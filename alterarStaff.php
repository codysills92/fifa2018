<?php $id=$_GET['id'];
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
     <?php
 
        include_once './menu.php';
        if(quemPode()===2){
  
      if ((isset($_POST['nomeS'])) && (isset($_POST['data']))  && (isset($_POST['f'])) && (isset($_POST['tpS']))){ 
        $nomeS=$_POST['nomeS'];
        $sexo=$_POST['sexo'];
        $data=$_POST['data'];
        $funcao=$_POST['f'];
        $tpS=$_POST['tpS'];

                $staff = "UPDATE `wc_bd`.`staff/eqtecnica` SET  `nome`='$nomeS', `sexo`='$sexo', `data_nasc`='$data',`funcao`='$funcao',`g_sanguineo`='$tpS' WHERE `id_staff`='$id'";
                if (!mysql_query($staff)) {
                    die('Error: ' . mysql_error());
                    ?> <script>alert("Não foram alterado as informações");</script> 
                    <?php
                }
                ?> <script>alert("Alterado com sucesso!");</script> 
                <?php
            }
            ?>
<?php
            $query = mysql_query("SELECT * FROM `staff/eqtecnica` WHERE `id_staff` = '$id'");

            while ($dados = mysql_fetch_array($query)) {
                $nombre = $dados['nome'];
                $equipa=$dados['id_selecao'];
           
            }
            ?>
        
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Noticias</h3>
        
         <?php 
                    include './feeds.php';
                    ?>

      </div>
      <div id="content">
      
        <div>
            <h2>Aterar dados Staff:</h2>
            <form action="" method="post">

                <label>Seleção:</label><?php echo $equipa; ?><br/>
                <label>Nome:</label><br/><input type="text" name="nomeS" value="<?php echo $nombre; ?>"/><br/> 
                <label >Sexo:<input type="radio" name="sexo"
                    <?php if (isset($sexo) && $sexo == "feminino") echo "checked"; ?>
                                    value="Feminino">Mulher
                    <input type="radio" name="sexo"
                    <?php if (isset($sexo) && $sexo == "Masculino") echo "checked"; ?>
                           value="masculino">Homem<br/>
                    <label >Data Nascimento:</label><br/><input  type="date" name="data" value="" /><br/>
                    <label>Função:<br></label><select name="f"><option  value= "Fisioterapeuta" >Fisioterapeuta</option> <option value="Preparador Fisico" >Preparador Fisico</option><option  value="Treinador Adjunto">Treinador Adjunto</option></select><br/>
                    <label>Tipo sanguineo:</label><br><select name="tpS"><option value="A">A</option><option value="B">B</option><option value="O">O</option><option value="AB">AB</option></select><br/>

                    <input type="submit" name="confirmar"  value="Confirmar"/><br/>
                    <input type="reset" value="Limpar">    <input type="button" value="Voltar" onClick="JavaScript: window.history.back();"> 
                    </form>
                    </div>
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
