<?php

class Auth extends Main {

 var $AddParams = array();

 function getUserInfo($code) {

    $result = false;
    $query = "client_id=".$this->idApps."&client_secret=".$this->keyApps."&code=".$code."&redirect_uri=".urlencode($this->redirectUri);
    $url = 'https://oauth.vk.com/access_token';

    $result = $this->getOpenUrl($url, $query);

    $tokenInfo = json_decode($result, true);

    if (isset($tokenInfo['access_token']) and isset($tokenInfo['user_id'])) {
      $this->AddParams = $tokenInfo;
      return  $this->getToken($tokenInfo['access_token']);
    }
     return false;

}


function getToken($token) {

     $params = array(
        'fields'       => 'nickname,first_name,last_name,nickname,sex,bdate,city,country,photo',
        'uids'  => $this->AddParams["user_id"],
        'access_token'  => $token
     );

     $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get'.'?'.urldecode(http_build_query($params))), true);

     if(isset($userInfo["response"][0]["uid"])) {
       return $this->getValue($userInfo["response"][0]);
     }

     return false;
 }


function getValue($rows) {

  return array( "identity" => InitSystem,
                "uid" => $rows["uid"],
                "full_name" => $rows["first_name"]." ".$rows["last_name"],
                "first_name" => (isset($rows["first_name"])?$rows["first_name"]:''),
                "last_name" => (isset($rows["last_name"])?$rows["last_name"]:''),
                "provider" => InitSystem,
                "bdate" => (isset($rows["bdate"])?$rows["bdate"]:''),
                "gender" => (isset($rows["sex"])?$rows["sex"]:''),
                "email" => (isset($this->AddParams["email"])?$this->AddParams["email"]:''),
                "photo" => ''
                );

}


 function getUser() {
 }



}

?>
