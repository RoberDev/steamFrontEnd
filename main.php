<?php

require("Toro.php");
require_once('Mustache/Autoloader.php');
Mustache_Autoloader::register();
//$tpl = $loader->load('vista.php');
$mustache = new Mustache_Engine(array(
'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates')));

class HelloHandler {
    function get() {
    $mustache = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates')));
    $template = $mustache->loadTemplate("vista");
    echo $template -> render($template);
    }

    function post() {
        $nombre = $_POST["nombre"];

        if ($_POST)
        $mustache = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates')));
          $template = $mustache->loadTemplate("list");
          $var_id64 = $_POST['nombre'];
          $var_key = getenv('API_KEY');
          $json = file_get_contents('http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key='.$var_key.'&steamid='.$var_id64.'&include_appinfo=730&format=json');
		      $datos = json_decode($json,true);
		      $juegos = $datos["response"]["game_count"];
          $arrayTexto = array();

          for ($i=0; $i < $juegos; $i++) {
			         $idJuego = $datos["response"]["games"][$i]["appid"];
			         $hashlogo = $datos["response"]["games"][$i]["img_logo_url"];
			         $name = $datos["response"]["games"][$i]["name"];
			          //Return the url from the respective image of the game id requested.
			      $text = "http://media.steampowered.com/steamcommunity/public/images/apps/".$idJuego."/".$hashlogo.".jpg";
            $text2 = "/stats?id64=".$var_id64."=?idJuego=". $idJuego;
            $arrayTexto[$i] = array('idJuego'=>$text2, 'textGame'=>$text);
          }

          $template_data['datos']=  $arrayTexto;
          echo $template -> render($template_data);

    }
}

class ApiHandler {

    function get() {
        include 'utils.php';
        $url = $_SERVER['REQUEST_URI'];
        $datosUrl = explode("=", $url);
        $idJuego = $datosUrl[3];

        if(isGameSupported($datosUrl[3])==true){
            $template_stats = gameData($datosUrl[3], $datosUrl[1]);
            $mustache = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates/games')));
            $datosArray = array();

            $datosArray[] = array('idJuego'=>5);
            $template_data2['datos2']=  $datosArray;
            $template = $mustache->loadTemplate($idJuego);

            echo $template -> render($template_data2);
        }

    }

    function post() {
    	//include "templates/stats.php";
    	//return;
    }
}


Toro::serve(array(
    "/" => "HelloHandler",
    "/stats" => "ApiHandler",
));
?>
