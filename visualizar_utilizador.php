
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
 
   
include ('menu.php');
$inx = $_GET['id_procura'];
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
        $query = mysql_query("SELECT * FROM utilizador WHERE username = '$inx'");
        while ($w = mysql_fetch_array($query)) {
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
            <p><h2 class="p">FIFA WC 2018!</h2></p>
        <p><h3 class="p">Pagina Pessoal</h3></p>
    <label>Nome:  <strong><?php echo $nombre ?></strong><br/></label>
    <label>Username: <strong><?php echo $unombre ?></strong><br/></label>
    <label>Email: <strong><?php echo $mail ?></strong><br/></label>
    <label>Endereco: <strong><?php echo $adress ?></strong><br/></label>
    <label>Sexo: <strong><?php echo $sex ?></strong><br/></label>
    <label>Data nascimento: <strong><?php echo $nasc ?></strong><br/></label>
    <label>Acess Level: <strong><?php
         
                if ($nivel == 2) {
                    echo "Country Delegate";
                } else {
                    if ($nivel == 0) {
                        echo "Administrador";
                    }
                }
            
            ?></strong></label><br/>
    <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">








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
