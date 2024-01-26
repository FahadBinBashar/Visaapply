<?php
date_default_timezone_set("Asia/Karachi");
$date = date("Y-m-d");
session_start();
$loginuser = $_SESSION['loginuser'];
if($_SESSION['loginuser'] ==  true)
{
include 'connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Query to count distinct cid values from Academic tables
$query = "
     SELECT COUNT(*) AS total_cid_count
    FROM (
        SELECT cid FROM research WHERE cid = '$loginuser'
        UNION ALL
        SELECT cid FROM support WHERE cid = '$loginuser'
        UNION ALL
        SELECT cid FROM institution WHERE cid = '$loginuser'
        UNION ALL
        SELECT cid FROM recognition WHERE cid = '$loginuser'
    ) AS combined_table;
";

// Execute the Academic tables query
foreach ($conn->query($query) as $row) {
    $atotal = $row['total_cid_count'];
    $_SESSION['atotal'] = $atotal;
}

// Query to count distinct cid values from Legal tables
$query = "
     SELECT COUNT(*) AS total_cid_count
    FROM (
        SELECT cid FROM visa WHERE cid = '$loginuser'
        UNION ALL
        SELECT cid FROM residency WHERE cid = '$loginuser'
        UNION ALL
        SELECT cid FROM renewal WHERE cid = '$loginuser'
        UNION ALL
        SELECT cid FROM domiciliation WHERE cid = '$loginuser'
        UNION ALL
        SELECT cid FROM otherlegal WHERE cid = '$loginuser'
    ) AS combined_table;
";

// Execute the Legal tables query
foreach ($conn->query($query) as $row) {
    $ltotal = $row['total_cid_count'];
}

$sql=("SELECT * from users where id='".$_SESSION['loginuser']."'");
    $result=mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $_SESSION['uname'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['dob'] = $row['birthdate'];
    $_SESSION['country'] = $row['country'];
    $_SESSION['city'] = $row['city'];
    $_SESSION['status'] = $row['status'];
    $_SESSION['dor'] = $row['regdate'];
    $_SESSION['ltotal'] = $ltotal;
?>
<html>
<title>Dashboard | Admin</title>
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
    <a href="Overview.php" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-dashboard"></i>  Overview</a>
  </div>

  <h5><b>Manage Submissions</b></h5>
  <div class="w3-bar-block">
    <a href="Newapp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-clipboard"></i> General Information</a>
    <a href="Academic.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book"></i> Academic Forms</a>
<a href="Legal.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-legal"></i> Legal Forms</a>
    <a href="Submitted.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle"></i> Submitted Applications</a>
    <a href="PSW.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-key"></i> Change Password</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i> Logout</a>
  </div>
</nav>



<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

 <div class="w3-row-padding w3-margin-bottom">
       <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-full">
      <div class="w3-container w3-purple w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $_SESSION['uname']; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Name</h4>
      </div>
    </div>

     </div>
    <div class="w3-half">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-calendar w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $date; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Date</h4>
      </div>
    </div>
    <div class="w3-half">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-clock-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo date("h:i"); ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Time</h4>
      </div>
    </div>
  </div>
 <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-third">
 <a href="Submitted.php">
      <div class="w3-container w3-Indigo w3-padding-16">
        <div class="w3-left"><i class="fa fa-send-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $atotal+$ltotal;?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Submisisons</h4>
      </div>
</a>
    </div>


    <div class="w3-third">
 <a href="edsubmitted.php">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-spinner w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $atotal;?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Academic Submissions</h4>
      </div>
</a>
    </div>


    <div class="w3-third">
 <a href="legsubmitted.php">
      <div class="w3-container w3-brown w3-padding-16">
        <div class="w3-left"><i class="fa fa-hourglass w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $ltotal;?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Legal Submissions</h4>
      </div>
</a>
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