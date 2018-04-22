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

                        <h1><a>FIFA WORLD CUP RUSSIA 2018</a></h1>

                    </div>
                </div>
                <?php
                include 'menu.php';
                 if (quemPode() === 0) {
                ?>
                <div id="site_content">
                    <div class="sidebar">
                        <!-- insert your sidebar items here -->
                        <h3>Noticias</h3>
 <?php 
                    include './feeds.php';
                    ?>


                    </div>
                    <div id="content">
                        <?php include_once './menuVerticalRegistos.php'; ?>
                        <h1>Registo Jogos FIFA WC</h1>
                        <?php
                        $evento = selecion_sistema();
                        if (mysql_num_rows($evento) == 0) {
                        ?>
                        <p>Para criar jogos é necessário em primeiro lugar atribuir um inicio e fim de evento!</p>
                        <a href="sistema.php">Criar data de evento</a>
                        <?php
                        } else {

                        if ((isset($_POST['data'])) && (isset($_POST['hora'])) && (isset($_POST['fase']))) {
                        $data = $_POST['data'];
                        $hora = $_POST['hora'];

                        if ($_POST['fase'] == 'grupos') {
                        $fase = $_POST['grupo'];
                        } else {
                        $fase = $_POST['fase'];
                        }



                        ligar_base_dados();

                        $sql = "INSERT INTO `wc_bd`.`jogo` (`id_jogo`, `fase`, `nome_arbitro`, `nome_estadio`, `data`, `nr_cartoesAmarelos`, `golo_Ecasa`, `golo_Evisitante`, `equipaCasa`, `equipaVisitante`, `hora`, `status` , `nrCartoesVermelhos` ) VALUES ('','$fase', '', '', '$data', '', '', '', '', '', '$hora','Agendado','')";
                        if (!mysql_query($sql)) {
                        die('Error: ' . mysql_error());
                        }
                        ?> <script>alert("Adicionado com sucesso!");
                    window.location = "index.php";</script> 
                            <?php
                        }
                        ?>
                        <div id='jogo' >
                            <form action="" method="post">
                                <?php
                                $sql = ("SELECT * FROM `calendario` WHERE `id` LIKE 'FifaWc_2018'");
                                $ligacao = ligar_base_dados();
                                $calendario = mysql_query($sql, $ligacao);
                                mysql_close($ligacao);
                                while ($linha = mysql_fetch_array($calendario)) {
                                $inicio = $linha['inicio_evento'];
                                $fim = $linha['fim_evento'];
                                }
                                ?>
                                <p>  <label for="data">Dia do Jogo</label></p><input type="date"  name="data" value="data" min="<?php echo $inicio ?>"  max='<?php echo $fim ?>'/><br/>
                                <p> <label for='hora' > Hora do Jogo: </label></p><input type="time" name="hora"  value="hora"/> Horas : Minutos<br/>


                                <p> <label>Fase/Grupo:</label></p>
                                <input type="radio" name="fase"
                                <?php
                                if (isset($fase) && $fase == "grupos") {
                                echo "checked";
                                }
                                ?>
                                       value="grupos"  onclick="if (document.getElementById('grupos').disabled === true) {
                                       document.getElementById('grupos').disabled = false;
                                   }
                                       " />grupos 
                                <input type="radio" name="fase" <?php
                                if (isset($fase) && $fase == "oitavosFinal") {
                                echo "checked";
                                }
                                ?>
                                       value="oitavosFinal"  onclick="if (document.getElementById('grupos').disabled === false) {
                                       document.getElementById('grupos').disabled = true;
                                   }" />Oitavos De Final 
                                <input type="radio" name="fase"
                                <?php
                                if (isset($fase) && $fase == "quartosFinal") {
                                echo "checked";
                                }
                                ?>
                                       value="quartosFinal" onclick="if (document.getElementById('grupos').disabled === false) {
                                       document.getElementById('grupos').disabled = true;
                                   }" />Quartos De final
                                <input type="radio" name="fase"
                                <?php
                                if (isset($fase) && $fase == "semiFinal") {
                                echo "checked";
                                }
                                ?> 
                                       value="smiFinal" onclick="if (document.getElementById('grupos').disabled === false) {
                                       document.getElementById('grupos').disabled = true;
                                   }" />Meias Finais
                                <input type="radio" name="fase"
                                <?php
                                if (isset($fase) && $fase == "final") {
                                echo "checked";
                                }
                                ?>
                                       value="final" onclick="if (document.getElementById('grupos').disabled === false) {
                                       document.getElementById('grupos').disabled = true;
                                   }" />Final <br>
                                <label>Seleciona grupo:  <br></label>
                                <select name="grupo" id='grupos' disabled='true'>

                                    <?php
                                    $query = listar_grupos();
                                    while ($row = mysql_fetch_array($query)) {
                                    ?>
                                    <option name="<?php $row['id_grupo'] ?>" value= "<?php echo $row['id_grupo'] ?>" ><?php echo $row['designacao'] ?></option>
                                    <?php } ?>  

                                </select>


                                <br/>


                                <input type="submit" name="confirmar"  value="Confirmar"/><br/>
                                <input type="reset" value="Limpar"><br/>
                                <a href="index.php">Pagina Principal</a>
                            </form>
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

<?php
}

} else {
echo redirect('login.php');
}?>