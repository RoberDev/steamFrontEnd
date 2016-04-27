<?php
  function isGameSupported($idJuego){
    switch ($idJuego) {
      case '10':
        return true;
        break;

      default:
        //echo 'Juego no soportado';
        break;
    }
  }
  
  function gameData($idJuego, $name){
    switch ($idJuego) {
      case '10':
        game10($name);
        break;

      default:
        //echo 'Juego no soportado';
        break;
    }
  }

  function game10($name){

  }

  function game20($name){
    echo 'juego correcto';
  }
?>
