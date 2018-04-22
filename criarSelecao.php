<!DOCTYPE HTML>
<html>

<head>
  <title>Criar Selecao</title>
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
        <h1>Criar Selecoes</h1>
        <?php
            if ((isset($_POST['nomeS'])) && (isset($_POST['nomeR'])) && (isset($_POST['idS'])) && isset($_POST['email'])) {
                $ligacao = ligar_base_dados();
                $nomeR = $_POST['nomeR'];
                $idS = $_POST['idS'];
                $nomeS = $_POST['nomeS'];
                $email = $_POST['email'];
                $codAcesso = gerarPassword(4);
                $encripta = md5($codAcesso);
                 $assunto = "Registo com sucesso";
                
                $mensagem = "Bem vindo a plataforma Russia 2018, Introduza este codigo para aceder a sua conta: $codAcesso, e introduza o seu username:$nomeR";
                       
                $util = "INSERT INTO `wc_bd`.`delegado_pais` (`username`, `nome`, `selecao`, `email`, `sexo`, `nr_acessos`, `password`, `nivel_acesso`, `endereco`, `data_nascimento`) "
                        . "VALUES ('$nomeR', '', '$idS', '$email', '', '', '$encripta', '2', '', '')";
                mysql_query($util, $ligacao);
                $sql="INSERT INTO `wc_bd`.`utilizador` (`username`, `nivel_acesso`, `nome`, `password`, `email`, `sexo`, `data_nascimento`, `endereco`) 
                        VALUES ('$nomeR', '2',  '$email', '$encripta', '', '','','')";
                mysql_query($sql,$ligacao);

                $selecao = "INSERT INTO `wc_bd`.` selecao` (`id_selecao`, `vitorias`, `nome`, `user_responsavel`, `pontos`, `id_grupo`, `progresso`, `golosMarcado`, `golosSofridos`, `empates`, `derrotas`, `totalGolosMarcados`, `totalGolosSofridos`)
                          VALUES ('$idS', '', '$nomeS', '$nomeR', '', NULL, '', '', '', '', '', '', '')";

                if (!mysql_query($selecao)) {
                    die('Error: ' . mysql_error());
                    ?> <script>alert("Nao foi adicionado");</script> 
                    <?php
                }
                ?> <script>alert("Adicionado com sucesso!");</script> 
                <?php
            MailLogin($email, $mensagem, $assunto);
            }
            ?>

            <p>
            <div id="selecao">
                <p><h4 class="paragrafo">WELCOME FIFA!</h4></p>
            <p><h5 class="paragrafo">Registar Seleção:</h5></p>
        <form action="" method="post">
            <label >Pais:</label><br/><input type="text"  name="idS" value=""/><br/>
            <label>Nome:</label><br/><input type="text" name="nomeS" value=""/><br/>  
            <label >Responsavel Username:</label><br/><input  type="text" name="nomeR" value=""/><br/>
            <label >Email:</label><br/><input id="emaill" type="email" name="email" value=""/><br/>
            <br/>
            <input type="submit" name="confirmar"  value="Confirmar"/><br/>
            <input type="reset" value="Limpar">

            </div>

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
<?php } else {
    echo redirect('login.php');
}
