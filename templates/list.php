<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div></div>
	<div style="text-align:center;" class="mdl-grid">
	
	<?php
		
		//Get the totally number of games that the user owns.
		$var_id64 = $_POST['nombre'];
		//Steam Key
		$var_key = getenv('API_KEY');
		
		$json = file_get_contents('http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key='.$var_key.'&steamid='.$var_id64.'&include_appinfo=730&format=json');
		$datos = json_decode($json,true);
		$juegos = $datos["response"]["game_count"];

		for ($i=0; $i < $juegos; $i++) {
			$idJuego = $datos["response"]["games"][$i]["appid"];
			$hashlogo = $datos["response"]["games"][$i]["img_logo_url"];
			$name = $datos["response"]["games"][$i]["name"];
			//Return the url from the respective image of the game id requested.
			$text = "http://media.steampowered.com/steamcommunity/public/images/apps/".$idJuego."/".$hashlogo.".jpg";
	?>

	<a style=" margin-left: auto;margin-bottom: auto ;margin-right:auto;" href="/stats?id64=<?php echo $var_id64;?>$idJuego=<?php echo $idJuego;?>">
	<div style="box-shadow: 10px 10px 5px #888888; width:280px; height: 104px; background: url(<?php echo $text ?>); background-size: 100% 100%" class="mdl-cell mdl-cell--3-col">
	</div>	
	</a>

	<?php }
	?>	

	</div>


</body>
</html>
