<!DOCTYPE HTML>
<html>

    <head>
        <title>voo</title>

        <meta charset="UTF-8">

      
    </head>

    <body  >
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
                    <?php include_once './menuVerticalFerramentas.php'; ?>
                    <iframe src="http://embed.flightaware.com/commercial/integrated/web/delay_map_fullpage.rvt" 
                            width="600" height="600" frameborder="0" marginheight="0" marginwidth="0"></iframe>

                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                João silva , João Gomes, Mario Cardoso
            </div>
        </div>
    </body>
</html>