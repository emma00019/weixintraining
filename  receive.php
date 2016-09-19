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

/*	foreach ($xmlResult->children() as $childItem) {
		if ($childItem->getName() == 'FromUserName') {
			$OPENID = $childItem;
		}
	}*/
			//echo $OPENID;
    $url = 'https://api.weixin.qq.com/cgi-bin/user/info';
	$ACCESS_TOKEN = 'FcLpceO480aXRLkskbiOtAcmSuVtE7XTpSH3nuZ4iaeXT5wmLNrcRzsu1jT9OX3Za5SlAQLcROFSzH7Q1N6KSyh-pKlptvJpdVooXkw3hAU';
	$OPENID = 'ovIYqwNwuZGafU9paPydSoMjxjPw';
	$params = array(
     		'access_token' =>$ACCESS_TOKEN,
     		'openid' => $OPENID,
     		'lang' => 'zh_CN');
	$result=httpRequest($url,
     	$params,
     	array(),
     	true,
     	array()
     	);
     print_r($result);
    ?>