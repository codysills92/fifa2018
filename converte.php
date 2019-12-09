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
                include_once './funcoes_e_bd/funcoes_xml.php'
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
                    <?php
                    include_once './menuVerticalFerramentas.php';
                    if (isset($_POST['de'])) {
                        $parametros = array(
                            'CurrencyFrom' => $_POST['de'],
                            'CurrencyTo' => $_POST['para'],
                            'RateDate'=> date("d/m/Y")
                        );
                        $soap = new SoapClient('http://currencyconverter.kowabunga.net/converter.asmx/GetConversionRate?wsdl');
                        $resposta = $soap->GetConversionRate($parametros)->GetConversionRateResult;

                        $resultado = $_POST['montante'] * $resposta;
                        echo "<script>window.alert('$resultado');</script>";
                    }
                    $moedas = get_moedas();
                    ?>



                    <h2>Conversor de Moedas</h2>
                    <form action="" method="POST" name="form">
                        <label>De:</label>
                        <p>  <select name="de">
                                <?php
                                foreach ($moedas as $moeda) {
                                    ?>
                                    <option value="<?= $moeda->valor ?>"><?= $moeda->nome ?></option>
                                    <?php
                                }
                                ?></p>
                        </select>

                        <p>  <label>Para:</label></p>
                        <p>  <select name="para">
                                <?php
                                foreach ($moedas as $moeda) {
                                    ?>
                                    <option value="<?= $moeda->valor ?>"><?= $moeda->nome ?></option>
                                    <?php
                                }
                                ?>
                        </p>
                        </select>
                        <br/>
                        <br/>
                        Quantia:    <input type="text" name="montante" size="5"> 
                        <br/>
                        <br/>
                        <input type="submit" value="Converter">
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
