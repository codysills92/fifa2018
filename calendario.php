<!DOCTYPE HTML>
<html>

    <head>
        <title>calendario</title>
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
                    <h2>Calendario De Jogos:</h2>
                    <div class="table">

                        <ul style="list-style-type:none">

                            <?php
                            $jogos = listar_calendario();

                            while ($row = mysql_fetch_array($jogos)) {
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
                                <div> 
                                    <p align='center'> Jogo estado: <?php echo $row['status']; ?>  </p>
                                    <p> Dia: <?php echo $row['data'] ?>  </p>
                                    <p> Hora: <?php echo $row['hora'] ?> horas</p>
                                    <p> Fase/Grupo: <?php echo $row['fase']; ?> </p>
                                    <p> Estadio: <?php echo $row['nome_estadio']; ?> </p>
                                    <p> Disputado por: 
                                        <?php echo $equ1 ?> vs  <?php echo $equ2 ?> </p></li>
                                    <p> <?php echo $resultado ?> </p>
                                    <?php
                                    if (isset($_SESSION['nivel_acesso'])) {
                                        if ($_SESSION['nivel_acesso'] == 0) {
                                            ?> <a href="concluirJogo.php?id_jogo=<?php echo $row['id_jogo'] ?>">Editar Jogo</a>
                                            <a href="resumoJogo1.php?id_jogo=<?php echo $row['id_jogo'] ?>">Resumo Jogo</a>  <?php
                                        } else {
                                            ?>

                                            <a href="resumoJogo1.php?id_jogo=<?php echo $row['id_jogo'] ?>">Resumo Jogo</a> 
                                            <?php
                                        }
                                    }
                                    ?>
                                    <br/>
                                    <hr>

                                <?php }
                                ?>
                                </ul>
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
