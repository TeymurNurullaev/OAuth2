<?php
 session_start();
 include_once 'config.app.php';

 if(isset($_SERVER['HTTP_REFERER'])) {
   $_SESSION["Api_oauth_referer"] = $_SERVER['HTTP_REFERER'];
 }

 if(isset($_GET["token_url"]) and isset($_GET["system"]) and isset($_app[$_GET["system"]])) {

   $_SESSION["token_url"] = $_GET["token_url"];

   $sys = $_GET["system"];
   $getUri = '';

   switch($sys) {

       case "yandex":
        $getUri = $_app[$sys]["authUri"]."?client_id=".$_app[$sys]["idApps"]."&".urldecode(http_build_query($_app[$sys]["params"]));
       break;

       case "facebook":
        $getUri = $_app[$sys]["authUri"]."?client_id=".$_app[$sys]["idApps"]."&redirect_uri=".urldecode($_app[$sys]["redirectUri"])."&".urldecode(http_build_query($_app[$sys]["params"]));
       break;

       case "vk":
        $getUri = $_app[$sys]["authUri"]."?client_id=".$_app[$sys]["idApps"]."&redirect_uri=".urldecode($_app[$sys]["redirectUri"])."&".urldecode(http_build_query($_app[$sys]["params"]));
       break;

       case "google":
        $getUri = $_app[$sys]["authUri"]."?client_id=".$_app[$sys]["idApps"]."&redirect_uri=".urldecode($_app[$sys]["redirectUri"])."&".urldecode(http_build_query($_app[$sys]["params"]));
       break;

   }

   if(!empty($getUri)) {
       header("location: $getUri");
       exit;
   }


 }


?>
