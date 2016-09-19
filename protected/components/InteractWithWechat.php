<?php
class InteractWithWechat
{
    public function httpRequest($url, $params, $postData, $get = true, $httpHeader = array())
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

    public function CombineXmlMessage($followerId, $developId, $content)
    {
        $result = 
        "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[%s]]></Content>
        </xml>";
        
        $message = sprintf($result,$followerId,$developId,time(),$content);
        
        return $message;
    }

    //图文消息XML格式生成
    public function CombineXmlNews($xmlResult, $content)
    {
        if(!is_array($content)){
            return "";
        }
        $itemTpl = "<item>
                        <Title><![CDATA[%s]]></Title>
                        <Description><![CDATA[%s]]></Description>
                        <PicUrl><![CDATA[%s]]></PicUrl>
                        <Url><![CDATA[%s]]></Url>
                    </item>
                   ";
        $item_str = "";
        foreach ($content as $item){
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }

        $articleCount = count($content);
        $followerId = $xmlResult['FromUserName'];
        $developId = $xmlResult['ToUserName'];
        $time=time();

        $xmlTpl = "<xml>
                    <ToUserName><![CDATA[$followerId]]></ToUserName>
                    <FromUserName><![CDATA[$developId]]></FromUserName>
                    <CreateTime>$time</CreateTime>
                    <MsgType><![CDATA[news]]></MsgType>
                    <ArticleCount>$articleCount</ArticleCount>
                    <Articles>$item_str</Articles>
                  </xml>";
        return $xmlTpl;
    }

}
?>