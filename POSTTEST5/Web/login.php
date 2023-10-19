<?php
    require 'connection.php';
    session_start();
?>


<?php
require 'header.php';
?>

<div class="container" >
  <div style="margin-top: 80px;" id="login-box">
    <div class="logo">
      <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
    </div>
    <div>
        <div style="align-items: center; text-align:center;color:white" >
            <div style="width: 500px;" >
                <p>Login to make a purchase.</p>
                <form style="width: 500px;" method="post" action="login_submit.php">
                    <div>
                        <input style="width: 200px;" type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    </div>
                    <div>
                        <input style="width: 200px;" type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                    </div>
                    <div>
                        <input type="submit" value="Login" style="font-family: bobaland;" >
                    </div>
                </form>
                <div>Don't have an account yet? <a href="signup.php">Register</a></div>
            </div>
        </div>
    </div>
  </div>
</div>


           
<?php
require 'footer.php';
?>
