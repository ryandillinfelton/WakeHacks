/*
  Name: Ryan Felton
  Date: 4-4-2016 
  Class: CSC-2210
  Location: ~/public_html/csc2210/exams/login/validation.js
  
  validates input for registration and login forms on prisoners 
  dilemma website
*/

//Validates that the entry is not empty
//then displays the given message in the
//given location
function validateNotEmpty(entry, displayLoc, msg) {
  if(entry.value == "") {
    $(displayLoc).html(msg);
    entry.focus();
    return false;
  } 
  return true;
}

//Validates the entry using a given regular expression
//and returns the message given in the parameters of the call
function validatePattern (entry, displayLoc, msg, pattern) {
  var patterntest = new RegExp(pattern);
  if(!patterntest.test(entry.value)) {
    $(displayLoc).html(msg);
    email.focus();
    return false;
  }
  return true;
}

//Validates that the two passwords match and 
//updates the given location to tell them
//whether or not they do
function validatePasswords(password1,password2) {
  if(password1.value != password2.value) {
    $("#caMsg").html("passwords don't match");
    password1.focus();
    return false;
  }
  return true;
}

/* 
Function to validate that all of the information entered in the 
registration form is in a valid format
additionally posts the information to register.php for processing
the creation of a new account, and displays whether or not the 
account could be created on the registration page
*/
function validateRegister(form) {
  if(!validateNotEmpty(form.fname,"#caMsg","Please enter a first name")) return false;
  if(!validateNotEmpty(form.lname,"#caMsg", "Please enter a last name")) return false;
  //regex checks that the email follows the pattern 
  //[alphanumeric][@][alphanumeric][.][alphanumeric]
  if(!validatePattern(form.email,"#caMsg", "Please enter a valid email", /^\S+@\S+\.\S+$/)) return false;
  // regex makes sure the password is at least 6 characters long and 
  //contains at least 1 special character and at least 1 number
  if(!validatePattern(form.password1,"#caMsg", "Your password must be at least 6 characters long & must"
  + "contain at least 1 special character and 1 number", /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,}$/)) return false;
  if(!validatePasswords(form.password1,form.password2)) return false;

  //submits the account information from the registration form
  //to register.php for processing
  $.post("register.php",
    {"fname":form.fname.value,
    "lname":form.lname.value,
    "email":form.email.value,
    "password":form.password1.value}, 
    function(JSONdata) {
      //Parses the information about the account creation sent
      //back from register.php
      var data = $.parseJSON(JSONdata);
      //data returned is comprised of a response code {1 or 2}
      //and a message explaining the response
      //1 = account created; 2 = account already exits
      if (data.code == 1) {
        //tell the user their account has been created
        $("#caMsg").html(data.msg);
      } else {
        //otherwise tell them that their account already exits
        $("#caMsg").html(data.msg);
      }
    }
  )

  return true;
}

/*
Function to validate the information entered in the login form
and if it passes that check to check the information against
the database and either log them in, or return an errors explaining
what in their login form is wrong
*/
function validateLogin(form) {
  //regex checks that the email follows the pattern [alphanumeric][@][alphanumeric][.][alphanumeric]
  if(!validatePattern(form.email,"#liMsg", "Please enter a valid Email", /^\S+@\S+\.\S+$/)) return false;
  if(!validateNotEmpty(form.password,"#liMsg", "Please enter a password")) return false;

  //submits the login information to login.php
  //returns errors or success message
  $.post("login.php",
    {"email":form.email.value,
    "password":form.password.value}, 
    function(dataJSON) {
      var data = $.parseJSON(dataJSON);
      //data returned is comprised of a response code {1,3,4}
      //and a message explaining the response
      //1=sucess; 3=email not in DB; 4=wrong password for email
      if (data.code == 1) {
        //take the user to the game page if login is correct
        console.log("code 1");
        $("#liMsg").html(data.msg);
        //used to change to game time page without reloading
        $(":mobile-pagecontainer").pagecontainer("change","#gameTime"); 
        $("#gtMsg").html("Welcome to gametime user134432!");
      } else {
        //otherwise tell them what is wrong with their login info
        $("#liMsg").html(data.msg);
      }
    }
  )

  return true;
}