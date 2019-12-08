
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
  $username = $_SESSION['username'];
             if(quemPode()== 1){
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
        if (isset($_POST['morada']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nome']) && isset($_POST['data'])) {
            $endereco = $_POST['morada'];
            $user = $_POST['username'];
            $nome = $_POST['nome'];
            $mailing = $_POST['email'];
            $data = $_POST['data'];
            $pass1 = $_POST['password'];

            $pass2 = md5($pass1);

            $sq = mysqli_query("SELECT password FROM utilizador WHERE `username` = '$username' ");
            while ($dad = mysqli_fetch_array($sq)) {
                $pas = $dad['password'];
            }
            if (empty($pass2)) {
                $sqw = "UPDATE `utilizador` SET username='$username',endereco = '$endereco',nome='$nome',data_nascimento='$data', email = '$mailing' WHERE `username` = '$username' ";
                if (!mysqli_query($sqw)) {
                    die('Error: ' . mysqli_error());
                    ?> <script> alert("Alteração sem sucesso!");</script> <?php }
                ?> <script>alert("Alteração com sucesso!");</script>

                <?php
            }
            if ($pas != $pass2) {

                $sqw = "UPDATE `utilizador` SET username='$username',endereco = '$endereco',nome='$nome',data_nascimento='$data', email = '$mailing', password = '$pass2' WHERE `username` = '$username' ";


                if (!mysqli_query($sqw)) {
                    die('Error: ' . mysqli_error());
                    ?> <script> alert("Alteração sem sucesso!");</script> <?php }
                ?> <script>alert("Alteração com sucesso!");</script> 
                <?php
            } else {
                ?> <script> alert("Introduza uma password diferente!");</script> <?php
            }
        }
        ?>



        <?php
        $query = mysqli_query("SELECT * FROM utilizador WHERE username='$username'");
        while ($w = mysqli_fetch_array($query)) {
            $nombre = $w['nome'];
            $unombre = $w['username'];
            $mail = $w['email'];
            $adress = $w['endereco'];
            $pss = $w['password'];
            $sex = $w['sexo'];
            $nasc = $w['data_nascimento'];
            $nivel = $w['nivel_acesso'];
        }
        ?>
        <br>
        <br>
        <div id="see">
            <p><h4 class="p">FIFA WC 2018</h4></p>
        <p><h5 class="p">PERSONAL DATA</h5></p>
    <form name="pagina_pessoal" method="post" vertical-align="center" >
        <pre>
        <label>Nome:</label><br/><input type="text" name="nome" value="<?php echo $nombre; ?>"  />
        <label>Username:</label><br/><input type="text" name="username" value="<?php echo $unombre; ?>"   />                                      
        <label>Endereco:</label><br/><input type="text" name="morada" value="<?php echo $adress; ?>"/> 
        <label>Email:</label><br/><input type="email" name="email" value="<?php echo $mail; ?>"/>  
        <label>Sexo: </label><br/><input type="text" value="<?= $sex ?>" disabled ="disabled"/>
       
        <label>Acess Level: <strong><?php
            if ($nivel == 1) {
                echo "Local Organising Committe";
            } else {
                if ($nivel == 2) {
                    echo "Country Delegate";
                } else {
                    if ($nivel == 0) {
                        echo "Administrador";
                    }
                }
            }
            ?></strong></label><br/>
             <label>Data nascimento:<strong><input type="date" name="data" value="<?php echo $nasc ?>"/></strong><br/></label>
    <label>Password:</label><br/><input type="text" name="password" value=""/> <br/>
    <input type="submit" name="Enviar" value="Guardar"/> <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
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
        <?php }else{
     redirect('index.php');
        }
?>