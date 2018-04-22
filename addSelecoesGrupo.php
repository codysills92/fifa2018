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
     <?php include 'menu.php';  if (quemPode()==0){  ?>;
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
      <?php include_once './menuVerticalManipular.php';?>
        <h1>Manipular Selecoes</h1>
       <?php if(isset($_POST['selecao1']) && (isset($_POST['grupos']))){
               $selecao = $_POST['selecao1'];
               $grupo = $_POST['grupos'];
           $sql = "UPDATE `wc_bd`.` selecao` SET `id_grupo` = '$grupo', `progresso` = '$grupo' WHERE ` selecao`.`id_selecao` = '$selecao'";
               $ligacao = ligar_base_dados();
           mysql_query($sql,$ligacao);
               mysql_close($ligacao);
               
                 } ?>
            <form  method="post">
            <label>Selecoes criadas:</label> 
            <select id="id_selecao" name='selecao1'>
            <?php 
            $selecao = listar_selecao2();
            while ($row = mysql_fetch_array($selecao)) {
            ?>    
                <option name="<?= $row['id_selecao']?>" value="<?= $row['id_selecao']?>"> <?=$row['nome'] ?></option>
            <?php
            }
            ?>
            </select>
            
            <label>Grupo criados:</label>
            <select id="id_grupo" name='grupos'>
            <?php
            $grupo = listar_grupos();
            while ($row = mysql_fetch_array($grupo)) {
            ?>
                <option value="<?=$row['id_grupo']?>"> <?=$row['designacao']?></option>
            <?php    
            }
            ?>
            </select><br/> 
            <input type="submit" name="adicionar" class="iniciar" value="Adicionar"/><br/>
            </p>
          
            </form>
            <hr>
             <?php if((isset($_POST['selecao'])) && ((isset($_POST['fase'])))){
               $selecao1 = $_POST['selecao'];
               $progresso = $_POST['fase'];
               $sql1 =  "UPDATE `wc_bd`.` selecao` SET `progresso` = '$progresso' WHERE ` selecao`.`id_selecao` = '$selecao1'";
               $ligacao = ligar_base_dados();
               mysql_query($sql1,$ligacao);
               mysql_close($ligacao);
               
                 } ?>
           
            <form method="post"> 
                
                
                
                <h4 align='center'> Adicionar Selecoes a  novas fases</h4>
                <label>Seleçoes criadas:</label> 
                <select id="id_selecao" name="selecao">
            <?php 
            $selecao1 = listar_selecao2();
            while ($row = mysql_fetch_array($selecao1)) {
            ?>    
                 <option name="<?= $row['id_selecao']?>" value="<?= $row['id_selecao']?>"> <?=$row['nome'] ?></option>
            <?php
            }
            ?>
            </select>
            
                <label>Fase Eliminatoria:</label>
                <select name='fase'>
                    <option value="oitavosFinal">Oitavos-de-Final</option>
                    <option value="quartosFinal">Quartos-de-Final</option>
                    <option value="semiFinal">Meias-de-Final</option>
                    <option value="final">Final</option>
                </select><br/>
                    <input type="submit" name="adiciona" class="iniciar" value="Progredir"/><br/>
            </form>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div> 
 <?php }else{
     redirect("index.php");
       } ?>
</body>
</html>

