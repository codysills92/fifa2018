<!DOCTYPE HTML>
<html>

<head>
  <title>Resumo</title>

</head>

     <?php
        $idJogo = $_GET['id_jogo'];
        include_once 'menu.php';
        ?>
 
    
        <h2 align='center'>Resumo Jogo</h2>
        <?php
        $query = $query = "SELECT * FROM `jogo` WHERE `id_jogo` = '$idJogo'";
        $ligacao = ligar_base_dados();
        $result = mysql_query($query, $ligacao);
        mysql_close($ligacao);
        while ($row = mysql_fetch_array($result)) {

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
           
        <h4><stong><p align='center'> Estado: <?php echo $row['status']; ?>  </p></strong></h4>
                <p> Dia: <?php echo $row['data'] ?>  </p>
                <p> Hora: <?php echo $row['hora'] ?> horas</p>
                <p> Fase/Grupo: <?php echo $row['fase']; ?> </p>
                <p> Estadio: <?php echo $row['nome_estadio'] ?></p>
                <p> Arbitro: <?php echo $row['nome_arbitro'] ?></p>
                <p> Disputado por: 
                    <?php echo $equ1 ?> vs  <?php echo $equ2 ?> </p></li>
            <p> <?php echo $resultado
                    ?> </p>
            <?php $conta = ($row['golo_Ecasa'] + $row['golo_Evisitante']); ?>
            <h4 align='center'>Estatisticas Jogo</h4>

            <p>Total cartoes Amarelhos: <?php echo $row['nr_cartoesAmarelos'] ?></p> 
            <p>Total cartoes Vermelhos: <?php echo $row['nrCartoesVermelhos'] ?></p>

            <p>Total golos: <?php echo $conta ?></p>

            <h4 align='center'>Golos da partida</h4>

            <?php
            $golos = listarGolos($idJogo);
            if (mysql_num_rows($golos) === 0) {
                ?><p align='center'>Ainda nao houve golos neste jogo</p>
                <?php
            } else {
                while ($row1 = mysql_fetch_array($golos)) {
                    $idJogador = $row1['id_jogador'];
                    if ($row1['tipo'] == 'auto_golo') {
                        $resultado = 'Auto Golo';
                    } else {
                        $resultado = 'Golo';
                    }
                    $sql = "SELECT * FROM jogador WHERE id_jogador =$idJogador";
                    $ligacao = ligar_base_dados();
                    $jogador = mysql_query($sql, $ligacao);
                    while ($row3 = mysql_fetch_array($jogador)) {
                        $nome = $row3['nome'];
                        ?>
                        <p><?php echo $resultado ?> de <?php echo $nome ?> , ao minuto <?php echo $row1['minuto'] ?></p>
                        <?php
                    }
                }
            }
            ?>

            <h4 align='center'>Cartoes da partida</h4>
            <?php
            $cartoes = listar_cartoes($idJogo);
            if (mysql_num_rows($cartoes) === 0) {
                ?>
                <p align='center'>Ainda nao houve cartoes neste jogo</p>
                <?php
            } else {
                while ($row2 = mysql_fetch_array($cartoes)) {

                    $sql = "SELECT * FROM jogador WHERE id_jogador =$idJogador";
                    $ligacao = ligar_base_dados();
                    $jogador = mysql_query($sql, $ligacao);
                    while ($row3 = mysql_fetch_array($jogador)) {
                        $nome = $row3['nome'];
                        ?>
                        <p>Cartao:<?php echo $row2['tipoCartao'] ?> para <?php echo $nome ?> , ao minuto <?php echo $row2['minuto'] ?></p>
                        <?php
                    }
                }
            }
        }
        ?>
                        <h3><a href="calendario.php">Voltar ao Calendario</a></h3>

            </form>
      </div>
 
