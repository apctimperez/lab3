<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Timothy Perez - Personal Portfolio</title>
 
 
  <!--
    - favicon
  -->
<link rel="shortcut icon" href="tim1.jpg" type="image/x-icon">
<link rel="stylesheet" href="css/forms.css">

 
 
  <!--
    - google font link
  -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
 
<body>

<!--
    - #MAIN
  -->
 
  <main>
 
    <!--
      - #SIDEBAR
    -->
 
    <aside class="sidebar" data-sidebar>
 
      <div class="sidebar-info">
 
        <figure class="avatar-box">
<img src="images/tim1.jpg" alt="Timothy Perez" width="80">
</figure>
 
        <div class="info-content">
<h1 class="name" title="Timothy Perez">Timothy Perez</h1>
 
          <p class="title">Student</p>
</div>
 
        <button class="info_more-btn" data-sidebar-btn>
<span>Show Contacts</span>
 
          <ion-icon name="chevron-down"></ion-icon>
</button>
 
      </div>
 
      <div class="sidebar-info_more">
 
        <div class="separator"></div>
 
        <ul class="contacts-list">
 
          <li class="contact-item">
 
            <div class="icon-box">
<ion-icon name="mail-outline"></ion-icon>
</div>
 
            <div class="contact-info">
<p class="contact-title">Email</p>
 
              <a href="mailto:itstimoy08@gmail.com" class="contact-link">itstimoy08@gmail.com</a>
</div>
 
          </li>
 
          <li class="contact-item">
 
            <div class="icon-box">
<ion-icon name="phone-portrait-outline"></ion-icon>
</div>
 
            <div class="contact-info">
<p class="contact-title">Phone</p>
 
              <a href="tel:+12133522795" class="contact-link">+63 992 420 5591</a>
</div>
 
          </li>
 
          <li class="contact-item">
 
            <div class="icon-box">
<ion-icon name="calendar-outline"></ion-icon>
</div>
 
            <div class="contact-info">
<p class="contact-title">Birthday</p>
 
              <time datetime="1982-06-23">August 08, 2003</time>
</div>
 
          </li>
 
          <li class="contact-item">
 
            <div class="icon-box">
<ion-icon name="location-outline"></ion-icon>
</div>
 
            <div class="contact-info">
<p class="contact-title">Location</p>
 
              <address>Tarlac, Tarlac City</address>
</div>
 
          </li>
 
        </ul>
 
        <div class="separator"></div>
 
        <ul class="social-list">
 
          <li class="social-item">
<a href="https://www.facebook.com/profile.php?id=100072562192707" class="social-link">
<ion-icon name="logo-facebook"></ion-icon>
</a>
</li>
 
          <li class="social-item">
<a href="https://twitter.com/Timothy77584285" class="social-link">
<ion-icon name="logo-twitter"></ion-icon>
</a>
</li>
 
          <li class="social-item">
<a href="https://www.instagram.com/" class="social-link">
<ion-icon name="logo-instagram"></ion-icon>
</a>
</li>
 
        </ul>
 
      </div>
 
    </aside>
 
 
 
    <!--
      - #main-content
    -->
 
    <div class="main-content">
 
      <!--
        - #NAVBAR
      -->
 
      <nav class="navbar">
 
        <ul class="navbar-list">
 
          <li class="navbar-item">
<a href="index">
<button class="navbar-link  active" data-nav-link>About</button>
</a>
</li>
 
          <li class="navbar-item">
<a href="forms">
<button class="navbar-link" data-nav-link>Forms</button>
</a>
</li>
 
          <li class="navbar-item">
<a href="contact">
<button class="navbar-link" data-nav-link>Contact</button>
</a>
</li>
 
        </ul>
 
      </nav>
 
      <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 
  <h2>PHP Form Validation Example</h2>
<div class="container">
<p><span class="error">* required field</span></p>
 
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<div class="input-group">
<label for="name">Name:</label>
<input type="text" name="name" id="name" value="<?php echo $name;?>">
<span class="error"><?php echo $nameErr;?></span>
</div>
 
    <div class="input-group">
<label for="email">E-mail:</label>
<input type="text" name="email" id="email" value="<?php echo $email;?>">
<span class="error"><?php echo $emailErr;?></span>
</div>
 
    <div class="input-group">
<label for="website">Website:</label>
<input type="text" name="website" id="website" value="<?php echo $website;?>">
<span class="error"><?php echo $websiteErr;?></span>
</div>
 
    <div class="input-group">
<label for="comment">Comment:</label>
<textarea name="comment" id="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
</div>
 
    <div class="gender-group">
<label>Gender:</label>
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
<span class="error"><?php echo $genderErr;?></span>
</div>
 
    <input type="submit" name="submit" value="Submit">  
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
 
 
<?php

	
// For Xampp Localhost
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "myDB";

//For Socitcloud
$servername = "localhost";
$username = "webprogmi221";
$password = "g_6bCitLu.ljMK*m";
$dbname = "webprogmi221";
 
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$sql = "INSERT INTO trperez_myguests (name, email, website, comment, gender)
VALUES ('$name', '$email', '$website', '$comment', '$gender')";
 
 
if ($conn->query($sql) === TRUE){
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();
?>
 
 </body>
</html>
