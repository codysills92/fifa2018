<!DOCTYPE html>
<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php require_once 'menu.php';
        $id=$_GET['id_procura'];
        ?>
    </head>
    <body>

        <?php
        $ligacao=  ligar_base_dados();
        $query1 = "DELETE FROM `utilizador` WHERE username = '$id' ";
        $query2= "DELETE FROM `delegado_pais` WHERE username = '$id' ";
        $query3= "DELETE FROM ` selecao` WHERE user_responsavel='$id'";
        mysql_query($query1,$ligacao);
        mysql_query($query3,$ligacao);
        mysql_query($query2,$ligacao);
        if (!mysql_query($query1)) {if(!mysql_query($query2)){if(!mysql_query($query3)){
            die('Erro: ' . mysql_error());
        }}}mysql_close($ligacao);
        ?> <script> alert("Removido com sucesso!");</script> <?php
        
        ?>

    </body>
</html>
