<?php
date_default_timezone_set("Asia/Karachi");
$date = date("Y-m-d");
session_start();
if($_SESSION['loginuser'] ==  true)
{

?>
<html>
<title>Dashboard | Request Residency</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

.progress {
  margin:20px auto;
  padding:0;
  width:98%;
  height:30px;
  overflow:hidden;
  background:#e5e5e5;
  border-radius:6px;
}

.bar {
	position:relative;
  float:left;
  min-width:1%;
  height:100%;
  background:#E51B20;
}

.percent {
	position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  margin:0;
  font-family:tahoma,arial,helvetica;
  font-size:12px;
  color:white;
}

.form-container {
            background-color: #fff;
            border-radius: 10px;
            width: 94%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px;
        }

        .form-group {
            margin: 5px 0;
        }

        .form-label {
            font-weight: bold;
            color: #e51b20;
        }

        .form-input,
        .form-select {
            width: 90%;
            padding: 10px;
            border: 1px solid #e1e1e1;
            border-radius: 5px;
        }

        .form-select {
            appearance: none;
        }

        .form-btn {
            background-color: #e51b20;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-btn:hover {
            background-color: #f0a506;
        }
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-red w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Dashboard</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/user.png" class="w3-circle w3-margin-right" style="width:56px">
    </div>
    <div class="w3-col s8 w3-bar">
      <br><span>Welcome, <strong><?php echo $_SESSION['uname']; ?></strong></span><br>
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
    <a href="Newapp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-clipboard"></i> General Information</a>
    <a href="Academic.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book"></i> Academic Forms</a>
<a href="Legal.php" class="w3-bar-item w3-button w3-padding  w3-red"><i class="fa fa-legal"></i> Legal Forms</a>
    <a href="Submitted.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle"></i> Submitted Applications</a>
    <a href="PSW.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-key"></i> Change Password</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i> Logout</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-legal"></i> Request Residency</b></h5>
  </header>


 <div class="w3-row-padding w3-margin-bottom">
    <div class="form-container">
        <form action="Actions/residencyform.php" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <div class="form-group">
                    <label for="choice" class="form-label">Do you have a European passport?   </label>
                    <select id="choice" class="form-select" name="choice" required>
                        <option value="" disabled selected>Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start" class="form-label">Visa application start date</label>
                    <input type="date" id="start" class="form-input" name="start">
                </div>
                <div class="form-group">
                    <label for="expiry" class="form-label">Visa application expiry date</label>
                    <input type="date" id="expiry" class="form-input" name="expiry">
                </div>
                <div class="form-group">
                    <label for="passport" class="form-label">A copy of your valid passport </label>
                    <input type="file" name="passport" accept=".pdf" required>
                </div>
                <div class="form-group">
                    <label for="admission" class="form-label">Proof of university admission</label>
                    <input type="file" name="admission" accept=".pdf" required>
                </div>
                <div class="form-group">
                    <label for="visa" class="form-label">Proof of visa application approval</label>
                    <input type="file" name="visa" accept=".pdf">
                </div>
            </div>
            <br>
            <button type="submit" class="form-btn">Submit</button>
        </form>
    </div>
</div>

<footer class="w3-container" style="padding-top:0px">
    <center><h5><b><a href="Legal.php"><i class="fa fa-chevron-circle-left"></i> Back to Forms</a></b></h5></center>
  </footer>
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