
<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="UTF-8">
        <title>HOME</title>

        <script type="text/javascript">
            function TrocarFoto2() {
                document.getElementById('img1').src = "estadio2.jpg";
            }
            function TrocarFoto3() {
                document.getElementById('img1').src = "estadio3.jpg";
            }
            function TrocarFoto4() {
                document.getElementById('img1').src = "estadio4.jpg";
            }
            function TrocarFoto5() {
                document.getElementById('img1').src = "estadio5.jpg";
            }
            function TrocarFoto6() {
                document.getElementById('img1').src = "estadio6.jpg";
            }
            function VoltarFoto1() {
                document.getElementById('img1').src = "estadio1.jpg";
            }

        </script>
    </head>

    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">

                        <h1><a>FIFA WORLD CUP RUSSIA 2018</a></h1>

                    </div>
                </div>
                <?php include 'menu.php' ?>;
            </div>
            <div id="site_content">
                <div class="sidebar">

                    <h3>Noticias</h3>
<?php 
                    include './feeds.php';
                    ?>

                </div>
                <div id="content">

                     <h1>Video PW (Teaser)</h1>
         <iframe width="400" height="250" src="//www.youtube.com/embed/G7RmutT3cFc" frameborder="0"></iframe>
         
         <h1>Video PW FIFA WORLD CUP 2018 (Completo)</h1>
         <iframe width="400" height="250" src="//www.youtube.com/embed/TmHDr3T8QdI" frameborder="0"></iframe>
                            
                           
                   
                    <table align="center">
                         <h1>Galeria: Estádios</h1>
                        <tr>
                            <td colspan="5" align="center">
                                <img src="estadio1.jpg" id="img1" width="500" height="250" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="estadio2.jpg" id="img2" width="100" height="100" onclick="TrocarFoto2()" />
                            </td>
                            <td>
                                <img src="estadio3.jpg" id="img3" width="100" height="100" onclick="TrocarFoto3()" />
                            </td>
                            <td>
                                <img src="estadio4.jpg" id="img4" width="100" height="100" onclick="TrocarFoto4()" />
                            </td>
                            <td>
                                <img src="estadio5.jpg" id="img2" width="100" height="100" onclick="TrocarFoto5()" />
                            </td>
                            <td>
                                <img src="estadio6.jpg" id="img3" width="100" height="100" onclick="TrocarFoto6()" />
                            </td>
                        </tr>
                        
                    </table>

                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                João silva , João Gomes, Mario Cardoso
            </div>
        </div>
    </body>
</html>


