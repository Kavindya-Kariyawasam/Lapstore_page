<?php
  require "database.php";

  if(isset($_POST["signup-btn"])) {//Getting inputs from the form.
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    //Defining a SQL Insert Query Format
    $sql = "INSERT INTO Users(Name,Email,Username,Password)VALUES('$name','$email','$username','$password');";

    //Run this Query Format as an SQL Query
    $result = $con->query($sql);

    //Checking for the Confirmation of Insertion
    if($result===true){
      echo "<script>alert('Sucessfully created an account');
      location.replace('login.php');</script>";
    }else{
      echo "<script>alert('Data Insertion Failed');</script>";
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="signup.css">
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
      </div>

  <div class="container">
    <div class="login-form">
      <form id="signup-form" action="#" method="POST">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account. or <a href="login.php">Login</a></p>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Name" required />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Email" required />

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required />

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Repeat Password" required />

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom: 15px">
          Remember me
        </label>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <div class="buttons">
          <button type="button" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn" name="signup-btn" onclick="return validateForm()">Sign Up</button>
          <!-- <input type="submit" value="submit" name="signup-btn" class="signupbtn"> -->
        </div>
      </form>
    </div>
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
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm-password').value;

      // Validate First Name
      if (fname === '') {
        alert('Please enter your First Name.');
        return false;
      }

      // Validate Email
      if (email === '') {
        alert('Please enter your Email.');
        return false;
      } else if (!isValidEmail(email)) {
        alert('Please enter a valid Email.');
        return false;
      }

      // Validate Username
      if (username === '') { // New block
        alert('Please enter your Username.');
        return false;
      } else if (username.length < 4) {
        alert('Username must be at least 4 characters long.');
        return false;
      }

      // Validate Password
      if (password === '') {
        alert('Please enter your Password.');
        return false;
      } else if (password.length < 6) {
        alert('Password must be at least 6 characters long.');
        return false;
      }

      // Validate Confirm Password
      if (confirmPassword === '') {
        alert('Please confirm your Password.');
        return false;
      } else if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
      }

      // If all validations pass, submit the form
      alert('Sign up successful!');
      form.reset();
    });

    // Function to validate email format
    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
    }
  </script>
</body>
</html>
