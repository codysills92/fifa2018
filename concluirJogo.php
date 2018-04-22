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
   $idJogo = $_GET['id_jogo'];
     ?>
    </div>
    <div id="site_content">
      <div class="sidebar">

        <h3>Noticias</h3>
        
         <?php 
                    include './feeds.php';
                    ?>

      </div>
      <div id="content">
    <h1 align='center'>  Dados Do Jogo  </h1>

        <div id='jogo' >
            <?php
            $verifica = verificaDadosJogo($idJogo);
            if (mysql_num_rows($verifica) == 1) {
                ?>

                <form action="concluirJogo.php?id_jogo=<?php echo $idJogo ?>" method="post">
                    <div class='completa dados'>
                        <h4>Completa os dados, para poderes aceder a manipulacao do jogo</h4>
                        <?php
                        $sql = "  SELECT * FROM `jogo` WHERE `id_jogo` = '$idJogo' ";
                        $ligacao = ligar_base_dados();
                        $query = mysql_query($sql, $ligacao);
                        mysql_close($ligacao);
                        while ($row1 = mysql_fetch_array($query)) {
                            $fase = $row1['fase'];
                        }
                        $selecao = listarSelecaoComFase($fase);

                        if (mysql_num_rows($selecao) < 2) {
                            ?>  <h3>Lamentamos mas nao é possivel a insercao de selecoes neste jogo porque estas aguardam qualificao ou sorteio </h3>
                            <?php
                        } else {
                            if (isset($_POST['selecao1']) && isset($_POST['selecao2']) && isset($_POST['arbito']) && isset($_POST['estadio'])) {
                                $selcao1 = $_POST['selecao1'];
                                $selecao2 = $_POST['selecao2'];
                                $arbito = $_POST['arbito'];
                                $estadio = $_POST['estadio'];
                                if($selcao1===$selecao2){
                                     ?> <script>alert("Cerifique-se que inseriu selcoes difrentes nos campos");</script> 
                    <?php
                                } else {
                                $insere = ("UPDATE `wc_bd`.`jogo` SET `nome_arbitro` = '$arbito', `nome_estadio` = '$estadio', `equipaCasa` = '$selcao1', `equipaVisitante` = '$selecao2' WHERE `jogo`.`id_jogo` = $idJogo;");
                                $ligacao = ligar_base_dados();
                                if (mysql_query($insere, $ligacao)) {
                                    mysql_close($ligacao);
                                    $link = ("concluirJogo.php?id_jogo=$idJogo");
                                    redirect($link);
                                } else {
                                    die('Error: ' . mysql_error());
                                }
                            }
                            }
                            ?> <h3>Selecoes em confronto:</h3>
                            <select name="selecao1"> <?php
                            while ($row = mysql_fetch_array($selecao)) {
                                ?>
                                    <option name="<?php echo $row['id_selecao'] ?>" value= "<?php echo $row['id_selecao'] ?>" ><?php echo $row['nome'] ?></option>   
                                    <?php
                                }
                                ?>
                            </select>     VS    <?php $selecao = listarSelecaoComFase($fase); ?>
                            <select name="selecao2"> <?php
                                while ($row = mysql_fetch_array($selecao)) {
                                    ?>
                                    <option name="<?php echo $row['id_selecao'] ?>" value= "<?php echo $row['id_selecao'] ?>" ><?php echo $row['nome'] ?></option>   
                                    <?php
                                }
                                ?>  </select> 
                            <?php } ?>

                        <hr>
                        <h3>Equipa de Arbitragem:</h3>
                        <p><input type='text' name='arbito' value=''></p>
                        <hr>
                        <h3>Estadio:</h3>

                        <select name='estadio'>
    <?php
    $estadio = listar_estadios();

    while ($linha = mysql_fetch_array($estadio)) {
        ?> <option name="<?php echo $linha['id_estadio']?>" value= "<?php echo $linha['nome'] ?>" ><?php echo $linha['nome'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <p align='center'><input type="submit" name="confirmar"  value="Confirmar"/><br/>
                            <input type="reset" value="Limpar"><br/></p>
                </form>
<?php
} else {

    $status = 'Agendado';
    $verficaEstado = verificaEstadoJogo($idJogo, $status);
    if ((mysql_num_rows($verficaEstado) == 1) && (mysql_num_rows($verifica) == 0)) {

        if (isset($_POST['button'])) {
            $ligacao = ligar_base_dados();
            $sql = ("UPDATE `wc_bd`.`jogo` SET `status` = 'Decorrer' WHERE `jogo`.`id_jogo` = '$idJogo'");
            mysql_query($sql, $ligacao);
            mysql_close($ligacao);
            $link = ("concluirJogo.php?id_jogo=$idJogo");
            redirect($link);
        }
        ?>

                </div>
                <div class='estado'>
                    <form action="concluirJogo.php?id_jogo=<?php echo $idJogo ?>" method="post">
                        <h3 align='center'>Da inicio ao Jogo</h3>

                        <p align='center'><button  type="submit" name="button" value="button">Iniciar Jogo</button></p>

                        <hr>
                    </form>
                </div> 
    <?php
    }

    $status = 'Decorrer';
    $decorrer = verificaEstadoJogo($idJogo, $status);
    if (mysql_num_rows($decorrer) == 1) {
        if(isset($_POST['minuto'])&& (isset($_POST['cartao']) && (isset($_POST['jogadores1'])))){
          $minuto =  $_POST['minuto'];
          $jogadores1 =  $_POST['jogadores1'];
          $cartao =  $_POST['cartao'];
          $ligacao = ligar_base_dados();
            $sql = "INSERT INTO `wc_bd`.`cartao` (`id_cartao`, `minuto`, `tipoCartao`, `id_jogo`, `id_jogador`) VALUES ('', '$minuto', '$cartao', '$idJogo', '$jogadores1')";
            mysql_query($sql,$ligacao);
            mysql_close($ligacao);
            
            if($cartao === 'Amarelo'){
            adicionarCartaoJogador_amarelo($jogadores1);
            adicionarCartaoAmareloJogo($idJogo);
            }
            if($cartao === 'Vermelho'){
                adicionarCartaoJogador_vermelho($jogadores1);
                adicionarCartoesVermelhosJogo($idJogo);
            }
               
            
               $link = ("concluirJogo.php?id_jogo=$idJogo");
                            redirect($link);
                           
        }   
        
        ?>



                <div class='jogoLive'>

                    <h3 align='center'>Manipular Jogo</h3>
                    <hr>
                    <form action="" method="post">
                        <h3 align='center'>Adicionar Cartao</h3>
                           <label>Minuto</label><input  name='minuto' type="number" min="0" max="90" maxlength="4">
                        <br/>
                        <br/>
                        
                         <label>Tipo cartao</label>  <input type="radio" name="cartao" 
        <?php
        if (isset($cartao) && $cartao == "Amarelo") {
            echo "checked";
        }
        ?>
         value="Amarelo"/><label>Amarelo</label>
                        <input type="radio" name="cartao" checked="true" <?php
                if (isset($cartao) && $cartao == "Vermelho") {
                    echo "checked";
                }
        ?>
                               value="Vermelho"  /><label>Vermelho</label>
                        
                        <br/>
                        
                         <?php
                        $sql = "  SELECT * FROM `jogo` WHERE `id_jogo` = '$idJogo' ";
                        $ligacao = ligar_base_dados();
                        $query = mysql_query($sql, $ligacao);
                        mysql_close($ligacao);
                        while ($row1 = mysql_fetch_array($query)) {
                            $selecao1 = $row1['equipaCasa'];
                            $selecao2 = $row1['equipaVisitante'];
                        }

                        $jogadoresSel1 = listarJogadoresDaSelecao($selecao1);
                        ?>  
                        <br>
                        <label>Jogador: </label> <select name='jogadores1'> <?php
                            while ($linha = mysql_fetch_array($jogadoresSel1)) {
                                ?> <option name="<?php echo $linha['id_jogador'] ?>" value= "<?php echo $linha['id_jogador'] ?>" ><?php echo $linha['nome'] ?></option>
                                <?php
                            }
                            ?>


                            <?php
                            $jogadoresSel2 = listarJogadoresDaSelecao($selecao2);

                            while ($linha = mysql_fetch_array($jogadoresSel2)) {
                                ?> <option name="<?php echo $linha['id_jogador'] ?>" value= "<?php echo $linha['id_jogador'] ?>" ><?php echo $linha['nome'] ?></option>
                                <?php
                            }
                            ?> 
                        </select> 
                        <br/>
                        <br/>

                        <input type="submit" name="confirmar"  value="Adicionar"/>
                        <input type="reset" value="Limpar"><br/>
                    </form>
                    <hr>





<?php         if(isset($_POST['minutoGolo']) && (isset($_POST['golo'])) && isset($_POST['jogadores']) ){
    
  $minuto =  $_POST['minutoGolo'];
  $golo =  $_POST['golo'];
   $jogadores =  $_POST['jogadores'];
   $ligacao = ligar_base_dados();
    $query = ("SELECT * FROM `jogador` where id_jogador=$jogadores");
    $result = mysql_query($query, $ligacao);
    mysql_close($ligacao);
    while ($row = mysql_fetch_array($result)) {
     $selecaoJ =$row['id_selecao'];
    }
      $ligacao = ligar_base_dados();
         $query= ("SELECT * FROM jogo WHERE id_jogo=$idJogo");
        $quer = mysql_query($query,$ligacao);
        mysql_close($ligacao);
         while ($row2 = mysql_fetch_array($quer)) {
          $equipaCasa=$row2['equipaCasa'];
            $equipaVisitante= $row2['equipaVisitante'];  
           
         }
    
  $sql = ("INSERT INTO `wc_bd`.`golo` (`id_golo`, `id_jogador`, `id_jogo`, `minuto`, `tipo`) VALUES ('', '$jogadores', '$idJogo', '$minuto', '$golo')");
  $ligacao = ligar_base_dados();
  mysql_query($sql,$ligacao);
  mysql_close($ligacao);
  $sql = "  SELECT * FROM `jogo` WHERE `id_jogo` = '$idJogo' ";
                        $ligacao = ligar_base_dados();
                        $query = mysql_query($sql, $ligacao);
                        mysql_close($ligacao);
                        while ($row1 = mysql_fetch_array($query)) {
                            $fase = $row1['fase'];
                        }
  if($_POST['golo'] =='golo'){
 if($selecaoJ === $equipaCasa){
   if(verificaSeOjogoEdosgrupos($equipaCasa,$fase)){
       addGolosMarcados_EcasaJogo($idJogo);
     adicionarGoloSelecao($equipaCasa);
     addGolosMarcadosSelecaoTotal($equipaCasa);
    addGolosSofridosSelecaoTotal($equipaVisitante);
     addGolosSofridosSelecao($equipaVisitante);
   }
    else{
        addGolosMarcados_EcasaJogo($idJogo);
        addGolosMarcadosSelecaoTotal($equipaCasa);
     addGolosSofridosSelecaoTotal($equipaVisitante);
        
 }
 }
 else { if(verificaSeOjogoEdosgrupos($equipaCasa,$fase)){
     addGolosMarcadoa_EvisitanteJogo($idJogo);
     adicionarGoloSelecao($equipaVisitante);
     addGolosSofridosSelecao($equipaCasa);
      addGolosMarcadosSelecaoTotal($equipaVisitante);
    addGolosSofridosSelecaoTotal($equipaCasa);
 }
 else{
      addGolosMarcadosSelecaoTotal($equipaVisitante);
    addGolosSofridosSelecaoTotal($equipaCasa);
     
 }
   
   
   
  
     }
       adicionarGoloJogador($jogadores); 
  }
     if($_POST['golo'] == 'auto_golo'){
        
         if($selecaoJ == $equipaCasa){
              if(verificaSeOjogoEdosgrupos($equipaCasa,$fase)){
             adicionarGoloSelecao($equipaVisitante);
              addGolosSofridosSelecao($equipaCasa);
             addGolosMarcadoa_EvisitanteJogo($idJogo);
             addGolosSofridosSelecaoTotal($equipaCasa);
             addGolosMarcadosSelecaoTotal($equipaVisitante);
              addGolosMarcadoa_EvisitanteJogo($idJogo);
              } else {
                   addGolosSofridosSelecaoTotal($equipaCasa);
             addGolosMarcadosSelecaoTotal($equipaVisitante);
              }
             
         }
         else{ if(verificaSeOjogoEdosgrupos($equipaCasa,$fase)){
             adicionarGoloSelecao($equipaCasa);
             addGolosSofridosSelecao($equipaVisitante);
             addGolosMarcados_EcasaJogo($idJogo);
             addGolosSofridosSelecaoTotal($equipaVisitante);
             addGolosMarcadosSelecaoTotal($equipaCasa);
         }
         else {
              addGolosSofridosSelecaoTotal($equipaVisitante);
             addGolosMarcadosSelecaoTotal($equipaCasa);
             addGolosMarcados_EcasaJogo($idJogo);
         }
             
         }
        
     }
        $link = ("concluirJogo.php?id_jogo=$idJogo");
                            redirect($link);
                           
  
    
}       ?>




                    <form action="" method="post">
                        <h3 align='center'>Adicionar Golo</h3>

                        <label>Minuto</label><input  name='minutoGolo' type="number" min="0" max="90" maxlength="4">
                        <br/>
                        <br/>

                        <label>Tipo Golo</label>  <input type="radio" name="golo" 
        <?php
        if (isset($golo) && $golo == "auto_golo") {
            echo "checked";
        }
        ?>
         value="auto_golo"/><label>Auto-golo</label>
                        <input type="radio" name="golo" checked="true" <?php
                if (isset($golo) && $golo == "golo") {
                    echo "checked";
                }
        ?>
                               value="golo"  /><label>Golo normal.</label>



                        <br/>
                        <?php
                        $sql = "  SELECT * FROM `jogo` WHERE `id_jogo` = '$idJogo' ";
                        $ligacao = ligar_base_dados();
                        $query = mysql_query($sql, $ligacao);
                        mysql_close($ligacao);
                        while ($row1 = mysql_fetch_array($query)) {
                            $selecao1 = $row1['equipaCasa'];
                            $selecao2 = $row1['equipaVisitante'];
                        }

                        $jogadoresSel1 = listarJogadoresDaSelecao($selecao1);
                        ?>  
                        <br>
                        <label>Jogador: </label> <select name='jogadores'> <?php
                            while ($linha = mysql_fetch_array($jogadoresSel1)) {
                                ?> <option name="<?php echo $linha['id_jogador'] ?>" value= "<?php echo $linha['id_jogador'] ?>" ><?php echo $linha['nome'] ?></option>
                                <?php
                            }
                            ?>


                            <?php
                            $jogadoresSel2 = listarJogadoresDaSelecao($selecao2);

                            while ($linha = mysql_fetch_array($jogadoresSel2)) {
                                ?> <option name="<?php echo $linha['id_jogador'] ?>" value= "<?php echo $linha['id_jogador'] ?>" ><?php echo $linha['nome'] ?></option>
                                <?php
                            }
                            ?> 
                        </select> 
                        <br/>
                        <br/>

                        <input type="submit" name="confirmar"  value="Adicionar"/>
                        <input type="reset" value="Limpar"><br/>

                    </form>
                    <hr>
                    <form action="concluirJogo.php?id_jogo=<?php echo $idJogo ?>" method="post">
                        <?php
                        if (isset($_POST['terminar'])) {
                              $sql = "  SELECT * FROM `jogo` WHERE `id_jogo` = '$idJogo' ";
                        $ligacao = ligar_base_dados();
                        $query = mysql_query($sql, $ligacao);
                        mysql_close($ligacao);
                        while ($row1 = mysql_fetch_array($query)) {
                            $selecao1 = $row1['equipaCasa'];
                            $selecao2 = $row1['equipaVisitante'];
                            $fase1 = $row1['fase'];
                            $golo1 = $row1['golo_Ecasa'];
                            $golo2 = $row1['golo_Evisitante'];
                        
                            $ligacao = ligar_base_dados();
                            $sql = ("UPDATE `wc_bd`.`jogo` SET `status` = 'Realizado' WHERE `jogo`.`id_jogo` = '$idJogo'");
                            mysql_query($sql, $ligacao);
                            mysql_close($ligacao);
                             if(verificaSeOjogoEdosgrupos($selecao1, $fase1)){
                           verificaGolos($idJogo, $selecao1, $selecao2); 
                           
                            }
                          
                          $message = "<h1>Terminou o jogo</h1> <p>  $selecao1 - $golo1 vs $golo2 - $selecao2</p>  <p> fase: $fase1 </p>";
                           $messagem = "Terminou o jogo entre  $selecao1 - $golo1 vs $golo2 - $selecao2 da fase: $fase1 ";
                           $subject='Terminou o jogo!';
                           $date = date('r');
                           add_feed($subject,$messagem,$date);
                           $emails = listar_utilizadores();
                         while ($row10 = mysql_fetch_array($emails)){
                       $nome ='PW TEAM';
                          MailLogin($nome,$row10['email'], $message, $subject);
                          
                         }
                        
                          
                           
                           
                            
                        }
                         echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=concluirJogo.php?id_jogo=$idJogo'>";
                        }
                        ?>
                        
                        <p align='center'>
                        <input name='terminar' type="submit"  value="Terminar Jogo"/><br/>
                        </p>
                    </form>

                </div>
                    <hr>
                <?php
            }
            
            include 'resumoJogo.php';
        }
        ?>
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
