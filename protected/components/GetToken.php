<?php
class GetToken
{
	public function commonHttpRequest($url,$params)
	{
		$ch = curl_init();

	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
	    $output = curl_exec($ch);

	    if ($output === false) {
	        $output = '{"error": "error"}';
	    }

	    curl_close($ch);

	    return $output;
	}

	public function getTokenFromWechat()
	{
        $url_token = Yii::app()->params['getTokenUrl'];
		$params = array(
	 		'grant_type' =>Yii::app()->params['grant_type'],
	 		'appid' => Yii::app()->params['appid'],
	 		'secret' => Yii::app()->params['secret']);

		$commonToken = $this->commonHttpRequest($url_token,$params);

		return $commonToken;
	}

	public function getTokenFromCache()
	{
		$value=Yii::app()->cache->get('access_token');

		if($value===false)
		{
			$access_token = $this->getTokenFromWechat();
			$decodeToken = json_decode($access_token,true);
			Yii::app()->cache->set('access_token', $decodeToken['access_token'], 7080);
		}

		return Yii::app()->cache->get('access_token');
	}

	public function getWebAuthorizationToken($code)
	{
        $url = Yii::app()->params['WebAuthorizationTokenUrl'];
		$params = array(
	 		'appid' => Yii::app()->params['appid'],
	 		'secret' => Yii::app()->params['secret'],
	 		'code' => $code,
	 		'grant_type' => "authorization_code"
	 		);

		$WebAuthorizationToken = $this->commonHttpRequest($url,$params);

	    return $WebAuthorizationToken;
	}

	public function refreshWebAuthorizationToken($refresh_token)
	{
        $url = Yii::app()->params['refreshWebTokenUrl'];
		$params = array(
	 		'appid' => Yii::app()->params['appid'],
	 		'grant_type' => "refresh_token",
	 		'refresh_token'=>$refresh_token
	 		);

		$WebAuthorizationToken = $this->commonHttpRequest($url,$params);

	    return $WebAuthorizationToken;
	}

	public function verifyWebAuthorizationToken($access_token,$openid)
	{
        $url = Yii::app()->params['verifyWebTokenUrl'];

		$params = array(
	 		'access_token' => $access_token,
	 		'openid' => $openid
	 		);

		$json = $this->commonHttpRequest($url,$params);

		$jsonDecode= json_decode($json,true);

		$result = $jsonDecode['errmsg'];

	    return $result;
	}

	public function getUserInfoThroughWebAuthorization($access_token,$openid)
	{
        $url = Yii::app()->params['getUserInfoThroughWebAuthorizationUrl'];
		$params = array(
	 		'access_token' => $access_token,
	 		'openid' => $openid,
	 		'lang' => 'zh_CN'
	 		);

		$userInfo= $this->commonHttpRequest($url,$params);

	    return $userInfo;
	}
}
?>
