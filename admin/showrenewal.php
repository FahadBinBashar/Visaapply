<?php
date_default_timezone_set("Asia/Karachi");
$date = date("Y-m-d");
session_start();
if($_SESSION['loginadmin'] ==  true)
{
include 'connection.php';
$sql = "SELECT renewal.*, users.*
FROM renewal
INNER JOIN users ON renewal.cid = users.id
WHERE renewal.renid = '".$_GET['id']."'";
$result = $conn->query($sql);
$result1 = $conn->query($sql);
$row1 = $result1->fetch_assoc();

$fileData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fileData[] = $row;
    }
}
?>
<html>
<title>Dashboard | Submitted Applications</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.card-container {
            display: flex;
            justify-content: center;
        }
.card {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            margin: 10px;
            padding: 20px;
            width: 500px;
        }
        .card h3 {
            font-size: 18px;
            margin: 0;
        }
        .card p {
            font-size: 14px;
            color: #777;
        }
        .card .btn {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .btn a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #E51B20;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
        }
        .header-section {
      background-color: #ffffff; /* White background color */
      color: #495057; /* Dark text color */
      padding: 30px;
      border-radius: 8px;
      margin-bottom: 30px;
    }

    .header-section {
      background-color: #ffffff; /* Blue color scheme */
      color: #000000; /* White text color */
      padding: 30px;
      border-radius: 8px;
      margin-bottom: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle lift */
    }

    .file-table {
      background-color: #ffffff; /* White background color for the table */
      color: #495057; /* Dark text color */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle lift */
    }

    /* Style the table */
    .file-table table {
      width: 100%;
      margin-top: 20px;
    }

    .file-table th, .file-table td {
      text-align: center;
      padding: 15px;
    }

    .file-table th {
      background-color: #F44336; /* Blue header color */
      color: #ffffff; /* White text color */
    }

    .file-table tbody tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.7); /* Slightly transparent alternate row background color */
    }

    .file-table a {
      color: #007bff; /* Blue link color */
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
    <a href="Submitted.php" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-check-circle"></i> Submitted Applications</a>
    <a href="PSW.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-key"></i> Change Password</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i> Logout</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-check-circle"></i> Residency Card (TIE/NIE) Renewal Applications </b></h5>
  </header>


 <div class="w3-row-padding w3-margin-bottom">
    <div class="container">

    <!-- Header Section with Basic Information -->
    <div class="header-section">
      <h2 class="display-4 mb-4"><?php echo $row1['name']; ?></h2>
      <p class="lead"><b>Email:</b> <?php echo $row1['email']; ?> | <b>Phone:</b> <?php echo $row1['phone']; ?></p>
      <p class="lead"><b>Birthdate:</b> <?php echo $row1['birthdate']; ?> | <?php echo $row1['city'];?>, <?php echo $row1['country']; ?></p>
      <p class="lead"><b>Study Status:</b> <?php echo $row1['status']; ?></p>
      <p class="lead"><b>Passport Start Date:</b> <?php echo $row1['start']; ?></p>
      <p class="lead"><b>Passport Expiry Date:</b> <?php echo $row1['expiry']; ?></p>
      <p class="lead"><b>Date of Registration:</b> <?php echo $row1['regdate']; ?></p>
    </div>

    <!-- File Submission Table -->
    <div class="file-table">
      <h2 class="mb-4">Files Submission</h2>
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">File Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($fileData as $index => $file) {
                echo '<tr>';
                echo '<th scope="row">' . ($index + 1) . '</th>';
                echo '<td>';

                if (!empty($file['filename'])) {
                    $filenames = explode(',', $file['filename']);
                    foreach ($filenames as $filename) {
                        echo $filename; echo '<br>';
                    }
                } else {
                    echo 'No file uploaded';
                }

                echo '</td>';
                echo '<td>';

                if (!empty($file['filename'])) {
                    echo '<a href="downloadren.php?id=' . $file['renid'] . '" class="btn btn-light btn-sm" target="_blank">Download All</a>';
                } else {
                    echo 'No file uploaded';
                }

                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
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