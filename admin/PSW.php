<?php
date_default_timezone_set("Asia/Karachi");
$date = date("Y-m-d");
session_start();
if($_SESSION['loginadmin'] ==  true)
{

?>
<html>
<title>Dashboard | Reset Password</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

.form-container {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            padding: 20px;
            width: 94%;
margin: 20px auto;
        }
        .form-container h2 {
            text-align: center;
            margin: 0;
            color: #f44336;
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .form label {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }
        .form input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form .btn {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .btn button {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-red w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Admin Dashboard</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/user.png" class="w3-circle w3-margin-right" style="width:56px">
    </div>
    <div class="w3-col s8 w3-bar">
      <br><span>Welcome, <strong><?php echo $_SESSION['loginadmin']; ?></strong></span><br>
    </div>
  </div>
  <hr>
   <div class="w3-container">
    <h5><b>Dashboard</b></h5>
  <div class="w3-bar-block">
    <a href="Overview.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard"></i>  Overview</a>
  </div>

  <h5><b>Manage Submissions</b></h5>
  <div class="w3-bar-block">
    <a href="Newapp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users"></i> Registered Users</a>
    <a href="Submitted.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle"></i> Submitted Applications</a>
    <a href="PSW.php" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-key"></i> Change Password</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i> Logout</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-key"></i> Reset Password</b></h5>
  </header>


 <div class="w3-row-padding w3-margin-bottom">
    <div class="form-container">
        <h2>Password Reset</h2>
        <form class="form" action="Actions/updatepass.php" method="post">
            <label for="username">Username:</label>
            <input type="username" id="username" name="username" required>

            <label for="password">Old Password:</label>
            <input type="password" id="password" name="oldpassword" required>

            <label for="confirm-password">New Password:</label>
            <input type="password" id="confirm-password" name="newpassword" required>

            <div class="btn">
                <button type="submit">Reset Password</button>
            </div>
        </form>
    </div>
</div>


     </div>
  </div>
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
<?php
}
else
{
  header('location:login.php');
}
?>