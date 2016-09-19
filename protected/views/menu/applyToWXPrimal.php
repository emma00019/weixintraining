<?php
function post($url, $jsonData){
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

$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=PyXNxvgtuJt7u_9cuapm0NAFdQfltFMLBl5i5_I2NRLxLUC2NHNSpIMLpnU4dU7tVi6QINhlrMZ0rUzUT0DDKL_EG-dKTPcaqcDUK6HBRGw";
$data = "{
\"button\":[
{
\"type\":\"click\",
\"name\":\"关于我们\",
\"sub_button\":[
{
\"type\":\"click\",
\"name\":\"医院介绍\",
\"key\":\"V1001_01_01\"
},
{
\"type\":\"click\",
\"name\":\"金牌服务\",
\"key\":\"V1001_01_02\"
},
{
\"type\":\"click\",
\"name\":\"最新活动\",
\"key\":\"V1001_01_03\"
},
{
\"type\":\"click\",
\"name\":\"医院地址\",
\"key\":\"V1001_01_04\"
},
{
\"type\":\"click\",
\"name\":\"每日话题\",
\"key\":\"V1001_01_05\"
}]
},
{
\"type\":\"click\",
\"name\":\"会员\",
\"sub_button\":[
{
\"type\":\"click\",
\"name\":\"会员信息\",
\"key\":\"V1001_02_01\"
},
{
\"type\":\"click\",
\"name\":\"星座圈\",
\"key\":\"V1001_02_02\"
},
{
\"type\":\"click\",
\"name\":\"微信墙\",
\"key\":\"V1001_02_03\"
},
{
\"type\":\"click\",
\"name\":\"积分兑换\",
\"key\":\"V1001_02_04\"
}]
},
{
\"type\":\"click\",
\"name\":\"帮助\",
\"sub_button\":[
{
\"type\":\"click\",
\"name\":\"使用帮助\",
\"key\":\"V1001_03_01\"
},
{
\"type\":\"click\",
\"name\":\"最新更新\",
\"key\":\"V1001_03_02\"
}]
}]
}";
$result = post($url,$data);
print_r($result);

?>