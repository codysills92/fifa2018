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
                    <?php include_once './menuVerticalEstatisticas.php'; ?>

                    <h1>Grupos</h1>
                    <form action="" method="post">
                        <label>ID Grupo<br></label><select name="idGrupo">
                            <?php
                            $query = listar_grupos();
                            while ($row = mysql_fetch_array($query)) {
                                ?>
                                <option name="<?php $row['id_grupo'] ?>" value= "<?php echo $row['id_grupo'] ?>" ><?php echo $row['id_grupo'] ?></option>
                            <?php } ?>  

                        </select>


                        <button><input type="submit" name="confirmar"  value="Confirmar"/><br/>
                    </form> 
<?php
if (isset($_POST['idGrupo'])) {
    $grup = $_POST['idGrupo'];


    $sql = ("SELECT * FROM `grupo` WHERE `id_grupo` LIKE '$grup' ORDER BY `id_grupo` ASC");

    $ligacao = ligar_base_dados();
    $rs = mysql_query($sql, $ligacao);

    while ($row = mysql_fetch_array($rs)) {
        ?>


                            <h5>ID Grupo: <?php echo $row['id_grupo'] ?></h5>
                            <h5>Nome Grupo: <?php echo $row['designacao'] ?></h5><br/>

                            <h3>Tabela classificativa</h3>
        <?php
        $sel = selecoes_comGrupo($grup);
        if (mysql_num_rows($sel) == 0) {
            ?>  <p>Ainda nao foram adicionadas quaisquer selecoes a este grupo. A aguardar sorteio. Utilize o nosso Forum pode conter informação sobre o sorteio de equipas.
                                    <a href="forum.php">Forum</a>
                                </p> <?php
                } else {
            ?>

                                <table>
                                    <tr>
                                        <td>Páis</td>
                                        <td>Selecao</td>		
                                        <td>Pontos</td>
                                        <td>Vitórias</td>
                                        <td>Empates</td>
                                        <td>Derrotas</td>
                                        <td>Golos Marcados</td>
                                        <td>Golos Sofridos</td>  
                                    </tr>

            <?php
            $grupo = $grup;

            $sel = selecoes_comGrupo($grupo);
            while ($row = mysql_fetch_array($sel)) {
                $pais = $row['id_selecao'];
                $selecao = $row['nome'];
                $pontos = $row['pontos'];
                $golosmarcados = $row['golosMarcado'];
                $golossofridos = $row['golosSofridos'];
                $empates = $row['empates'];
                $derrotas = $row['derrotas'];
                $vitorias = $row['vitorias'];
                ?>

                                        <tr>
                                            <td><?php echo $pais ?></td>
                                            <td><?php echo $selecao ?></td>		
                                            <td><?php echo $pontos ?></td>
                                            <td><?php echo $vitorias ?></td>
                                            <td><?php echo $empates ?></td>
                                            <td><?php echo $derrotas ?></td>
                                            <td><?php echo $golosmarcados ?></td>
                                            <td><?php echo $golossofridos ?></td>   
                                        </tr>
                <?php
            }
            ?>   </table>

                                <?php } ?>



                            <h3>Jogos do Grupo</h3>
        <?php
        $calendario = listar_calendario_porFase($grup);

        if (mysql_num_rows($calendario) == 0) {
            ?>  <p>Nao se encontram ainda os jogos relativos a este grupo</p> <?php
                            } else {

                                while ($row = mysql_fetch_array($calendario)) {
                                    ?>

                                    <?php
                                    if ($row['equipaVisitante'] == '') {
                                        $equ2 = 'aguardar insercao';
                                    } else {
                                        $equ2 = $row['equipaVisitante'];
                                    }
                                    if ($row['equipaCasa'] == '') {
                                        $equ1 = 'aguardar insercao';
                                    } else {
                                        $equ1 = $row['equipaCasa'];
                                    }
                                    if ($row['status'] == 'Agendado') {
                                        $resultado = 'Este jogo ainda nao foi realizado';
                                    } elseif ($row['status'] == 'Realizado') {
                                        $golosE1 = $row['golo_Ecasa'];
                                        $golosE2 = $row['golo_Evisitante'];
                                        $resultado = "Resultado Final: $equ1      $golosE1  -    $golosE2      $equ2";
                                    } else {
                                        $golosE1 = $row['golo_Ecasa'];
                                        $golosE2 = $row['golo_Evisitante'];
                                        $resultado = "Jogo a Decorrer, Resultado: $equ1      $golosE1  -    $golosE2      $equ2";
                                    }
                                    ?>
                                    <p>ID do Jogo: <?php echo $row['id_jogo']; ?></p>
                                    <p>Jogo estado: <?php echo $row['status']; ?>  </p>
                                    <p> Dia: <?php echo $row['data'] ?>  </p>
                                    <p> Hora: <?php echo $row['hora'] ?> horas</p>
                                    <p> Fase/Grupo: <?php echo $row['fase']; ?> </p>
                                    <p> Disputado por: <?php echo $equ1 ?> vs  <?php echo $equ2 ?> </p></li>
                                    <p> <?php echo $resultado ?> </p>
                                    <br/>
                                    <hr>

                                    <?php
                                }
                                ?>


            <?php
        }
    }
    ?>

                        <?php
                    } else {
                        echo 'Selecione o grupo por favor';
                    }
                    ?>
                </div>
            </div>

            <div id="content_footer"></div>
            <div id="footer">
                João silva , João Gomes, Mario Cardoso
            </div>
        </div>
    </body>
</html>
