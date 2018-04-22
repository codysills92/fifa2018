<?php
include_once './funcoes_e_bd/basedados.php';


global $mensagem;

$noticias = listarFeed();
            while($noticia = mysql_fetch_array($noticias)){
                $descricao = $noticia['titulo'];
                $conteudo = $noticia['conteudo'];
            $news = '<h3>'.utf8_encode($descricao).'</h3>'
                       
.'<p>'.utf8_encode($conteudo).'</p>';
            $mensagem = $mensagem.$news;
            $id =$noticia['ID'];
            alteraFeed($id);
          }

  $emails = listar_utilizadores();
                         while ($row10 = mysql_fetch_array($emails)){
                       $assunto ='Noticia do dia';
                       $nome = "joao Pedro";
                      $email =  $row10['email'];
                       MailLogin($nome,$email, utf8_decode($mensagem), $assunto);
                        
                         }

