<!DOCTYPE HTML>
<html>

    <head>
        <title>Mapa</title>

        <meta charset="UTF-8">

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places" type="text/javascript" ></script>
        <script type="text/javascript" src="funcoes_e_bd/funcoes.js"></script>

    </head>

    <body onload="initialize()" onunload="GUnload()" >
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
                    <div id="map-canvas"></div>
                    <?php include_once './menuVerticalFerramentas.php'; ?> 





                    <div id="locationField">
                        Encontre Hotéis em: <input id="autocomplete" placeholder="introduza a cidade" type="text" />
                    </div>

                    <div id="controls">
                        <select id="country">
                            <option value="all">All</option>
                            <option value="ru" selected>Russia</option>

                        </select>
                    </div>
                    <div id="mapa_base" style="width: 600px; height: 500px;"></div>



                    <div id="listing">
                        <table id="resultsTable">
                            <tbody id="results"></tbody>
                        </table>
                    </div>
                    <div  id="info-content"  >
                        <table >
                            <tr id="iw-url-row" class="iw_table_row">
                                <td id="iw-icon" class="iw_table_icon"></td>
                                <td id="iw-url"></td>
                            </tr>
                            <tr id="iw-address-row" class="iw_table_row">
                                <td class="iw_attribute_name">Endereço:</td>
                                <td id="iw-address"></td>
                            </tr>
                            <tr id="iw-phone-row" class="iw_table_row">
                                <td class="iw_attribute_name">Conctato:</td>
                                <td id="iw-phone"></td>
                            </tr>
                            <tr id="iw-rating-row" class="iw_table_row">
                                <td class="iw_attribute_name">Classificação:</td>
                                <td id="iw-rating"></td>
                            </tr>
                            <tr id="iw-website-row" class="iw_table_row">
                                <td class="iw_attribute_name">Website:</td>
                                <td id="iw-website"></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div></div>
    </body>
</html>
