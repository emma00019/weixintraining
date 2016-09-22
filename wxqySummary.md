## 关于选择自己开发应用和第三方应用
- 如果你在开发对接自己的企业号、或在定制化开发对接客户的企业号，那么不需要关心sass套件接口；也就是如果定制化开发没有第三方使用，我们选择自己添加应用自己开发。
- 如果想要多个企业使用那么我们应该开发应用套件。
- sass套件开发流程
    - 注册并认证企业号->申请成为服务商->开发套件和应用->发布套件和应用->套件和应用被推荐
    - 也就是我们需要是认证过的企业号，然后申请成为开发商，然后开发套件和应用，最后发布。需要使用我们套件里面应用的企业号，授权给我们套件里面的应用，授权完成后，我们保存该企业号中的相关信息
        如果一个企业号中有订单生成，推送事件到我们指定的url里，我们根据企业号得到企业相关信息，然后发送消息。
## 企业号和公众号的区别
    - 注：
        - unauthorized subscription number 未认证订阅号
        - authorized service nunber 认证服务号
        - unsub:未认证订阅号
        - sub:认证订阅号
        - unser:未认证服务号
        - ser:认证服务号
        - 没有【】注释的代表都有权限，有【】注释的只有在【】中的才有该权限<br/>
    - 公众号接口的权限说明：
        1.基础支持-获取access_token <br/>
        2.基础支持-获取微信微信服务器IP地址 <br/>
        3.接收消息-验证消息真实性、接收普通消息、接收事件推送、接收语音识别结果 <br/>
        4.发送消息-被动回复消息 <br/>
        5.发送消息-客服接口【sub|unser|ser】 <br/>
        6.发送消息-群发接口【sub|ser】
        7.发送消息-模板消息接口（发送业务通知）【ser】 <br/>
        8.用户管理-用户分组管理【sub|ser】 <br/>
        9.用户管理-设置用户备注名【sub|ser】
        10.用户管理-获取用户基本信息【sub|ser】 <br/>
        11.用户管理-获取用户列表【sub|ser】 <br/>
        12.用户管理-获取用户地理位置【ser】 <br/>
        13.用户管理-网页授权获取用户openid/用户基本信息【ser】 <br/>
        14.推广支持-生成参数二维码【ser】 <br/>
        15.推广支持-长链接转短链接接口【ser】 <br/>
        16.界面丰富-自定义菜单【sub|unser|ser】 <br/>
        17.素材管理-素材管理接口【sub|ser】 <br/>
        18.智能接口-语义理解接口【ser】 <br/>
        19.多客服-获取多客服消息记录、客服管理【ser】 <br/>
        20.微信支付接口【ser需申请】 <br/>
        21.微信小店接口【ser需申请】 <br/>
        22.微信卡券接口【sub需申请|ser需申请】 <br/>
        23.微信设备功能接口【ser需申请】 <br/>
        24.微信JS-SDK-基础接口 <br/>
        25.微信JS-SDK-分享接口【sub|ser】 <br/>
        26.微信JS-SDK-图像接口 <br/>
        27.微信JS-SDK-音频接口 <br/>
        28.微信JS-SDK-智能接口（网页语音识别） <br/>
        29.微信JS-SDK-设备信息 <br/>
        30.微信JS-SDK-地理位置 <br/>
        31.微信JS-SDK-界面操作 <br/>
        32.微信JS-SDK-微信扫一扫 <br/>
        33.微信JS-SDK-微信小店【ser】【企业号没有】 <br/>
        34.微信JS-SDK-微信卡券【sub|ser】 <br/>
        35.微信JS-SDK-微信支付【ser】【企业号没有】 <br/>
    - 公众号接口包括（18个）：
        1.获取接口调用凭据 <br/>
        2.接收消息 <br/>
        3.发送消息 <br/>
        4.消息加解密 <br/>
        5.素材管理 <br/>
        6.用户管理 <br/>
        7.自定义菜单管理 <br/>
        8.账号管理 <br/>
        9.数据统计 <br/>
        10.微信小店 <br/>
        11.微信卡券 <br/>
        12.微信门店 <br/>
        13.微信智能接口 <br/>
        14.微信设备功能 <br/>
        15.微信多客服功能 <br/>
        16.微信周边摇一摇 <br/>
        17.微信连Wi-Fi <br/>
        18.微信JS-SDK接口
    - 企业号接口包括（17个）：
        1.认证接口-身份认证 <br/>
        2.认证接口-成员登录授权 <br/>
        3.认证接口-单点登录授权 <br/>
        4.资源接口-管理企业号应用 <br/>
        5.资源接口-自定义菜单 <br/>
        6.资源接口-管理通讯录 <br/>
        7.资源接口-管理素材文件 <br/>
        8.能力接口-发消息 <br/>
        9.能力接口-发送消息与事件 <br/>
        10.能力接口-会话服务 <br/>
        11.能力接口-客服服务 <br/>
        12.能力接口-企业号微信支付 <br/>
        13.能力接口-摇一摇周边 <br/>
        14.能力接口-卡券服务 <br/>
        15.Sass套件接口-第三方应用授权 <br/>
        16.Sass套件接口-管理后台单点登录 <br/>
        17. 微信JS-SDK 接口

        ```
            1.微信JS-SDK-基础接口
            2.微信JS-SDK-企业号
            3.微信JS-SDK-分享接口
            4.微信JS-SDK-图像接口
            5.微信JS-SDK-音频接口
            6.微信JS-SDK-智能接口
            7.微信JS-SDK-设备信息
            8.微信JS-SDK-地理位置
            9.微信JS-SDK-界面操作
            10.微信JS-SDK-微信扫一扫
            11.微信JS-SDK-微信卡券
        ```

