<?php
function adiciona($nome, $valor, $url, $tipo){
    $val = true;
    $xml = simplexml_load_file($url);       
    $items = $xml->$tipo;
    
    $array = array();
    
    foreach ($items as $item){
        // adiciona num array temporario
        $arr = array();
        $arr[] = $item->nome;
        $arr[] = $item->valor;  
        
        if(strtoupper($item->nome) == strtoupper($nome) || strtoupper($item->valor) == strtoupper($valor)){
            $val = false;
        }
        
        // adiciona o array temporario no array principal
        $array[] = $arr;
    }
    
    // adicionar o pretendido
    $arr = array();
    $arr[] = $nome;
    $arr[] = $valor;
    
    $array[] = $arr;
    
    if($val) {
        return $array;
    } else {
        return null;
    }
} 

function remove($nome, $valor, $url, $tipo){
    $val = false;
    $xml = simplexml_load_file($url);       
    $items = $xml->$tipo;
    
    $array = array();
    
    foreach ($items as $item){
        // adiciona num array temporario
        $arr = array();
        $arr[] = $item->nome;
        $arr[] = $item->valor;  
        
        if(strtoupper($item->nome) == strtoupper($nome) && strtoupper($item->valor) == strtoupper($valor)){
            $val = true; 
            // para remover
            continue;
        }
        
        // adiciona o array temporario no array principal
        $array[] = $arr;
    }
    
    if($val) {
        return $array;
    } else {
        return null;
    }
}

function cria_remove_moedas($nome, $valor, $val = true){
  $doc = new DOMDocument('1.0', 'UTF-8'); 
  $doc->formatOutput = true; 
   
  $moedas = $doc->createElement( "moedas" ); 
  $doc->appendChild( $moedas ); 
  
  if ($val){
    $array = adiciona($nome, $valor, 'moedas.xml', 'moeda');
  } else {
    $array = remove($nome, $valor, 'moedas.xml', 'moeda');
  }
  
  if($array){
    foreach ($array as $row) {
      $moeda = $doc->createElement( "moeda" ); 

      $nome = $doc->createElement( "nome" ); 
      $nome->appendChild( $doc->createTextNode( $row[0] )); 
      $moeda->appendChild( $nome );

      $valor = $doc->createElement( "valor" ); 
      $valor->appendChild( $doc->createTextNode($row[1])); 
      $moeda->appendChild( $valor ); 

      $moedas->appendChild($moeda); 
    } 
    $doc->save("moedas.xml"); 
    
    if($val){
        echo "<script>window.alert('Moeda adicionada com sucesso!');</script>";
    } else {
        echo "<script>window.alert('Moeda removida com sucesso!!');</script>";
    }
  } else {
      if ($val){
       echo "<script>window.alert('Moeda nÃ£o pode ser adicionada, porque jÃ¡ existe!');</script>";
      }
  }
}
