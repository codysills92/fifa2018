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

                    <h1>Sobre</h1>
                    <h1 >FIFA WORLD CUP 2018</h1>
                    <p>Este site visa implementar uma simulação ao máximo detalhe do campeonato do mundo de futebol 2018 , que irá¡ decorrer na Russia.</p>
                    <li>O site irá permitir as seguintes funcionalidades:</li>
                    <ul>
                        <li>Registar-se no site adequando ao perfil de sua escolha.</li>
                        <li>Criar as seleções e os jogadores a sua escolha.</li>
                        <li>Criar os grupos de qualifição e as seguintes fases até a fase final.</li>
                        <li>Simular jogos entre as seleções criadas ao máximo detalhe.</li>


                    </ul>



                    <pre align="center">  	
            <h4> WEB PROGRAMING JMJ</h4>
 
<h5>Endereço: Campus de Azurem 4800-058 Guimarães</br>
      Telefone:
    912 390 422 (João Silva)</br>
    965 248 572 (Mário Cardoso)</br>
    916 427 540 (João Gomes)   </br>


    Email:SuporteFifa2018@gmail.com </br>
            
<br/></h5>

                    </pre>
                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                João silva , João Gomes, Mário Cardoso
            </div>
        </div>
    </body>
</html>

