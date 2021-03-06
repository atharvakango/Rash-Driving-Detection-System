<?php
require 'http://localhost/Project1/begining/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/php-tutorial-e893d-firebase-adminsdk-hk12l-124051df9e.json');
  if(isset($_POST['go']))
  {
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
    $database = $firebase->getDatabase();
    $reference = $database->getReference('user/login');
    $snapshot=$reference->getSnapshot();
    echo gettype($snapshot);
  }

 ?>

<html>
<head>
	<title>Welcome to Alpha Technologies</title>
  <style>


.login {
  margin: 20px auto;
  width: 300px;
  padding: 30px 25px;
  background: white;
  border: 1px solid #c4c4c4;
}

h1.login-title {
  margin: -28px -25px 25px;
  padding: 15px 25px;
  line-height: 30px;
  font-size: 25px;
  font-weight: 300;
  color: #ADADAD;
  text-align:center;
  background: #f7f7f7;

}

.login-input {
  width: 285px;
  height: 50px;
  margin-bottom: 25px;
  padding-left:10px;
  font-size: 15px;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
  }
.login-button {
  width: 100%;
  height: 50px;
  padding: 0;
  font-size: 20px;
  color: #fff;
  text-align: center;
  background: #f0776c;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
  outline:0;
}

.login-lost
{
  text-align:center;
  margin-bottom:0px;
}

.login-lost a
{
  color:#666;
  text-decoration:none;
  font-size:13px;
}

  </style>
</head>
<body background='http://localhost/Login/asset/image/alpha-logo.gif'>
  <form class="login" action="" method="post">
      <h1 class="login-title">Simple Login</h1>
      <input type="text" class="login-input"  name="email" placeholder="Email Adress" autofocus>
      <input type="password" class="login-input" name="password" placeholder="Password">
      <input type="submit" value="Lets Go" class="login-button" name="go">
    <p class="login-lost"><a href="">Forgot Password?</a></p>
    </form>


</body>
</html>
