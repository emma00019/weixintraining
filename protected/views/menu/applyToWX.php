<?php
function post($url, $jsonData)
{
	$ch = curl_init($url) ;
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonData);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

	$result = curl_exec($ch) ;
	curl_close($ch) ;
	return $result;
}

$data = "{\"button\":[";

$count = 0;//For counting the number of level one menu .
$subCount = 0;//For counting the number of level two menu (sub_menu).
$levelOneMenuCount = 0;

foreach ($models->findAll() as $model) {
	if ($model['tag'] == 1) {
		$levelOneMenuCount ++;
	}
}

foreach ($models->findAll() as $model) 
{
	if ($model['tag'] == 1) 
	{
		$count ++;

		if($model['sub_count'] == 0)
		{
			$data = $data."{
			\"type\":\"click\",
			\"name\":\"".$model['name']."\",
			\"key\":\"".$model['name']."\"
			}";	
		}
		else
		{
			$data = $data."{
							\"name\":\"".$model['name']."\",
							\"sub_button\":[";
			foreach ($models->findAll() as $m) 
			{
				if($m['parent_id'] == $model['id'])
				{
					$data = $data."{
					\"type\":\"view\",
					\"name\":\"".$m['name']."\",
					\"url\":\"http://training0706.augmarketing.com/index.php?r=Login/Index\"
					}";

					$subCount ++;
					$mode = Menu::model()->findByPk($model['id']);
					if($subCount != $mode->sub_count)
					{
						$data = $data.",";
					}
					else
					{
						$subCount = 0;
					}
				}
			}

		    $data = $data."]}";	
		}
	}
	if ($model['tag'] == 1 && $count != $levelOneMenuCount) 
	{
		$data = $data.",";
	}
} 

$data = $data."]}";	

$result = post($url,$data);
print_r($result);

?>