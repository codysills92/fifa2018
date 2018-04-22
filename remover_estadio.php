<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>remover estadio</title>
        <?php
        include 'menu.php';
        if (quemPode() === 1) {
            ?>
        </head>
        <body>
            <?php
            $query = "DELETE FROM estadio WHERE id_estadio LIKE '" . $_GET['id_procura'] . "'";
            if (!mysql_query($query)) {
                die('Erro: ' . mysql_error());
            }
            ?> <script> alert("Removido com sucesso!");window.location = "index.php";</script> <?php ?>
        </body>
    <?php
    } else {
        echo redirect('estadio.php');
    }
    ?>
</html>
