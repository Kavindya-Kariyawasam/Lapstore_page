<?php
  require "database.php";

  if(isset($_POST["login-btn"])) {
    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];

    //Designing SQL Query Format
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $con->query($sql);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        // echo $row['Name']."<br>";
        // echo $row['Email']."<br>";
        // echo $row['Username']."<br>";

        $db_un = $row["Username"];
        $db_pw = $row["Password"];

        if($db_un == $username && $db_pw == $password){
            echo "<script>alert('Login Successful');
            location.replace('home.html');</script>";
            
        } else{
            echo "<script>alert('Login Failed');</script>";
        }
      }
    } else {
      echo "<script>alert('User does not exist')</script>";
    }
  }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" type="text/css" href="footer.css">
  <script defer src="menu.js"></script>
  <script defer src="footer.js"></script>
</head>
<body>
  <nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-brand">
            <a href="home.html">
             <img src="./images/logo.png" alt="Lap_store logo">
            </a>
        </div>

        <ul class="navbar-nav-left">
          <li><a href="home.html">Home</a></li>
          <li><a href="Laptop.html">Laptops</a></li>
          <li><a href="desktop.html">Desktops</a></li>
          <li><a href="accessories.html">Accessories</a></li>
          <li><a href="aboutus.html">About</a></li>
        </ul>

        <!-- <ul class="navbar-nav-right">
            <li><button class="btn btn-dark-outline"><a href="#">Sign in</a></button></li>
            <li><button class="btn btn-dark">Join now</button></li>
        </ul>  -->
        
        <!-- Hamburger Menu -->
        <button class="hamburger" type="button" id="menu-btn">
            <span class="hamburger-top"></span>
            <span class="hamburger-middle"></span>
            <span class="hamburger-bottom"></span>
        </button>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div class="mobile-menu hidden" id="menu">
      <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="Laptop.html">Laptops</a></li>
        <li><a href="desktop.html">Desktops</a></li>
        <li><a href="accessories.html">Accessories</a></li>
        <li><a href="aboutus.html">About</a></li>
      </ul>
      <!-- <div class="mobile-menu-bottom">
        <li><button class="btn btn-dark-outline"><a href="#">Sign in</a></button></li>
          <button class="btn btn-dark">Join now</button>
      </div> -->
  </div>
  
    <div class="container">
      <h1 class="logo">Welcome Back!</h1>
      <p>Already have an account? Login in or <a href="signup.php">Sign Up</a></p>
      <form action="#" method="POST" id="loginForm">
        <div class="input-field">
          <label for="username">Username or Email</label>
          <input type="text" id="username" name="txt_username" required>
          <div class="error-message" id="usernameError"></div>
        </div>
        <div class="input-field">
          <label for="password">Password</label>
          <input type="password" id="password" name="txt_password" required>
          <div class="error-message" id="passwordError"></div>
        </div>
        <div class="checkbox-field">
          <input type="checkbox" id="remember-me">
          <label for="remember-me">Remember Me</label>
        </div>
        <button type="submit" name="login-btn" onclick="validateForm()">Login</button>
        <a id="forgot" href="#">Forgot Password?</a>
      </form>
    </div>
  <footer>
    <div class="footer-column">
      <h3>Company</h3>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Customer Reviews</a></li>
      </ul>
    </div>
    
    <div class="footer-column">
      <h3>Contact</h3>
      <ul>
        <li><a href="#">Store Locations</a></li>
        <li><a href="#">Online Enquiry</a></li>
        <li><a href="#">Phone Details</a></li>
        <li><a href="#">Feedback & Complaints</a></li>
        <li><a href="#">FAQs</a></li>
      </ul>
    </div>
    
    <div class="footer-column">
      <h3>Information</h3>
      <ul>
        <li><a href="#">Open Hours</a></li>
        <li><a href="#">Warranty & Returns</a></li>
        <li><a href="#">Shipping</a></li>
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="#">Privacy Statement</a></li>
      </ul>
    </div>
    
    <div class="footer-column wider-column">
      <h3>Don’t Miss Anything</h3>
      <p>Subscribe to get the notifications of latest products, Deals & Giveaways!</p>
      <form id="emailForm">
        <input type="email" placeholder="Enter your Email" name="email">
        <button type="submit">Subscribe</button>
      </form>
      <h4>Stay in Touch</h4>
      <div class="social-media">
        <a href="#"><img src="./images/footer/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="./images/footer/twitter.png" alt="Twitter"></a>
        <a href="#"><img src="./images/footer/instagram.jpg" alt="Instagram"></a>
      </div>     
    </div>
  </footer>
  <script>
    function validateForm() {
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;

      if (!username || !password) {
        // event.preventDefault();
        document.getElementById('usernameError').textContent = username ? '' : 'Username is required';
        document.getElementById('passwordError').textContent = password ? '' : 'Password is required';
      }
    }
  </script>
</body>
</html>
