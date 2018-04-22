<!DOCTYPE HTML>
<html>

<head>
  <title>HOME</title>
 
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
        include 'menu.php';
        
        $id = $_SESSION['username'];
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
          
     <?php if(quemPode()==0){
           include_once './menuVerticalListas.php';    
          }
          if(quemPode()==3){
              include_once './menuVerticalEstatisticas.php';   
          }
          ?>
         <br>
        <br>
        <br>
        <pre>
            <div class="table">
                
            <table  align="center">
            <?php      if(quemPode()==2){
             echo ' <h2> Sua selecao </h2>'; ?>
       <?php   } else{
       echo  ' <h2 align="center">Seleções:</h2> '; }?>
     <center>
                        <table  align=center >
                  
                        <td>Nome:</td>
                       <td>ID:</td>
                        <td>Responsavel:</td>
                        <td>Pontos:</td>
                        <td>Grupo:</td>

                            <?php
                            $result = listar_selecao($id);

                            while ($row = mysql_fetch_array($result)) {
                                ?> <tr>
                                                     <td><?php echo $row['nome']; ?></td>
                                                    <td><?php echo $row['id_selecao']; ?></td>
                                                    <td><?php echo $row['user_responsavel']; ?></td>
                                                   <td><?php echo $row['pontos']; ?></td>
                                                    <td><?php echo $row['id_grupo']; ?></td>
                                            
                                 
                                        <td><a href="criarJogador.php?ids=<?php echo $row['id_selecao'] ?>"><img src="player.jpg" alt="jogador" ></a> </td>
                                        <td><a href="criarStaff.php?ids=<?php echo $row['id_selecao'] ?>"><img src="STAFF.jpg" alt="staff" ></a></td>
                                        <td><a href="suaEquipa.php?ids=<?php echo $row['id_selecao'] ?>"><img src="team.jpg" alt="equipa" ></a></td>
                            <?php } ?>
     </table></center>
                        
                                                                                                                                                                                                          
          </table>
             
            </div>
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
