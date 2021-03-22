<?php

function emptyInputSignup($name, $email, $username, $password, $passwordRepeat)
{

  if (empty($name) || empty($email) || empty($username) || empty($password) || empty($passwordRepeat)) {
    return true;
  } else {
    return false;
  }
}

function invalidUid($username)
{
  if (!preg_match(("/^[a-zA-Z0-9]*$/"), $username)) {
    return true;
  } else {
    return false;
  }

}

function invalidEmail($email)
{
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

function passwordMatch($password, $passwordRepeat)
{
  if ($password !== $passwordRepeat) {
    return true;
  } else {
    return false;
  }
}

function uidExists($conn, $username, $email)
{
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    return false;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password)
{
  $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPassword) VALUE (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashPassword = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashPassword);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
  exit();
}