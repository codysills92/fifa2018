<!--<!DOCTYPE HTML>
<html>

<head>
<title>Cambio</title>
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
       class="logo_colour", allows you to change the colour of the text 
      <h1><a>FIFA WORLD CUP RUSSIA 2018</a></h1>

    </div>
  </div>
  <?php  include_once './menu.php';
require_once "funcoes_e_bd/funcoes_xml.php";
    ?>

</div>
<div id="site_content">
  <div class="sidebar">
     insert your sidebar items here 
    <h3>Noticias</h3>


  </div>
  <div id="content">

    <h1>Cambio</h1>
   <?php



if (isset($_POST['adiciona'])) {
if (empty($_POST['moeda']) || empty($_POST['valor'])) {
    echo "<script>window.alert('Preencha os campos em falta!');</script>";
} else {
    cria_remove_moedas(ucwords($_POST['moeda']), strtoupper($_POST['valor']));
}
}
if (isset($_POST['remove'])) {
if (empty($_POST['moeda']) || empty($_POST['valor'])) {
    echo "<script>window.alert('Preencha os campos em falta!');</script>";
} else {
    cria_remove_moedas($_POST['moeda'], $_POST['valor'], false);
}
}
?>

<!DOCTYPE html>
<html>
<head></head>
<div>
<div id="banner" align="center">
    <p><a href="http://www.webservicex.net/CurrencyConvertor.asmx" target="_blank">Adicionar moedas existentes nesta lista</a></p>
    <form action="" method="post">
        <span>Moeda: </span><input type="text" name="moeda">
        <br />
        <span>Valor: </span><input type="text" name="valor"> 
        <br />
        <input type="submit" name="adiciona" value="Adicionar">
        <input type="submit" name="remove" value="Remover">
    </form>

    <h2>Lista</h2>
    <hr>

    <?php
    $xml = simplexml_load_file('moedas.xml');

    $moedas = $xml->moeda;

    foreach ($moedas as $moeda) {
        $nome = $moeda->nome;
        $valor = $moeda->valor;

        echo $nome . ": " . $valor . "; "
        ?><br/> <?php
        ;
        }
        ?>
</div>
</div>
  </div>
</div>
<div id="content_footer"></div>
<div id="footer">
João silva , João Gomes, Mario Cardoso
</div>
</div>
</body>
</html>-->
