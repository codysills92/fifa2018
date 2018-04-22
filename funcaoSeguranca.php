 <?php  
 function quemPode (){
    
      $entra = 3;
       
          if (isset($_SESSION['username'])){
         
          if($_SESSION['nivel_acesso'] == 0){
          
     $entra = 0;
        }
         if($_SESSION['nivel_acesso'] ==1){
           $entra = 1;
         }
         
          if($_SESSION['nivel_acesso'] == 2){
            $entra = 2;
          } 
       }
    return $entra;
    
    
 }