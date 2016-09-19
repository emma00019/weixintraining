<?php
class FollowerController extends Controller
{
    public $layout='//layouts/column2';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function actionReceive() {
        $wechatObj = new qyWechatCallbackApi();
        $wechatObj->valid();
    }

    public function actionReceiveTest()
    {
        // $wechatObj = new wechatCallbackapiTest();
        // $wechatObj->valid();

        $model = new InteractWithWechat();
        //Receive the xml data
        $fileContent = $GLOBALS["HTTP_RAW_POST_DATA"];
        //change xml to simple xml object
        $xmlResult= (array)simplexml_load_string($fileContent,
        'SimpleXMLElement', LIBXML_NOCDATA);

        $sceneIdStart = intval(Yii::app()->params['sceneIdStart'], 10);

        //foreach every item
        $followerId = $xmlResult['FromUserName'];
        $developId = $xmlResult['ToUserName'];
        $msgType = $xmlResult['MsgType'];

        switch ($msgType) {
            case 'event':
                switch ($xmlResult['Event']) {
                    case 'subscribe':
                        $followerModel = Follower::model()->find('openid=:openid',array(':openid'=>$followerId));

                        if($followerModel == null)
                        {
                            $followerModel = new Follower();
                            $newFollower = $followerModel->getFollowerInfromation($followerId);

                            if ($newFollower['subscribe'] == "1")
                            {
                                $followerModel->subscribe = "已关注";
                            }
                            else
                            {
                                $followerModel->subscribe = "未关注";
                            }

                            $followerModel->openid = $newFollower['openid'];
                            $followerModel->nickname = $newFollower['nickname'];

                            if($newFollower['sex'] == "0")
                            {
                                $followerModel->gender = "未知";
                            }
                            else if($newFollower['sex'] == "2")
                            {
                                $followerModel->gender = "女";
                            }
                            else
                            {
                                $followerModel->gender = "男";
                            }

                            $followerModel->language = $newFollower['language'];
                            $followerModel->city = $newFollower['city'];
                            $followerModel->province = $newFollower['province'];
                            $followerModel->country = $newFollower['country'];
                            $followerModel->headimgurl = $newFollower['headimgurl'];
                            $followerModel->subscribe_time = time();
                            $followerModel->remark = $newFollower['remark'];
                            $followerModel->groupid = $newFollower['groupid'];

                            if(isset($newFollower['unionid']))
                            {
                                $followerModel->unionid = $newFollower['unionid'];
                            }

                            $followerModel->save();

                            $mess = "Thanks for your subscribe! Happy every day!";
                            echo $model->CombineXmlMessage($followerId,$developId,$mess);
                        }
                        break;
                    case 'unsubscribe':
                        $followerModel = Follower::model()->find('openid=:openid',array(':openid'=>$followerId));
                        Follower::model()->findByPk($followerModel['id'])->delete();
                        break;
                    case 'VIEW':
                        //点击菜单跳转链接时的事件推送
                        break;
                    case 'SCAN':
                        //用户已关注时的事件推送
                        $eventKey = $xmlResult['EventKey'];
                        $content = array();
                        $qrcodes = QrcodeMaterial::model()->findAllBySql("select distinct scene_str from tbl_qrcode_material");
                        foreach($qrcodes as $qrcode){
                            if ($eventKey == $qrcdoe['scene_str']) {
                                $qr_materails = QrcodeMaterial::model()->findAllBySql("select * from tbl_qrcode_material where scene_str = :name",array(':name'=>$qrcode['scene_str']));
                                foreach($qr_materials as $qr_material){
                                    $material = Material::model()->findBySql("selcet * from tbl_material where id = :id",array(':id'=>$qr_material['material_id']));
                                    $content[] = array("Title"=>$material['title'],
                                                       "Description"=>$material['desc'],
                                                       "PicUrl"=>$material['picUrl'],
                                                       "Url" =>$material['url']);

                                }
                            }
                        }
                        echo $model->CombineXmlNews($xmlResult, $content);
                        break;
                    case 'LOCATION':
                        //上报地理位置事件
                        break;
                    case 'CLICK':
                        //点击菜单拉取消息时的事件推送
                        $content = array();
                        switch ($xmlResult['EventKey'])
                        {
                            case "美食新闻":
                                $content[] = array("Title"=>"带你去享受美食乐趣",
                                                   "Description"=>"",
                                                   "PicUrl"=>"http://www.uimaker.com/uploads/allimg/130322/1_130322102621_2.jpg",
                                                   "Url" =>"http://jd.989291.com/misade/");
                                $content[] = array("Title"=>"舌尖上的中国",
                                                   "Description"=>"",
                                                   "PicUrl"=>"http://www.mysj777.com/UploadFiles/20141616211744307.jpg",
                                                   "Url" =>"http://www.mysj777.com/");
                                $content[] = array("Title"=>"台湾美食",
                                                   "Description"=>"",
                                                   "PicUrl"=>"http://h.hiphotos.baidu.com/baike/c0%3Dbaike80%2C5%2C5%2C80%2C26/sign=57873f9749086e067ea5371963611091/8435e5dde71190ef99d83179cb1b9d16fdfa6071.jpg",
                                                   "Url" =>"http://shop.chunstore.com/");
                                echo $model->CombineXmlNews($xmlResult, $content);
                                break;
                            case "今日头条":
                                $content[] = array("Title"=>"微软、小米和乐视的品牌延伸危机",
                                                   "Description"=>"",
                                                   "PicUrl"=>"http://b.hiphotos.baidu.com/news/w%3D638/sign=7e6f1f58982f07085f052903d125b865/3c6d55fbb2fb4316949b776d26a4462309f7d325.jpg",
                                                   "Url" =>"http://zengtao.baijia.baidu.com/article/112425");
                                $content[] = array("Title"=>"中国人的羊性和日本人的狼性",
                                                   "Description"=>"",
                                                   "PicUrl"=>"http://e.hiphotos.baidu.com/news/crop%3D0%2C0%2C1547%2C1547%3Bw%3D638/sign=ce3c8315d2ca7bcb69349d6f83394753/500fd9f9d72a6059991f5bcc2d34349b023bbadd.jpg",
                                                   "Url" =>"http://liguangdou.baijia.baidu.com/article/106657");
                                $content[] = array("Title"=>"无人机带领程序员进入新开发者时代",
                                                   "Description"=>"",
                                                   "PicUrl"=>"http://f.hiphotos.baidu.com/news/crop%3D0%2C0%2C1081%2C649%3Bw%3D638/sign=ca113bde1c4c510fba8bb85a5d69091d/1c950a7b02087bf44784b2fff4d3572c11dfcfb8.jpg",
                                                   "Url" =>"http://zhutiqu.baijia.baidu.com/article/112113");
                                echo $model->CombineXmlNews($xmlResult, $content);
                                break;
                            case "扫描二维码":
                                $content = array();
                                $content[] = array("Title"=>"点击扫描二维码",
                                                   "Description"=>"",
                                                   "PicUrl"=>"http://img4.imgtn.bdimg.com/it/u=2659806443,1632006785&fm=21&gp=0.jpg",
                                                   "Url" =>"http://news.haiwainet.cn/n/2015/0723/c3541083-28972666.html ");
                                echo $model->CombineXmlNews($xmlResult, $content);
                                break;
                            default:
                                echo $model->CombineXmlMessage($followerId,$developId,"点击菜单：".$xmlResult['EventKey']);
                                break;
                        }
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            case 'text':
                $content = $xmlResult['Content'];
                $keyWordModel = KeyWord::model()->findBySql("select * from tbl_keyWord where keyWord  like :name",array(':name'=>'%'.$content.'%'));
                $answer = $keyWordModel['answer'];
                if (empty($answer)){
                    $answer = "对不起,暂时无法为您提供服务~";
                }
                echo $model->CombineXmlMessage($followerId,$developId,$answer);
                break;
            case 'image':
                //图片消息
                break;
            case 'voice':
                //语音消息
                break;
            case 'video':
                //视频消息
                break;
            case 'shortvideo':
                //小视频消息
                break;
            case 'location':
                //地理位置消息
                break;
            case 'link':
                //链接消息
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $model = new InteractWithWechat();
        $getToken = new GetToken();
        $params = array(
             'access_token' =>$getToken->getTokenFromCache()
             );

        $result=$model->httpRequest(
        Yii::app()->params['getFollowerListUrl'],
         $params,
         array(),
         true,
         array()
         );
         $result = json_decode($result,true);

         $models = $result['data']['openid'];


        $this->render('index',array(
            'models'=>$models
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionView()
    {
         //$model = new InteractWithWechat();
         $openid = Yii::app()->request->getParam('openid');
         //$result = $model->getFollowerInfromation($openid);

        $model = Follower::model()->find('openid=:openid',array(':openid'=>$openid));

        $this->render('view',array(
            'model'=>$model
        ));
    }

    public function loadModel($id)
    {
        $model=Follower::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionCreate()
    {
        $model=new Follower;
        //print_r("begin create");
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Follower']))
        {
            $model->attributes=$_POST['Follower'];
            //var_dump("begin save");
            if($model->save())
            {
                //var_dump("save");
                $this->redirect(array('view','id'=>$model->id));
            }
            //var_dump("end save");
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
}
