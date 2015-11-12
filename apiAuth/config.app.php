<?php
//
define("redirectUri", "https://Мой Домен/apiAuth/");

$_app = array("yandex" => array( "authUri"=>"https://oauth.yandex.ru/authorize",
                                 "idApps" => " -- тут idApps --  ",
                                 "keyApps" => " -- тут ключ --- ",
                                 "redirectUri" => redirectUri."authYndex.php",
                                 "params" => array( "response_type" => "code",
                                                    "display" => "popup")
                                 ),

              "facebook" => array("authUri"=>"https://www.Facebook.com/dialog/oauth",
                                 "idApps" => " -- тут idApps --  ",
                                 "keyApps" => " -- тут ключ --- ",
                                 "redirectUri" => redirectUri."authFacebook.php",
                                 "params" => array( "response_type" => "code",
                                                    "scope" => "email")
                                 ),

              "vk" => array("authUri"=>"http://oauth.vk.com/authorize",
                                 "idApps" => " -- тут idApps --  ",
                                 "keyApps" => " -- тут ключ --- ",
                                 "redirectUri" => redirectUri."authVk.php",
                                 "params" => array( "response_type" => "code",
                                                    "scope" => "email,offline")
                                 ),


              "google" => array("authUri"=>"https://accounts.google.com/o/oauth2/auth",
                                 "idApps" => " -- тут idApps --  ",
                                 "keyApps" => " -- тут ключ --- ",
                                 "redirectUri" => redirectUri."authGoogle.php",
                                 "params" => array( "response_type" => "code",
                                                    "scope" => "https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile")
                                 ),

        );
?>
