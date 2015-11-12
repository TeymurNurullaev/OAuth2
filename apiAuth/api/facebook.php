<?php

class Auth extends Main {


 function getUserInfo($code) {

    $result = false;
    $query = "client_id=".$this->idApps."&redirect_uri=".urlencode($this->redirectUri)."&client_secret=".$this->keyApps."&code=".$code;
    $url = 'https://graph.Facebook.com/oauth/access_token';
    $result = $this->getOpenUrl($url, $query);

    parse_str($result,$tokenInfo);

    if (isset($tokenInfo['access_token'])) {
      return  $this->getToken($tokenInfo['access_token']);
    }
     return false;

}

 function getToken($token) {

     $params = array(
        'fields'       => 'email,name,first_name,last_name,birthday,gender,locale,link',
        'access_token'  => $token
     );
     $userInfo = json_decode(file_get_contents('https://graph.Facebook.com/me'.'?'.urldecode(http_build_query($params))), true);

     if(isset($userInfo["id"])) {
       return $this->getValue($userInfo);
     }
     
     return false;
 }


function getValue($rows) {

  return array( "identity" => (isset($rows["link"])?$rows["link"]:''),
                "uid" => $rows["id"],
                "full_name" => (isset($rows["name"])?$rows["name"]:''),
                "first_name" => (isset($rows["first_name"])?$rows["first_name"]:''),
                "last_name" => (isset($rows["last_name"])?$rows["last_name"]:''),
                "provider" => InitSystem,
                "bdate" => (isset($rows["birthday"])?$rows["birthday"]:''),
                "gender" => (isset($rows["gender"])?$rows["gender"]:''),
                "email" => (isset($rows["email"])?$rows["email"]:''),
                "photo" => ''
                );

}


}

?>
