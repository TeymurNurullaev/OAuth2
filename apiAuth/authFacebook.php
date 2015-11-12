<?php

 if(!isset($_GET["code"])) { exit("no code"); }
 session_start();
 define("InitSystem", "facebook");

 include_once 'config.app.php';
 include_once 'api/Main.php';
 include_once 'api/facebook.php';

 $a = new Auth;
 $a->idApps  = $_app[InitSystem]["idApps"];
 $a->keyApps = $_app[InitSystem]["keyApps"];
 $a->redirectUri = $_app[InitSystem]["redirectUri"];

 $userInfo = $a -> getUserInfo($_GET["code"]);

 $_SESSION["authAPIinfo"] = $userInfo;
 $header = '/';
 if(isset($_SESSION["token_url"])) {
  $header = $_SESSION["token_url"];
 }
 header("location: $header");

?>
