<?php
header("Content-type: application/xml");

echo '<?xml version="1.0" encoding="UTF-8"?>';
require_once './funcoes_e_bd/basedados.php';

$sql = "SELECT * FROM `feed`";
$ligacao = ligar_base_dados();
$noticias = mysql_query($sql,$ligacao) OR die(mysql_error());
?>

<rss version="2.0">
    <channel>
        <title> Fifa </title>
         <link><?php echo "http://" . $_SERVER['SERVER_NAME'] . "/FIFA_WC_r2018"; ?></link>
         <description>Novidades sobre o Mundial</description>
        <language>pt-PT</language>
  
  <?php 
  while($noticia = mysql_fetch_array($noticias)) { 
     
      ?>
    <item>
        <title><?php echo utf8_encode($noticia['titulo']); ?></title>
      <link><?php echo "http://" . $_SERVER['SERVER_NAME'] . "/FIFA_WC_r2018"; ?></link>
      <description><?php echo 'Data: '.$noticia['date'].' Conteudo: '.utf8_encode($noticia['conteudo'])
                            ; ?></description>
    </item>
  <?php 
  } 
  ?>
</channel>

</rss>
<?php require_once './footer.html';?>

