<!DOCTYPE HTML>
<html>

<head>
  <title>Registo</title>
   <meta charset="UTF-8">
  <?php
 include_once './funcaoSeguranca.php';
  ?>
       
            <title>FIFA_WC_2018_NOVA CONTA</title>
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
     <?php include 'menu.php';
                     if (quemPode() !==0) {
            redirect('index.php');
        } else {
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
      
        <h1>Registo</h1>
         <?php
            if ((isset($_POST['username'])) && (isset($_POST['nascimento'])) && (isset($_POST['sexo'])) && (isset($_POST['id_perfil'])) && (isset($_POST['email'])) && (isset($_POST['endereco']))) {
                $password = gerarPassword(4);
                $username = $_POST['username'];
                $sexo=$_POST['sexo'];
                $nascimento = $_POST['nascimento'];
                $encripta = md5($password);
                $endereco = $_POST['endereco'];
                $email = $_POST['email'];
                $perfil = $_POST['id_perfil'];
                $ligacao = ligar_base_dados();
                $sql = mysql_query("SELECT * FROM utilizador WHERE username='$username'", $ligacao);
                $assunto = "Registo com sucesso";
                
                $mensagem = "Bem vindo a plataforma Russia 2018, Introduza este codigo para aceder a sua conta: $password, e introduza o seu username:$username";
                       
                if ((mysql_num_rows($sql)) == 0) {
                    





                        $util = "INSERT INTO `wc_bd`.`utilizador` (`username`, `nivel_acesso`, `nome`, `password`, `email`, `sexo`, `data_nascimento`, `endereco`) VALUES ('$username', '$perfil', '', '$encripta', '$email', '$sexo', '$nascimento', '$endereco')";
                        $nome='TEAM PW';
                        MailLogin($nome,$email,$mensagem,$assunto);
                        if (!mysql_query($util)) {
                            die('Error: ' . mysql_error());
                        }
                        ?> <script>alert("Adicionado com sucesso!");</script> 
                    <?php } 
                 else {
                    ?><script>alert("Este utilizador já se encontra registado!");</script><?php
                }mysql_close($ligacao);
            }
            ?>

                <p><h4 class="paragrafo">WELCOME FIFA!</h4></p>
            <p><h5 class="paragrafo">Registe-se:</h5></p>
        <form action="" method="post">
            <label>Perfil:<br></label><select name="id_perfil"><option name="0" value= "0" >Administrador</option> <option name="1" value="1" >Comite da organização local</option></select><br/>
            <label >USERNAME:</label><br/><input id="nome"type="text" name="username" value=""/><br/>
            <label >Email:</label><br/><input type="email" class="email" name="email" value=""/><br/>
            <label for="endereco">Endereco:</label><br/><input type="text"  name="endereco" value=""/><br/>
            <label >Sexo:<input type="radio" name="sexo"
    <?php if (isset($sexo) && $sexo == "feminino") echo "checked"; ?>
                                value="feminino">Mulher
                <input type="radio" name="sexo"
    <?php if (isset($sexo) && $sexo == "masculino") echo "checked"; ?>
                       value="masculino">Homem<br/>
                <label for="dataNascimento">Data de Nascimento:</label><br/><input type="date"  name="nascimento" value=""/><br/>

                <br/>

                <br/>
                <input type="submit" name="confirmar"  value="Confirmar"/><br/>
                <input type="reset" value="Limpar"><br/>
                <a href="index.php">Pagina Principal</a>
              
                </p>
                </body>


            <?php }
            ?>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
