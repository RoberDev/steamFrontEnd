<?php
  function isGameSupported($idJuego){
    switch ($idJuego) {
      case '730':
        return true;
        break;

      default:
        //echo 'Juego no soportado';
        break;
    }
  }

  function gameData($idJuego, $name, $key){
    switch ($idJuego) {
      case '730':
        $stats = game730($name, $key);
        return $stats;
        break;

      default:
        //echo 'Juego no soportado';
        break;
    }
  }

  function game730($name, $key){
    $json = file_get_contents("http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=".$key."&steamid=".$name);
    $datos = json_decode($json,true);
    $stats_kills =  $datos["playerstats"]["stats"][0]["value"];
    $stats_deadths =  $datos["playerstats"]["stats"][1]["value"];
    $stats_mvps =  $datos["playerstats"]["stats"][101]["value"];
    $stats2 = 2;
    $statsArray[] = array('idJuego'=>$stats2, 'total_kills'=>$stats_kills, 'total_deadths'=>$stats_deadths,
                          'total_mpvs'=>$stats_mvps);
    return $statsArray;

    //echo "Jugador con id64:", $name;
  }

  function game20($name){
    echo 'juego correcto';
  }
?>
