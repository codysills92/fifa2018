<!DOCTYPE html>
<html>
    <head>	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
           <link rel="stylesheet" type="text/css" href="css.css" media="screen" />

        ?>
    </head>
    
    </body>
</html>


<!DOCTYPE HTML>
<html>

<head>
  <title>HOME</title>

  <meta name="keywords" content="website keywords, website keywords" />

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
       <body align="center"> 
        <br>
        <br>
        <br>
        <div >
        <table  align="center">
            <h2 align="center">Contas de Utilizadores:</h2>

            <?php
            $result = mysql_query("select * from utilizador where `nivel_acesso` = 0  OR `nivel_acesso`= 2");
            echo "<center><table width=400 align=center>";

            echo "<td>Nome:</td>";
            echo "<td>ID:</td>";
       

            while ($row = mysql_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                
                ?>
            <td><a href="editar_utilizador.php?id_procura=<?php echo $row['username']; ?>" /><img src="editar.jpg" alt="Editar" width="25px" height="25px"/></td><td><a href="visualizar_utilizador.php?id_procura=<?php echo $row['username'] ?>"/><img src="see.jpg" alt="Visualizar" width="25px" height="25px"/> </td><td><a href="remover_utilizador.php?id_procura=<?php echo $row['username'];?>"><img src="eliminar.jpg" alt="Bloquear" width="25px" height="25px"/></a></td> <?php
            } echo "</table></center>";
            
            ?>
                                         <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">                                                                                                                                                                
      </table>
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
     <?php } else {
            redirect('login.php');
}
