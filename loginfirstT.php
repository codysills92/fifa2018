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
        include_once  'menu.php';

       
        $username = $_SESSION['username'];
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
      
        <h1>Muda a tua password:</h1>
        <?php
        if (isset($_POST['submit']) && (isset($_POST['password']))&&(isset($_POST['password2']))) {
         
            $password1 = $_POST['password'];
            $password=$_POST['password2'];
            if($password==$password1){
            $password2 = md5($password1);
            $nrAcesso = 1;
            
            $sqlx = "UPDATE  utilizador SET password = '$password2', nr_acessos = '$nrAcesso' WHERE username = '$username' ";
            $sqlx2 = "UPDATE  delegado_pais SET password = '$password2', nr_acessos = '$nrAcesso' WHERE username = '$username' ";
            $ligacao = ligar_base_dados();
            if (mysql_query($sqlx, $ligacao)) {
                ?><script> confirm('Alteração Efetuada Com sucesso!');
                    window.location="index.php";
                </script>
              
        <?php
    } else {


        if (mysql_query($sqlx2, $ligacao)) {
            ?><script> confirm('Alteração Efetuada Com sucesso!');
                
                    </script>
                    
                    <?php
                } else {
                    ?>  <script> alert('Não conseguimos proceder a alteraçao da sua password contacte o Administrador do sistema');</script> <?php
                }
            }
        }else{
            ?><script>alert('Introduza Password diferente!')</script><?php
        }}
        ?>

        <br /><br /><br /><br />
     
    
        <form method="POST">
            <pre>  
<label>Password:</label>                  <input type="password" name="password"/><br>      
<label>Confirmar Password:</label>         <input type="password" name="password2"/><br>  				
  <input type="submit" value="Alterar" name="submit"/>   <input type="reset" value="Limpar">
<a href="logout.php">Pagina Principal</a>
            </pre>
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