# 主要接口的区别
## 获取用户信息
    ### URL
        - 公众号
            **GET** https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN
        - 企业号
            - 获取code
                https://open.weixin.qq.com/connect/oauth2/authorize?appid=CORPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect
            - 根据code获取成员信息
                **GET** https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token=ACCESS_TOKEN&code=CODE
    ### 返回值
        - 公众号

            ```
                {
                    "subscribe": 1,
                    "openid": "o6_bmjrPTlm6_2sgVt7hMZOPfL2M",
                    "nickname": "Band",
                    "sex": 1,
                    "language": "zh_CN",
                    "city": "广州",
                    "province": "广东",
                    "country": "中国",
                    "headimgurl":    "http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0",
                   "subscribe_time": 1382694957,
                   "unionid": " o6_bmasdasdsad6_2sgVt7hMZOPfL"
                   "remark": "",
                   "groupid": 0
                }
            ```

        - 企业号

            ```
            企业成员：
            {
               "UserId":"USERID",
               "DeviceId":"DEVICEID"
            }
            非企业成员：
            {
               "OpenId":"OPENID",
               "DeviceId":"DEVICEID"
            }
        ```

## 发送消息
    ### 公众号
    - 公众号发送消息包括：
        被动回复接口 <br/>
        客服接口 <br/>
        群发接口 <br/>
        模板消息接口 <br/>
    - 被动回复消息
        - 当用户发消息给公众号时，会产生一个post请求，开发者可以在响应包中返回特定XML结构，来对该消息进行响应。严格说，发送被动响应消息其实并不是一种接口，而是对微信服务器发过来消息的一次回复
        - 现支持回复文本、图片、语音、视频、音乐、图文
    - 客服接口
        - 当用户主动发消息给公众号的时候（包括发送消息，点击自定义菜单，订阅事件，扫描二维码事件，支付成功事件，用户维权），微信将会把消息数据推送给开发者，开发者在一段时间内可以调用客服消息接口，通过POST一个JSON数据包来发送消息给普通用户，在48小时内不限制发送次数，此接口主要用于客服等人工消息处理环节的功能。
        - 接口调用
            **POST** https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN <br/>
            json数据包如：

                ```
                文本消息
                    {
                        "touser":"OPENID",
                        "msgtype":"text",
                        "text":
                        {
                             "content":"Hello World"
                        }
                    }
                ```
    - 群发接口
        - 在公众平台网站上，为订阅号提供每天一条的群发权限，为服务号提供每月（自然月）4条的群发权限。而对于某些具备开发能力的公众号运营者，可以通过高级群发接口，实现更多的群发能力。
        - 需要注意的内容：
            1.对于认证订阅号，群发接口每天可成功调用1次，此次群发可选择发送给全部用户或某个分组； <br/>
            2.对于认证服务号虽然开发者使用高级群发接口每日限制调用100次，但是每个用户每月只能接收4条，无论在公众平台网站上，还是使用接口群发，用户每月只能接收4条群发消息，多于4条的群发将对该用户发送失败； <br/>
            3.具备微信支付权限的公众号，在使用群发接口上传、群发图文消息类型时，可使用<a>标签加入外链； <br/>
            4.开发者可以使用预览接口校对消息样式和排版，通过预览接口可发送编辑好的消息给指定用户校验效果。
        - 群发图文消息的过程：
            1.首先，预先将图文消息中需要用到的图片，使用上传图文消息内图片接口，上传成功并获得图片Url <br/>
            2.上传图文消息素材，需要用到图片时，使用上一步获取的图片url <br/>
            3.使用对用户分组的群发，或对OpenID列表的群发，将图文消息群发出去 <br/>
            4.在上述过程中，如果需要，还可以预览图文消息、查询群发状态、或删除已群发的消息等
        - 群发图片、文本等其他消息类型过程：
            1. 如果是群发文本消息，则直接根据下面的接口说明进行群发即可 <br/>
            2. 如果是群发图片、视频等消息，则需要预先通过素材管理接口准备好mediaID
        - 根据分组进行群发【订阅号与服务号认证后均可用】
            **POST** https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=ACCESS_TOKEN

            ```
                post数据说明，以文本为例
                    {
                       "filter":{
                          "is_to_all":false
                          "group_id":"2"
                       },
                       "text":{
                          "content":"CONTENT"
                       },
                        "msgtype":"text"
                    }

            ```

        - 根据OpenID列表群发【订阅号不可用，服务号认证后可用】
            **POST** https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=ACCESS_TOKEN

            ```
                post 数据说明 以文本为例
                {
                   "touser":[
                    "OPENID1",
                    "OPENID2"
                   ],
                    "msgtype": "text",
                    "text": { "content": "hello from boxer."}
                }
            ```
    - 模板消息接口
        - 只有认证后的服务号才可以申请模板消息的使用权限并获得改权限

    ### 企业号
        **POST** https://qyapi.weixin.qq.com/cgi-bin/message/send?access_token=ACCESS_TOKEN

        - 消息型应用支持文本、图片、语音、视频、文件、图文等消息类型。主页型应用只支持文本消息类型，且文本长度不超过20个字

        - 权限说明
            收件人必须处于应用的可见范围内，并且管理组对应用有使用权限、对收件人有查看权限，否则本次调用失败
        - 返回结果
            如果无权限或收件人不存在，则本次发送失败；如果为关注，发送仍然执行。两种情况下均返回无效的部分

            ```
                {
                   "errcode": 0,
                   "errmsg": "ok",
                   "invaliduser": "UserID1",
                   "invalidparty":"PartyID1",
                   "invalidtag":"TagID1"
                }
            ```
        - 具体的消息类型及数据格式参考下面的url
            http://qydev.weixin.qq.com/wiki/index.php?title=%E6%B6%88%E6%81%AF%E7%B1%BB%E5%9E%8B%E5%8F%8A%E6%95%B0%E6%8D%AE%E6%A0%BC%E5%BC%8F
            - 如文本型
                ```
                    {
                       "touser": "UserID1|UserID2|UserID3",
                       "toparty": " PartyID1 | PartyID2 ",
                       "totag": " TagID1 | TagID2 ",
                       "msgtype": "text",
                       "agentid": 1,
                       "text": {
                           "content": "Holiday Request For Pony(http://xxxxx)"
                       },
                       "safe":0
                    }
                ```
                参数列表：
                    | 参数 | 必须 | 说明 |
                    | --- | --- | --- |
                    | touser | 否 | 成员ID列表（消息接收者，多个接收者用'|'分割，最多支持1000个。特殊情况：指定为@all,则向关注该企业应用的全部成员发送） |
                    | toparty | 否 | 部门ID列表，多个接收者用'|'分割，最多支持100个。当touser为@all时忽略本参数 |
                    | totag | 否｜ 部门ID列表，多个接收者用'|'分割，最多支持100个。当touser为@all时忽略本参数 |
                    | msgtype | 是 | 消息类型 |
                    | agentid | 是 ｜　企业应用id，整形。可在应用的设置页面查看|
                    | content | 是 | 消息内容，最长不超过2038个字节，注意：主页型应用推送的文本消息在微信端最多只显示20个字（包含中英文）
                    | safe | 否 | 表示是否是保密消息，0表示否，1表示是，默认0 |

