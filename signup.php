<?php
include_once "./header.php";
?>


<section class="sign-up-form">
  <h2>Sign up</h2>
  <form action="./includes/signup.inc.php" method="POST">
    <input type="text" name="name" placeholder="Full name">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="uid" placeholder="username">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="passwordRepeat" placeholder="Repeat password">
    <button type="submit" name="submit">Sign Up</button>
  </form>


  <?php
$errorString = "";
if (isset($_GET["error"])) {
  if ($_GET["error"] === "emptyinput") {
    $errorString = "Please fill in all fields!";
  } else if ($_GET["error"] === "invaliduid") {
    $errorString = "Choose a proper username!";
  } else if ($_GET["error"] === "") {
    $errorString = "";
  }

  echo "<P class='error-string'>" . $errorString . "</P>";
}
?>


</section>


<?php
include_once "./footer.php";
?>