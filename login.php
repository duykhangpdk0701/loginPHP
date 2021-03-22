<?php
include_once "./header.php";
?>


<section class="sign-up-form">
  <h2>Sign up</h2>
  <form action="./includes/login.inc.php" method="POST">
    <input type="text" name="name" placeholder="Username/Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="submit">Log in</button>
  </form>
</section>


<?php
include_once "./footer.php";
?>