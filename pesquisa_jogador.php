<!DOCTYPE HTML>
<html>

<head>
  <title>Pesquisa</title>
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
      <?php include './menuVerticalEstatisticas.php'; ?>
        <h1>PESQUISAS</h1>
      <h4 align="center">Desempenho de jogador</h4>
            <center>
                <form method="get" >

                    <pre>
                        
      <label>Nome: </label>            <input type="text" name="nome">
                  <input type="submit" value="Procurar"/>
                    </pre>
                </form>
            </center>            
            <?php
            $ligacao = ligar_base_dados();
            if (isset($_GET['nome'])) {
                $nome_pesq = $_GET['nome'];
                if (empty($nome_pesq)) {
                    echo "Introduza um Nome";
                } else {



                    $sql = mysql_query("SELECT jogador.* FROM jogador  WHERE jogador.nome= '$nome_pesq'  ", $ligacao);

                    mysql_close($ligacao);




                    if (mysql_num_rows($sql) > 0) {
                        while ($dados = mysql_fetch_array($sql)) {

                            echo "<pre> 
                                
        
 Nome:                        $dados[nome]
 Seleção:                     $dados[id_selecao]  
 Número Camisola:             $dados[num_camisola]
 Peso:                        $dados[peso]
 Altura:                      $dados[altura]
 Data Nascimento:             $dados[data]
 Internacionalização:         $dados[internacionalizacao]
 Número de cartões amarelos:  $dados[c_amarelo]
 Número de cartões vermelhos: $dados[c_vermelho] 
 Golos marcados:              $dados[nrGolos]
     
                                                                             
                ";

                            echo "</pre>";
                        }
                    } else {
                        echo"Não encontrado!";
                    }
                }
                } ?> <tr> <h4 align="center">Desempenho Selecao</h4>
                         <form method="get" >
                             <center>
                    <pre>
                        
      <label>Nome: </label>            <input type="text" name="nomej">
                  <input type="submit" value="Procurar"/>
                    </pre>
                </form>
            </center>            
            <?php
            if (isset($_GET['nomej'])) {
                $ligacao = ligar_base_dados();
                $nome_pesq = $_GET['nomej'];
                if(empty($nome_pesq)){
                    echo"Introduza um Nome!";
                    
                }else{

                $sql = mysql_query("SELECT * FROM ` selecao` WHERE `nome` = '$nome_pesq' ", $ligacao);

                mysql_close($ligacao);

       
                 if(mysql_num_rows($sql)>0){
                while ($dados = mysql_fetch_array($sql)) {
                    echo "<pre> 
                                
        
 Nome:                        $dados[nome]
 Seleção:                     $dados[id_selecao]  
 Fase:                        $dados[progresso]
 Golos Marcados:              $dados[totalGolosMarcados]
 Golos Sofridos:              $dados[totalGolosSofridos]
 Delegado País:               $dados[user_responsavel]

     
                                                                             
                ";

                    echo "</pre>";
                 }}else{
                    echo "Sem resultados!";
                }
            }}
            ?>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
João silva , João Gomes, Mario Cardoso
    </div>
  </div>
</body>
</html>
