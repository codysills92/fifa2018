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
  
        

$nomec = $_GET['id_procura'];
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
        if (isset($_POST['morada']) && isset($_POST['email']) && isset($_POST['nivelacesso'])&& isset($_POST['nome'])) {
            $nome=$_POST['nome'];
            $morada = $_POST['morada'];
            $mail = $_POST['email'];
            $acess = $_POST['nivelacesso'];


            $sqw = "UPDATE `utilizador` SET endereco = '$morada', email = '$mail',nivel_acesso ='$acess', nome='$nome' WHERE username = '$nomec'";


            if (!mysql_query($sqw)) {
                die('Error: ' . mysql_error());
            }
            ?> <script> alert("Efetuada com sucesso!");</script> <?php
        }
        ?>
        <?php
        $query = mysql_query("SELECT * FROM utilizador WHERE username = '$nomec'");

        while ($dados = mysql_fetch_array($query)) {
            $nombre = $dados['nome'];
            $unombre = $dados['username'];
            $morada = $dados['endereco'];
            $acess = $dados['nivel_acesso'];
            $email = $dados['email'];
            $sexo = $dados['sexo'];
        }
        ?>
        <br>
        <br>
        <br>
        <div id="editar">
            <form action="" method="post">
                <pre>                               
        <label>Nome:</label><br/><input type="text" name="nome" value="<?php echo $nombre; ?>"  />
        <label>Username:</label><br/><input type="text" name="username" value="<?php echo $unombre; ?>" disabled="disabled" />                                      
        <label>Endereco:</label><br/><input type="text" name="morada" value="<?php echo $morada; ?>"/> 
        <label>Email:</label><br/><input type="email" name="email" value="<?php echo $email; ?>"/>  
        <label>Sexo: </label><br/><input type="text" value="<?= $sexo ?>"/><br><input type="radio" name="sexo"
                <?php if (isset($sexo) && $sexo == "feminino") echo "checked"; ?>
                                value="feminino">Mulher
               <br> <input type="radio" name="sexo"
                <?php if (isset($sexo) && $sexo == "masculino") echo "checked"; ?>
                       value="masculino">Homem<br/>
        <label>Nivel acesso:</label><br/>      <?php
                    if ($acess == 1) {
                        echo "Local Country Comite";
                    } else {
                        if ($acess == 2) {
                            echo "Country delegate";
                        } else {
                            if ($acess == 0) {
                                echo "Admin";
                            }
                        }
                    }
                    ?> <select name="nivelacesso"><option name="1" value='1' >LOC</option> <option name="2" value=2 >CD</option><option name="0" value=0 >ADMIN</option></select> 

<input type="submit" name="submit" value="Gravar"/> <input name="Cancelar" type="reset" value="Cancelar">  <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
                </pre>
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
