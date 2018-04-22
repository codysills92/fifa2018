<!DOCTYPE HTML>
<html>

<head>
  <title>HOME</title>
 <meta charset="UTF-8">
 <script type="text/javascript" src="funcoes_e_bd/funcoes.js"></script>
   
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
  
        



        $username = "";
        $password = "";

      

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $dados = valida_utilizador($username, $password);
           

            if ($dados) {
      

                $_SESSION['username'] = $dados['username'];
                $_SESSION['nome'] = $dados['nome'];
                $_SESSION['nivel_acesso'] = $dados['nivel_acesso'];
                $_SESSION['password'] = $dados['password'];
                $_SESSION['nr_acessos'] = $dados['nr_acessos'];
                $_SESSION['nivel_acesso'] = $dados['nivel_acesso'];
                $_SESSION['password'] = $dados['password'];
                $_SESSION['nr_acessos'] = $dados['nr_acessos'];
                
              if(verifica_Primeiro_Acesso() == true){
                  
                  redirect('loginfirstT.php');
              }
              
              else{
                   redirect('index.php');
                   
               }
            }
                
            else  {
                   
                    ?>
                        <script>alert("Certifique-se que inseriu corretamente os seus dados de acesso");</script> 
                      <?php    }
        }
        
        
            
            
        
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
      
        <h1>Login</h1>
       <form action="" method="post">
           <p><h5> <label for="nome">Nome Usuario:</label></h5></p><input id="nome" type="text" name="username" value="" /><br/>
       <p><h5> <label for="password">Password:</label></h5></p><input id="password" type="password" name="password" value=""/><br/>


                <p> <input type="reset" name="Limpar" value="Apagar dados"/>  
                    <input type="submit" name="Iniciar sessão" class="iniciar" value="Iniciar Sessao"/><br/>
                   
                    <a href="index.php">Pagina Principal</a>
                <p>Se te Esqueceste da tua palavra pass <a href="recuperaPass.php">clica aqui</a></p>
                </p>

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