## 微信支付
    ### 公众号
        - 微信支付接口需要是认证的服务号进行申请
        - 支付方式包括：
            刷卡支付【用户打开微信钱包的刷卡的截面，商户扫码后提交完成支付】
            公众号支付【用户在微信内进入商家H5页面，页面内调用JSSDK完成支付】
            扫码支付【用户打开“微信扫一扫”，扫描商户的二维码后完成支付】
            App支付【商户APP中集成SDK，用户点击后跳转到微信内完成支付】
    ### 企业号
        - 开通微信支付后，企业号将拥有面向微信用户付款、收款等能力。包括：
            - 支付
                微信用户可以对企业进行付款，所付款项将进入企业号所关联的商户号中
            - 红包及企业转账
                企业通过微信红包，或微信转账的形式，使用企业号对成员进行付款

        - 企业号微信支付支持三种支付方式
            刷卡支付【用户打开微信钱包的刷卡的界面，商户扫码后提交完成支付】<br/>
            公众号支付【用户在微信内进入商家H5页面，页面内调用JSSDK完成支付】<br/>
            扫码支付【用户打开“微信扫一扫”，扫描商户的二维码后完成支付】<br/>

        - 在接口使用上，企业号与服务号、订阅号有所区别：
            1.由于企业号标识内部成员使用的是userid,因此在使用微信支付下单时，需要调用（userid转换openid接口），将userid转换成openid进行支付。在调用支付下单接口时，APPID使用企业号corpid。<br/>
            2.如需让企业号成员外的用户进行微信支付，请使用企业号（ OAuth2验证接口），若获取不到userid,即当前微信用户不在企业号，则会返回该用户对应企业号的openid

        - 微信现金红包/企业付款
            - 前提是企业号已经开通了微信支付
            - 微信现金红包
                - 在确认使用微信红包前需要：
                    1.确定需要发放红包的企业号应用和成员名单<br/>
                    2.使用企业号（uerid转openid）,将应用ID和成员userid转换成红包参数中要求的appid和openid<br/>
                    note: 在使用userid转openid接口时，务必传agentid来获取对应的appid，否则会导致红包发送失败

                - 获得了appid和openid之后，就可以通过下面两种方式给企业号成员发放微信红包：
                    - 登录（微信支付商户平台）选择现金红包进行发放；
                    - 通过微信现金红包接口进行发送

            - 企业付款
                企业付款是微信支付听哦那个给企业向普通个人用户转账的功能。其能支持单笔交易金额远大于微信红包，且无需用户领取，直接存到用户的微信零钱包里。
                    - 在使用企业号企业付款功能前，需要进行参数转换
                        1.确定需要企业付款的成员；<br/>
                        2.调用（userid转openid），将成员userid转换成openid<br/>
                        note:在使用userid转openid接口时，无需传参agentid，在使用企业付款时appid即为企业号的corpid
                    - 使用corpid和openid之后，就可以通过下面的两种方式给企业号成员进行企业付款
                        - 登录（微信支付商户平台）进行企业付款
                        - 通过企业付款接口进行付款

