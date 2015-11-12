<?php

class Auth extends Main {


 function getUserInfo($code) {

	$result = false;
    $params = array(
        'client_id'     => $this->idApps,
        'client_secret' => $this->keyApps,
        'redirect_uri'  => $this->redirectUri,
        'grant_type'    => 'authorization_code',
        'code'          => $code
    );
	$url = 'https://accounts.google.com/o/oauth2/token';


    $result = $this->getOpenUrl($url, urldecode(http_build_query($params)));
    $tokenInfo = json_decode($result, true);

    if (isset($tokenInfo['access_token'])) {
      return  $this->getToken($tokenInfo['access_token']);
    }
     return false;

}



 function getToken($token) {
     $params = array(
        'access_token'  => $token
     );
     $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo'.'?'.urldecode(http_build_query($params))), true);
     if(isset($userInfo["id"])) {
       return $this->getValue($userInfo);
     }
     return false;
 }


function getValue($rows) {

  return array( "identity" => (isset($rows["link"])?$rows["link"]:''),
                "uid" => $rows["id"],
                "full_name" => (isset($rows["name"])?$rows["name"]:''),
                "first_name" => (isset($rows["given_name"])?$rows["given_name"]:''),
                "last_name" => (isset($rows["family_name"])?$rows["family_name"]:''),
                "provider" => InitSystem,
                "bdate" => (isset($rows["birthday"])?$rows["birthday"]:''),
                "gender" => (isset($rows["gender"])?$rows["gender"]:''),
                "email" => (isset($rows["email"])?$rows["email"]:''),
                "photo" => (isset($rows["picture"])?$rows["picture"]:'')
                );

}


}

?>
