<?php
date_default_timezone_set("Asia/Karachi");
$date = date("Y-m-d");
session_start();

if($_SESSION['loginadmin'] ==  true)
{
include 'connection.php';

// Visa
$sqlv = "SELECT visa.vid, visa.rdate, visa.status, users.name
FROM visa
INNER JOIN users ON visa.cid = users.id";
$resultv = $conn->query($sqlv);

// Residency
$sqlres = "SELECT residency.resid, residency.rdate, residency.status, users.name
FROM residency
INNER JOIN users ON residency.cid = users.id";
$resultres = $conn->query($sqlres);

// Renewal
$sqlren = "SELECT renewal.renid, renewal.rdate, renewal.status, users.name
FROM renewal
INNER JOIN users ON renewal.cid = users.id";
$resultren = $conn->query($sqlren);

// Support
$sqld = "SELECT domiciliation.did, domiciliation.rdate, domiciliation.status, users.name
FROM domiciliation
INNER JOIN users ON domiciliation.cid = users.id";
$resultd = $conn->query($sqld);

// Other
$sqlo = "SELECT otherlegal.lid, otherlegal.subject, otherlegal.rdate, otherlegal.status, users.name
FROM otherlegal
INNER JOIN users ON otherlegal.cid = users.id";
$resulto = $conn->query($sqlo);
?>
<html>
<title>Dashboard | Submitted Legal Applications</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
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
        .nav-tabs>li>a{
            color : #F44336;
        }
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
            color : #F44336;
            font-weight: bold;
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
    <h5><b>Admin Dashboard</b></h5>
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
    <h5><b><i class="fa fa-legal"></i> Submitted Legal Applications</b></h5>
  </header>


 <div class="w3-row-padding w3-margin-bottom">
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#research">Visa Appointment</a></li>
    <li><a data-toggle="tab" href="#menu1">Residency</a></li>
    <li><a data-toggle="tab" href="#menu2">Renewal</a></li>
    <li><a data-toggle="tab" href="#menu3">Domiciliation</a></li>
    <li><a data-toggle="tab" href="#menu4">Other</a></li>
  </ul>
  <div class="tab-content">
    <div id="research" class="tab-pane fade in active">
        <br>
      <table id="visa" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Submission Details</center></th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resultv->num_rows > 0) {
    // output data of each row
        while($row = $resultv->fetch_assoc()) {
                $ids = $row['vid'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
     // echo "<td>Visa Appointment</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
        echo "<td><center><form action=showvisa.php target=_blank>
      <input name=id type=hidden value='".$row['vid']."'> <center><input type=image src=img/views.png alt=Submit width=25 height=13 style = margin-top:15px;></form></center></td>";
      
        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removevisModal data-whatever='".$row['vid']."' data-name='".$row['name']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removevisModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="actions/delvis.php" method="POST">
            
          <div class="form-group">
            <center><h5>Are you sure you want to permanently remove this Application?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-danger">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
<div class="modal fade" id="approveProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="actions/approveuser.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : green;">Make sure you have read all the information provider by client.</p><h5>Are you sure you want to Approve this client?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-success">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
</tbody>
 </table> 
    </div>
    <div id="menu1" class="tab-pane fade">
      <br>
      <table id="residency" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Submission Details</center></th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resultres->num_rows > 0) {
    // output data of each row
        while($row = $resultres->fetch_assoc()) {
                $ids = $row['resid'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
      //echo "<td>Residency Card (TIE/NIE)</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
        echo "<td><center><form action=showresidency.php target=_blank>
      <input name=id type=hidden value='".$row['resid']."'> <center><input type=image src=img/views.png alt=Submit width=25 height=13 style = margin-top:15px;></form></center></td>";
      
        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removeresModal data-whatever='".$row['resid']."' data-name='".$row['name']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removeresModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="actions/delresi.php" method="POST">
            
          <div class="form-group">
            <center><h5>Are you sure you want to permanently remove this Application?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-danger">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
<div class="modal fade" id="approveProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="action/approveuser.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : green;">Make sure you have read all the information provider by client.</p><h5>Are you sure you want to Approve this client?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-success">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 

</tbody>
 </table> 
    </div>
    <div id="menu2" class="tab-pane fade">
      <br>
      <table id="renewal" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Submission Details</center></th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resultren->num_rows > 0) {
    // output data of each row
        while($row = $resultren->fetch_assoc()) {
                $ids = $row['renid'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
      //echo "<td>Renewal Residency card (TIE/NIE)</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
        echo "<td><center><form action=showrenewal.php target=_blank>
      <input name=id type=hidden value='".$row['renid']."'> <center><input type=image src=img/views.png alt=Submit width=25 height=13 style = margin-top:15px;></form></center></td>";
      
        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removerenModal data-whatever='".$row['renid']."' data-name='".$row['name']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removerenModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="actions/delrene.php" method="POST">
            
          <div class="form-group">
            <center><h5>Are you sure you want to permanently remove this Application?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-danger">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
<div class="modal fade" id="approveProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="action/approveuser.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : green;">Make sure you have read all the information provider by client.</p><h5>Are you sure you want to Approve this client?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-success">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
</tbody>
 </table> 
    </div>
    <div id="menu3" class="tab-pane fade">
      <br>
      <table id="domiciliation" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Submission Details</center></th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resultd->num_rows > 0) {
    // output data of each row
        while($row = $resultd->fetch_assoc()) {
                $ids = $row['did'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
      //echo "<td>Empadronamiento/Domiciliation</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
      
      echo "<td><center><form action=showdom.php target=_blank>
      <input name=id type=hidden value='".$row['did']."'> <center><input type=image src=img/views.png alt=Submit width=25 height=13 style = margin-top:15px;></form></center></td>";

        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removedomModal data-whatever='".$row['did']."' data-name='".$row['name']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removedomModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="actions/deldom.php" method="POST">
            
          <div class="form-group">
            <center><h5>Are you sure you want to permanently remove this Application?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-danger">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
<div class="modal fade" id="approveProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="action/approveuser.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : green;">Make sure you have read all the information provider by client.</p><h5>Are you sure you want to Approve this client?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-success">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
</tbody>
 </table> 
    </div>
    <div id="menu4" class="tab-pane fade">
      <br>
      <table id="other" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resulto->num_rows > 0) {
    // output data of each row
        while($row = $resulto->fetch_assoc()) {
                $ids = $row['lid'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
      //echo "<td>Empadronamiento/Domiciliation</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['subject']."</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
      
        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removeolModal data-whatever='".$row['lid']."' data-name='".$row['name']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removeolModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="actions/delol.php" method="POST">
            
          <div class="form-group">
            <center><h5>Are you sure you want to permanently remove this Application?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-danger">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
<div class="modal fade" id="approveProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="action/approveuser.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : green;">Make sure you have read all the information provider by client.</p><h5>Are you sure you want to Approve this client?</h5><br>
              </center>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-id" name="category_id" readonly>
          </div>
      <div class="form-group">
            <center><button type="submit" class="btn btn-success">Yes! I'm Sure</button><center>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
</tbody>
 </table> 
    </div>
  </div>

</div>
<footer class="w3-container" style="padding-top:0px">
    <center><h5><b><a href="Submitted.php"><i class="fa fa-chevron-circle-left"></i> Back to Forms</a></b></h5></center>
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
<script>
/*$('#approveProductModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var name = button.data('name')

 // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Approve Client ' + name)
  modal.find('.modal-body #recipient-id').val(recipient)
})*/


$('#removevisModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var name = button.data('name')

 // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deleting Visa Application for ' + name)
  modal.find('.modal-body #recipient-id').val(recipient)
})
$('#removeresModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var name = button.data('name')

 // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deleting Residency Application for ' + name)
  modal.find('.modal-body #recipient-id').val(recipient)
})
$('#removerenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var name = button.data('name')

 // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deleting Renewal Application for ' + name)
  modal.find('.modal-body #recipient-id').val(recipient)
})
$('#removedomModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var name = button.data('name')

 // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deleting Domiciliation Application for ' + name)
  modal.find('.modal-body #recipient-id').val(recipient)
})
$('#removeolModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var name = button.data('name')

 // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deleting Legal Application for ' + name)
  modal.find('.modal-body #recipient-id').val(recipient)
})

</script>
</body>
</html>
<script>
$(document).ready(function() {
    $('#visa').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'.com
        ]
    } );
} );

$(document).ready(function() {
    $('#residency').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'.com
        ]
    } );
} );
$(document).ready(function() {
    $('#renewal').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'.com
        ]
    } );
} );
$(document).ready(function() {
    $('#domiciliation').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'.com
        ]
    } );
} );
$(document).ready(function() {
    $('#other').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'.com
        ]
    } );
} );
 </script>


<?php
}
else
{
  header('location:login.php');
}
?>