## 二维码
    ### 公众号
        - 有两种类型的二维码：
            临时二维码：有过期时间，最长可以设置为在二维码生成后的30天后过期，但能够生成较多数量。临时二维码主要用于账号绑定等不要求二维码永久保存的业务场景 <br/>
            永久二维码：无过期时间的，但数量较少（目前为最多10万个）。永久二维码主要用于使用于账号绑定、用户来源统计等场景
        - 获取带参数的二维码的过程包括两步，首先创建二维码ticket，然后凭借ticket到指定url换取二维码
            - 创建二维码ticket

                ```
                    临时二维码：
                    http请求方式: POST
                    URL: https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=TOKEN
                    POST数据格式：json
                    POST数据例子：{"expire_seconds": 604800, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": 123}}}
                ```

                ```
                    永久二维码：
                        http请求方式: POST
                        URL: https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=TOKEN
                        POST数据格式：json
                        POST数据例子：{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": 123}}}
                        或者也可以使用以下POST数据创建字符串形式的二维码参数：
                        {"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": "123"}}}
                ```

                | 参数 | 说明 |
                | --- | --- |
                |expire_seconds| 该二维码有效时间，以秒为单位，最大不超过2592000（即30天），此字段如果不填，则默认有效值为30秒|
                |action_name|二维码类型,QR_SCENE为临时，QR_LIMIT_SCENE为永久，QR_LIMIT_STR_SCENE为永久的字符串参数值|
                |action_info|二维码详细信息|
                |scene_id|场景值ID，临时二维码时为32位非0整形，永久二维码时最大值为100000（目前参数只支持1--100000）|
                |scene_str|场景值ID（字符串形式的ID），字符串类型，长度限制为1到64，仅永久二维码支持此字段|

            - 通过ticket换取二维码

                ```
                    HTTP GET请求（请使用https协议）
                    https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=TICKET
                    提醒：TICKET记得进行UrlEncode
                ```
    ### 企业号
        - 企业号没有创建二维码接口
