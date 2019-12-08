<!DOCTYPE HTML>
<html>

<head>
  <title>Recupera Password</title>
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
     <?php include 'menu.php' ?>;
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
      
        <h1>Recperar Palavra de Acesso:</h1>
   
            <p>Escreve aqui o teu email e o teu username,sera te enviado uma chave de acesso a tua conta:</p>
            <form action="" method="post">
                <p> <label for="nome">Username:</label></p><input id="email" type="text"name="username" value=""/><br/>
                <p><label for="nome">Email:</label></p><input id="email" type="email"name="email" value=""/><br/>
              <p> <input type="reset" name="Limpar" value="Apagar dados"/>  
                    <input type="submit" name="submite" class="iniciar" value='Completar Pedido'/><br/>
                   
                  
                <p>
                   
                    <a href="index.php">Pagina Principal</a>
               
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
        if(isset($_POST['email']) && (isset($_POST['username']))){
           $email = $_POST['email'];
           $username = $_POST['username'];
            $ligacao = ligar_base_dados();
    
    
    $query = "SELECT * FROM `utilizador` WHERE `username` = '$username' AND `email` = '$email'";
    $result = mysqli_query($ligacao,$query);
    mysqli_close($ligacao);
    if(mysqli_num_rows($result)==0){
        ?> <script>alert("Lamentamos mas este utilizador nao consta na nossa base dados se considera que é um erro nosso por favor contacte suportefifa2018@gmail.com")</script>
    <?php }
    else{
   $pass1 =  gerarPassword(4);
   $encripta = md5($pass1);
    $ligacao = ligar_base_dados();
    $query1 = ("UPDATE `wc_bd`.`utilizador` SET `password` = '$encripta',`nr_acessos`= '0' WHERE `utilizador`.`username` = '$username';");
    $resultado = mysqli_query($query1, $ligacao);
    mysqli_close($ligacao);
    $subject= 'Recuperar conta';
    $message ="$username, Recebemos um pedido para aceder a sua conta, o seu codigo de acesso é = $pass1";
    $nome = "TEAM PW";
    MailLogin($nome,$email, $message, $subject);
    
                    ?>
                        <script>alert("O seu pedido foi efetuado com sucesso, sera-lhe enviado um email para aceder a sua conta");</script> 
                      <?php
        }

        }

        ?>