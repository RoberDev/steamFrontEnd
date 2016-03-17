<?php

require("Toro.php");

class HelloHandler {
    function get() {
        include "templates/search.php";
    }

    function post() {
        include "templates/search.php";
        $nombre = $_POST["nombre"];
       
    }
}

class ApiHandler {
    function get() {
        include "templates/stats.php";
    }
    
    function post() {
    	include "templates/stats.php";
    	return;
    }
}

class ImageHandler {
	function get() {
		header("Content-type: image/jpeg");
		readfile($_GET['img']);
	}
}

Toro::serve(array(
    "/" => "HelloHandler",
    "/stats" => "ApiHandler",
    "/imagenes" => "ImageHandler"
));
