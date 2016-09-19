<head>
  <style type="text/css"> 
  .loginForm{
      height: 200px;
  }
  .username{
      margin-left: 280px;
      margin-top:20px;
  }
  .password{
      margin-left: 280px;
      margin-top: 20px;
  }
  .login_button {
      margin-left: 280px;
      margin-top: 20px;
  }
  .input{
      width: 300px;
      height: 30px;
  }
  </style>
</head>
<form class="loginForm" action="index.php?r=Menu/showUserInfo" method="POST">
      <div class="username">
        <input  class="input" placeholder="Please enter your userName" required="" name="username"/>
      </div>
      <div class="password">
        <input type="password" id="password" class="input" placeholder="Please enter your password" required="" name = "password"/>
      </div>
      <div class="">
        <button class="login_button" style="width:300px;" type="submit" translate="site_login">Sign In</button>
      </div>
</form>