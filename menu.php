<?php

session_start();
include ('./funcoes_e_bd/basedados.php');
ligar_base_dados();
?>
<?php
  

       if (isset($_SESSION['username'])){
          
          if($_SESSION['nivel_acesso'] == 0){
          
     include("top_toAdmin.php");
        }
         if($_SESSION['nivel_acesso'] ==1){
             include ("top_toLoc.php");
         }
         
          if($_SESSION['nivel_acesso'] == 2){
              include("top_toCd.php");
          } 
       }
  else {
              include("top_toAnonim.php");
    
    }
    
 
    
    
    
    
    
    
