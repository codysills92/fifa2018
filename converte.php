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
                            //'From' => $_POST['de'],
                            'Currency' => $_POST['para'],
                            'RateDate'=> date("d/m/Yz")
                        );

                        $context = stream_context_create(
                            array(
                                'http' => array(
                                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n , User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Safari/605.1.15",
                                   'method'  => 'POST',
                                    'content' => http_build_query($parametros)
                                )
                            )
                        );
                        

                        $soap = file_get_contents('http://currencyconverter.kowabunga.net/converter.asmx/GetCurrencyRate', false, $context);
                        //$resposta = $soap->GetCurrencyRate($parametros);
                        echo print_r($soap);
                       // $resultado = $_POST['montante'] * $resposta;
                        //echo "<script>window.alert('$resultado + $resposta');</script>";
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
