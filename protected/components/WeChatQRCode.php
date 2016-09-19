<?php 
 
    class WeChatQRCode 
    {

        public function generateQRCode($str)
        {
            $model = new GetToken();
            $access_token = $model->getTokenFromCache();
            $url = Yii::app()->params['getQRCodeUrl'].$access_token;
            $urlArray = array();

            //生成永久二维码
            $qrcode = '{"action_name": "QR_LIMIT_STR_SCENE",
                        "action_info": {
                            "scene": {
                                "scene_str": '.$str.' }}}';
            //生成临时二维码
            //$qrcode = '{"expire_seconds": 604800, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": 123}}}';
            
            $result = $this->https_post($url, $qrcode);
            $jsonResult = json_decode($result);
            $ticket = urlencode($jsonResult->ticket);
            $showQRCodeUrl = Yii::app()->params['showQRCodeUrl'].$ticket;
        
            return $showQRCodeUrl;
        }    

        public function https_post($url, $data)
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            if (!empty($data)) {
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($curl);
            curl_close($curl);
            return $output;
        }

        //使用CURL获取图片的所有信息
        public function downloadImage($url)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_NOBODY, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  //跳过SSL证书检查(服务器所在机房无法验证SSL证书)
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  //检查服务器SSL证书中是否存在一个公用名(common name)
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $package = curl_exec($ch);
            $httpinfo = curl_getinfo($ch);  //获取curl连接资源句柄的信息
            curl_close($ch);
            return array_merge(array('body' => $package), array('header' => $httpinfo));
        }

        public function saveQRCodeImage()
        {
            $imageInfo = $this->downloadImage($this->generateQRCode());
            $filename = "qrcode.jpg";
            $local_file = fopen($filename, "w");

            if (false !== $local_file){
                if (false !== fwrite($local_file, $imageInfo['body'])){
                    fclose($local_file);
                }
            }
        }
    }