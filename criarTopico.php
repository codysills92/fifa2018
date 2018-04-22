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
      
     
            </form>  <form  method="post" action="add_topico.php">
            <table class="table">
                <tr>

                    <td>
                        <table >
                            <tr>
                            <h1><strong>Criar novo Topico</strong> </h1>
                            </tr>
                            <tr>
                                <td width="14%"><strong>Topico</strong></td>
                                <td width="2%">:</td>
                                <td width="84%"><input name="topico" type="text" id="topic" size="50" /></td>
                            </tr>
                            <tr>
                                <td valign="top"><strong>Detalhe</strong></td>
                                <td valign="top">:</td>
                                <td><textarea name="descricao" cols="50" rows="3" id="detail"></textarea></td>
                            </tr>
                            <tr>
                                <td><strong>Nome</strong></td>
                                <td>:</td>
                                <td><input name="nome" type="text" id="name" size="50" /></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>:</td>
                                <td><input name="email" type="text" id="email" size="50" /></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
                                <td><a href="index.php">Pagina Principal</a></td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
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
