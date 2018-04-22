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
        
        $id = $_GET['ids'];
        if(quemPode()==2){
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
      <div >

            <?php
            $equipa = listar_player($id);
            while ($row = mysql_fetch_array($equipa)) {
                ?>


            <ul  class="listar"style="list-style-type:none">
                <h2>  <li >Jogador</li></h2><br/>
                    <li>Nome:<?php echo $row['nome']; ?></li>
                    <li>Seleção:<?php echo $id; ?></li>
                    <li>Números Camisola:<?php echo $row['num_camisola']; ?></li>
                    <li>Número de Golos:<?php echo $row['nrGolos']; ?> </li>
                    <li>Cartões Amarelos:<?php echo $row['c_amarelo']; ?></li>
                    <li>Cartões Vermelhos:<?php echo $row['c_vermelho']; ?></li>
                    <li>Peso:<?php echo $row['peso']; ?></li>
                    <li>Idade:<?php
                        $nascimento = new DateTime($row['data']);
                        $hoje = new DateTime('today');
                        echo $nascimento->diff($hoje)->y;
                        ?></li>
                    <li>Altura:<?php echo $row['altura']; ?></li>
                    <li>Internacionalização:<?php echo $row['internacionalizacao']; ?></li>
                    <li>Tipo Sanguineo:<?php echo $row['g_sanguineo'] ?></li>
                    <li><form method="get"><input type="button" onClick="parent.location = 'alterarJogador.php?id=<?php echo $row['id_jogador']; ?>'" value="Alterar Dados"></form></li>
                    <li><form method="post"><input type="submit" name='remover' value="Remover"></form> </li>
                    <?php
                    $j = $row['id_jogador'];
                    if (isset($_POST['remover'])) {

                        remover_jogador($j);
                    }
                    ?>
                </ul>

                <bR/>
            </div>
            <div>
            <?php } ?>
            <div >

                <?php
                $staff = listar_staff($id);
                while ($row = mysql_fetch_array($staff)) {
                    ?>

                    <ul class="listar"style="list-style-type:none">
                        <li>Staff</li>
                        <li>Nome:   <?php echo $row['nome']; ?>        </li>
                        <li>Função:<?php echo $row['funcao']; ?></li>
                        <li>Idade:<?php
                            $nascimento = new DateTime($row['data_nasc']);
                            $hoje = new DateTime('today');
                            echo $nascimento->diff($hoje)->y;
                            ?></li>
                        <li>Tipo Sanguineo:<?php echo$row['g_sanguineo']; ?></li>
                        <li>Seleção: <?php echo $id; ?></li>
                        <li>Sexo:<?php echo $row['sexo']; ?>         </li>
                        <li><form method="get"><input type="button" onClick="parent.location = 'alterarStaff.php?id=<?php echo $row['id_staff']; ?>'" value="Alterar Dados"></form>

                        <li><form method="post"><input type="submit" name='remover' value="Remover"></form> </li>
                        <?php
                        $s = $row['id_staff'];
                        if (isset($_POST['remover'])) {

                            remover_staff($s);
                        }
                        ?>

                    </ul>




       
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
        }else{
            redirect('listarSelecoes.php');
        }
                ?>