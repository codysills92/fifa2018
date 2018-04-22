<!DOCTYPE HTML>
<html>

<head>
  <title>estadio</title>
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
          <?php if(quemPode()==0){
           include_once './menuVerticalListas.php';    
          }
          else{      include_once './menuVerticalEstatisticas.php';        }
      ?>
        <h1>Estadios</h1>
     <br>
        <br>
        <br>
      
            <pre>
        <table  align="center">
         

                    <?php

                

                    $final = listar_estadio();
                    echo "<center><table width=500 align=center>";

                    echo "<td>Nome:</td>";
                  
                    echo "<td>Local:</td>";
                    echo "<td>Capacidade:</td>";



                    while ($row = mysql_fetch_array($final)) {
                        echo "<tr>";
                        echo "<td>" . $row['nome'] . "</td>";
                     
                        echo "<td>" . $row['localizacao'] . "</td>";
                        echo "<td>" . $row['capacidade'] . "</td>";
                        ?>
                    <td><a href="alterar_estadio.php?id_procura=<?php echo $row['id_estadio']; ?>" /><img src="estadio.jpg" alt="Editar" width="25px" height="25px"/></td><td><a href="remover_estadio.php?id_procura=<?php echo $row['id_estadio']; ?>"><img src="delete.jpg" alt="eliminar" width="25px" height="25px"/></a></td> <?php
                    } echo "</table></center>";
                    ?>
             <input type="button" value="Voltar" onClick="parent.location='index.php?'">    

      </table>
            </pre>
        
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
