

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
          <div align='center'><?php
       $tbl = "f_pergunta";

        $id = $_GET['id'];

        $result = listar_topico($id, $tbl);
        $rows = mysql_fetch_array($result);
        ?>

        <table class="tabela" >
            <tr> 
                <td><table >
                        <tr>
                            <td><strong>Assunto:<?php echo $rows['topico']; ?></strong></td>
                        </tr>
                        <tr>
                         
                          
                        </tr>
                        <tr>
                            <td><strong>Email : </strong><?php echo $rows['email']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Autor :</strong> <?php echo $rows['nome']; ?> 
                        </tr>

                        <tr>
                            <td ><strong>Data/Hora : </strong><?php echo $rows['data_h']; ?></td>
                        </tr><br><tr> <h3>Duvida:</h3>
                        <td><strong>Conteudo:</strong><?php echo $rows['descricao'];?></td></tr>
                    </table></td>
            </tr>
        </table>
   

        <?php
        //tabela de respostas
      ?>  <h3>Respostas:</h3><?php
        $tbls = "f_resposta";

        $result2 = listar_topico($id, $tbls);

        while ($rows2 = mysql_fetch_array($result2)) {
            ?>

            <table class="table" >
                <tablel>
                 
                          
                            <tr>
                                <td><strong>Nome</strong></td>
                                <td >:</td>
                                <td ><?php echo $rows2['r_nome']; ?></td>
                            </tr>
                            <tr>
                                <td ><strong>Email</strong></td>
                                <td >:</td>
                                <td ><?php echo $rows2['r_email']; ?></td>
                            </tr>
                           
                            <tr>
                                <td ><strong>Data/Hora</strong></td>
                                <td >:</td>
                                <td ><?php echo $rows2['r_data_h']; ?></td>

                            </tr>
                             <tr>
                                <td ><strong>Resposta</strong></td>
                                <td >:</td>
                                <td ><?php echo $rows2['resposta']; ?></td>
                            </tr>
                        </table></td>
                </tr>
            <br>

            <?php
        }
        contar_view($tbl, $id);
        ?>

        <BR> 
          </div>

        <form method="post" action="add_resposta.php">
            <table class="table">
                <form method="post" action="add_resposta.php">
                    <tr>

                        <td>
                            <table >
                                <tr>
                                    <td ><strong>Nome</strong></td>
                                    <td >:</td>
                                    <td ><input name="a_name" type="text" id="a_name" size="45"></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>:</td>
                                    <td><input name="a_email" type="text" id="a_email" size="45"></td>
                                </tr>
                                <tr>
                                    <td valign="top"><strong>Resposta</strong></td>
                                    <td valign="top">:</td>
                                    <td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>

                                    <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
                                    <td><a href="index.php">Pagina Principal</a></td><a href="forum.php">Voltar ao Forum</a></td>
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
