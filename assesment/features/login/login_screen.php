<!DOCTYPE html>
<html lang="en">
<!-- 
  * login screen, which provides user input user name and password 
  * if information was incorrect or invalid shows messages about errors 
-->

<html>
    <head>
        <title>Welcome to the book system</title>
        <link rel="stylesheet" href="../../css/normalize.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="parent clearfix">
            <div class="bg-illustration">
              <div class="burger-btn">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>

                    
            <div class="login">
              <div class="container">
                <h1>Login to access to<br />your account</h1>
                <div class="login-form">
                  <div class="extra-action">
                    <a href="../signup/sing_up_screen.php">Don't have an accaunt? Sign up</a>
                  </div>
                  <form action="login_process.php", method="post">
                    <input type="text" placeholder="Username" name="Username">
                    <input type="password" placeholder="Password" name="Password">

                    <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                    <div class="alert"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
                    ?>
                    <button type="submit" name="Login">LOG-IN</button>
                  </form>
                </div>
            
              </div>
              </div>
          </div>
    </body>
</html>