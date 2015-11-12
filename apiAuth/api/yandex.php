<?php

class Auth extends Main {


 function getUserInfo($code) {

    $result = false;

    $params = array(
        'grant_type'    => 'authorization_code',
        'code'          => $code,
        'client_id'     => $this->idApps,
        'client_secret' => $this->keyApps
    );
    $url = 'https://oauth.yandex.ru/token';

    $result = $this->getOpenUrl($url, urldecode(http_build_query($params)));
    $tokenInfo = json_decode($result, true);

    if (isset($tokenInfo['access_token'])) {
      return  $this->getToken($tokenInfo['access_token']);
    }
     return false;

}



 function getToken($token) {
     $params = array(
        'format'       => 'json',
        'oauth_token'  => $token
     );
     $userInfo = json_decode(file_get_contents('https://login.yandex.ru/info'.'?'.urldecode(http_build_query($params))), true);
     if(isset($userInfo["id"])) {
       return $this->getValue($userInfo);
     }
     return false;
 }


function getValue($rows) {

  return array( "identity" => InitSystem,
                "uid" => $rows["id"],
                "full_name" => (isset($rows["real_name"])?$rows["real_name"]:''),
                "first_name" => (isset($rows["first_name"])?$rows["first_name"]:''),
                "last_name" => (isset($rows["last_name"])?$rows["last_name"]:''),
                "provider" => InitSystem,
                "bdate" => (isset($rows["birthday"])?$rows["birthday"]:''),
                "gender" => (isset($rows["sex"])?$rows["sex"]:''),
                "email" => (isset($rows["default_email"])?$rows["default_email"]:''),
                "photo" => (isset($rows["default_avatar_id"])?$rows["default_avatar_id"]:'')
                );

}



}

?>
