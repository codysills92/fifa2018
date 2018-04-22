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
 
        include_once './menu.php';
   $result = ordenar_pergunta();
        

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
      <div> <form name="form1" method="post" action="criartopico.php"> 
                <table  class="tabela">
                    <pre>
                    <tr>
                        <td ><strong>#</strong></td>
                        <td ><strong>Topico</strong></td><br/>
                        <td ><strong>Views</strong></td><br/>
                        
                        <td ><strong>Respostas</strong></td><br/>
                        
                        <td ><strong>Data/Hora</strong></td><br/>
                    </tr>

                    <?php
                    while ($rows = mysql_fetch_array($result)) {
                        ?>

                        <tr>
                            <td ><?php echo $rows['id'] ?></td>
                            <td><a href="vertopico.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topico']; ?></a><BR></td>
                            <td ><?php echo $rows['view']; ?></td>
                            <td><?php echo $rows['reply']; ?></td>
                            <td ><?php echo $rows['data_h']; ?></td>
                        </tr>

                        <?php
                    }
                
                    ?>

                    <tr>
                        <td><input type="submit" name="Submit" value="Criar Topico"> </td>
                       
                    </tr>
                    </pre>
                </table>
            </form>
      </div>
      </div>
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
