<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="/css/userLogin.css">
</head>
<form class="loginForm" action="index.php?r=Login/showFollowerInfo" method="POST">
    <div><img class="tag" src="http://img.sccnn.com/bimg/337/23209.jpg"></div>
    <div class="username">
      <input class="input" value="<?php echo $openid?>" name="openid" style="display:none">
      <label class="label">用户名:</label>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input onfocus="clearErrorMsg()"  class="input" placeholder="Please enter your userName" required="" name="username">
    </div>
    <div class="password">
      <label class="label">密&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input onfocus="clearErrorMsg()" type="password" id="password" class="input" placeholder="Please enter your password" required="" name = "password" >
    </div>
    <div class="div_errorMsg">
    <label class ="label errorMsg" id = "errorMsg">
      <?php
        if(!empty($msg))
        {
            echo $msg;
        }
      ?>
    </label>
      <button class="login_button" style="width:232px;" type="submit" translate="site_login">登&nbsp;&nbsp;&nbsp;录</button>
    </div>
</form>
<script src="/../../../js/jquery-1.10.2.js" ></script>
<script type="text/javascript">
  function clearErrorMsg()
  {
    document.getElementById('errorMsg').style.display= "none";
  }
</script>
