<?php
    session_start();
    session_unset();
    session_destroy();
?>

<?php
require 'header.php';
?>


<div style="margin-top: 80px;"  id="login-box">
    <div class="logo">
      <h1 class="logo-caption"><span class="tweak">L</span>ogout</h1>
    </div>
    <div class="controls">
      <p>Anda berhasil Logout</p>
    </div>
  </div>
</div>


<?php
require 'footer.php';
?>
