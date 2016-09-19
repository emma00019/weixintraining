<?php
define("TOKEN", "weixin");//自己定义的token 就是个通信的私钥

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        $this->write_log($echoStr);


        if($this->checkSignature())
        {
            echo $echoStr;
            exit;
        }
        else
        {
            $this->write_log('认证失败');
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token =TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );


        $this->write_log("Signature:".$signature);
        $this->write_log("Timestamp:".$timestamp);
        $this->write_log("Nonce:".$nonce);
        $this->write_log("TmpStr:".$tmpStr);

        if( $tmpStr == $signature )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function write_log($log)
    {
        $keydb ="/home/user/workspace/wx-training-project/log.txt";//php写文本保存的文件名
        $fp=fopen($keydb,"a");//写入方法
        fwrite($fp,$log."\r\n"); //写入数据
        fclose($fp);//关闭写对象
    }
}
?>