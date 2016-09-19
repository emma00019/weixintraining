	<?php
	function httpRequest($url, $params, $postData, $get = true, $httpHeader = array())
    {
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    if ($get) {
	        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
	    } else {
	    	curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
	    }
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);
	    $output = curl_exec($ch);
	    if ($output === false) {
	        $output = '{"error": "error"}';
	    }
	    curl_close($ch);

	    return $output;
    }

	foreach ($xmlResult->children() as $childItem) {
		if ($childItem->getName() == 'FromUserName') {
			$openId = $childItem;
		}
	}
    $url_userInfo = 'https://api.weixin.qq.com/cgi-bin/user/info';
	$access_token = 'SDM4ifsTjTjeFOdgubJZTBg7DiLr7pvrm5_uJC6WGwmBlRe_xcC-xs7_MKrVM-dUNkWXYkmWkkH0QBueJ-BMsHrPQQV0vrcMXVhucxa08bw';
	$params = array(
 		'access_token' =>$access_token,
 		'openid' => (string)$openId,
 		'lang' => 'zh_CN');

	//print_r($params);
	$result=httpRequest(
		$url_userInfo,
     	$params,
     	array(),
     	true,
     	array()
     	);
     print_r($result);die;
    ?>