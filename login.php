<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  background: #DDD;
  font-size: 16px;
  color: #222;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

#login-box {
  position: relative;
  margin: 5% auto;
  width: 600px;
  height: 400px;
  background: #FFF;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 5%;
  left: 25%;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 300;
  font-size: 28px;
}

input[type="text"],
input[type="password"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  height: 32px;
  border: none;
  border-bottom: 1px solid #AAA;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-bottom: 2px solid #16a085;
  color: #16a085;
  transition: 0.2s ease;
}

button[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background: #16a085;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

button[type="submit"]:hover,
button[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

button[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

button.social-signin {
  margin-bottom: 20px;
  width: 220px;
  height: 36px;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  transition: 0.2s ease;
  cursor: pointer;
}

button.social-signin:hover,
button.social-signin:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin:active {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

.login{
  position: relative;
  align-items: center;
  text-align: center;
  top: 75%;
  font-size: 13px;
}
  </style>
}
</head>
<body>
  <?php
    include 'db.php';

    if(isset($_POST['login_submit'])){

      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['password']);

      $emailquery = "select * from register4 where email = '$email'";
      $query = mysqli_query($con, $emailquery);

      $emailcount = mysqli_num_rows($query);

      if($emailcount){
        $pass_fetch = mysqli_fetch_assoc($query);
        $db_pass = $pass_fetch['password'];

        $_SESSION['username'] = $pass_fetch['username'];

        $pass_verif = password_verify($password, $db_pass);

        if($pass_verif){
          echo "Login successfull";
          header("location:index.php");
        }else{
          echo "Password Incorrect";
        }
      }else{
        echo "Inalid Email";
      }
    }
  ?>
  <form action="" method="POST">
    <div id="login-box">
  <div class="left">
    <center><h1>Login</h1></center>
    
    <input type="text" name="email" placeholder="E-mail" />
    <input type="password" name="password" placeholder="Password" />
    
    <center><button type="submit" name="login_submit">Login</button></center>
  </div>

  <div class="login">Still not Sign in? <a href="Register1.php">Signup now!</a></div>
</div>
</form>
</body>
</html>