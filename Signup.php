<?php
session_start(); // Start the session
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        .toast {
            display: none;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }

        .logo {
      text-align: center;
      margin-top: 40px;
    }

    .logo img {
      max-width: 100px;
      /* border-radius: 50%; */
      margin-top: 10px;
    }

        .form-container {
            padding: 12px;
        }

        .form-container h2 {
            color: #e51b20;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color:#919191;
        }

        .form-group input {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group button {
            width: 100%;
            background-color: #e51b20;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #f0a506;
        }

        .form-group p {
            text-align: center;
            margin-top: 10px;
        }

        .switch-container {
            text-align: center;
            margin-top: 20px;
        }

        .switch-container a {
            text-decoration: none;
            color: #e51b20;
            font-weight: bold;
        }

        .password-toggle {
      position: relative;
    }

    .toggle-icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }
    .success-message {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
      display: none; /* initially hide the message */
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="img/logoEsHayat.png" alt="EsHayat Logo">
        </div>
        <div class="form-container">
            
            <h3>Sign Up</h3>
            <p>Let's get started put your details</p>
            <?php if (isset($_SESSION['registration_success']) && $_SESSION['registration_success'] === true) {
    echo '<div id="successMessage" class="success-message">Registration successful! <br>Check your email for confirmation.</div>';
    // Unset the session variable to avoid displaying the message again on page refresh
    unset($_SESSION['registration_success']);
}?>
            <form id="signup-form" action="Actions/register.php" method="post">
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="User Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-toggle">
                    <input type="password" id="password" placeholder="Password" name="password" required>
                    <span class="toggle-icon" onclick="togglePassword('password')">&#x1F441;</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <div class="password-toggle">
                    <input type="password" id="cpassword" placeholder="Confirm Password" name="cpassword" required>
                    <span class="toggle-icon" onclick="togglePassword('cpassword')">&#x1F441;</span>
                    </div>
                </div>
           
                <div class="form-group">
                    <button type="submit">Sign Up</button>
                </div>
		 <center><p>Already have an account? <a href="login.php">Sign In</a></p></center>
            </form>
        </div>
    </div>
</body>
<script>
    function togglePassword(inputId) {
      var passwordInput = document.getElementById(inputId);
      var icon = passwordInput.nextElementSibling;

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.textContent = "🙈";
      } else {
        passwordInput.type = "password";
        icon.textContent = "👁️";
      }
    }
  </script>
   <script>
    // Function to show the success message
    function showSuccessMessage() {
      var successMessage = document.getElementById('successMessage');
      successMessage.style.display = 'block';

      // Set a timeout to hide the message after 10 seconds (10000 milliseconds)
      setTimeout(function () {
        successMessage.style.display = 'none';
      }, 5000);
    }

    // Call the function when the page loads
    window.onload = showSuccessMessage;
  </script>
</html>
