<?php
  require("include/utility.php");
  logMsg("register.php running");
  if($_SERVER["REQUEST_METHOD"]=="POST") {
    //Forces First and Last name to be capitalized
    $fname = ucfirst(cleanInput($_POST["fname"]));
    $lname = ucfirst(cleanInput($_POST["lname"]));
    //forces email to all lower case to prevent false
    //negatives when checking login/account exists
    $email = strtolower(cleanInput($_POST["email"]));
    $password = cleanInput($_POST["password"]);

    //encryption
    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    $encryptedPassword = hash('ripemd320', "$salt1$password$salt2");

    $dbconn = connectToDB();
    //Query to see if there are any entries with the same email
    $checkExistQuery = "SELECT * FROM users WHERE email = '$email'";
    $userExist = $dbconn->query($checkExistQuery);
    //If there are any results from the query (email is already in DB)
    //so user must exist and cannot create a new account with the same 
    //email
    if ($myrow = $userExist->fetch_array()) {
      logMsg("user already exists");
      echo json_encode(array("code"=>2, "msg"=>"User with that email already exists"));
    //if the email is not already in the DB prepare a new query with the
    //account information from the form to insert the info into the database
    } else {
      $query = "INSERT INTO `users`
        (`first`, `last`, `email`, `password`) 
      VALUES 
        ('$fname','$lname','$email','$encryptedPassword');";
      $dbconn->query($query);
      echo json_encode(array("code"=>1, "msg"=>"Account created!"));
    }
    disconnectDB($dbconn);
  }
?>