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
  height: 430px;
  background: #FFF;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.register {
  margin: 0 auto;
  text-align: center;
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

button.social-signin.facebook {
  background: #32508E;
}

button.social-signin.twitter {
  background: #55ACEE;
}

button.social-signin.google {
  background: #DD4B39;
}
.login{
  position: relative;
  align-items: center;
  text-align: center;
  bottom: 6%;
  font-size: 13px;
}
  </style>
}
</head>

<?php

  include 'db.php';


  if(isset($_POST['signup_submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $pass2 = password_hash($password2, PASSWORD_BCRYPT);

    $emailquery = "select * from register4 where email = '$email'";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);
    if($emailcount>0){
      ?>
      <script>
        alert("Email already exist");
      </script>
      <?php
    }else{
      if($password === $password2){
        $insertquery = "insert into register4(username, email, password, cpassword) values ('$username','$email','$pass','$pass2')";
        $iquery = mysqli_query($con, $insertquery);
        if($iquery){
          ?>
          <script>
            alert("Signup successfull");
          </script>
          <?php
          header("location:login.php");
          ?>
          <script>
            alert("Signup successfull");
          </script>
          <?php
        }else{
          ?>
          <script>
            alert("Signup failed");
          </script>
          <?php
        }
      }else{
       ?>
       <script>
         alert("Password not matched");
       </script>
       <?php
      }
    }

  }


?>
<body>
  <form action="" method="POST">
    <div id="login-box">
  <div class="register">
    <h1>Sign up</h1>
    
    <input type="text" name="username" placeholder="Username" />
    <input type="text" name="email" placeholder="E-mail" />
    <input type="password" name="password" placeholder="Password" />
    <input type="password" name="password2" placeholder="Confirm password" />
    
    <button type="submit" name="signup_submit">Sign me up</button>
  </div>
  
  <div class="login">Already Sign up? <a href="login.php">Login now!</a></div>
</div>
</form>
</body>
</html>