<?php
date_default_timezone_set("Asia/Karachi");
$date = date("Y-m-d");
session_start();
$loginuser = $_SESSION['loginuser'];
if($_SESSION['loginuser'] ==  true)
{
include 'connection.php';

// Research
$sqlr = "SELECT rid, rdate, status FROM research WHERE cid = '$loginuser'";
$resultr = $conn->query($sqlr);

// Institution
$sqlins = "SELECT iid, rdate, status FROM institution WHERE cid = '$loginuser'";
$resultins = $conn->query($sqlins);

// Recognition
$sqlrec = "SELECT rid, rdate, status FROM recognition WHERE cid = '$loginuser'";
$resultrec = $conn->query($sqlrec);

// Support
$sqlsup = "SELECT sid, subject, rdate, status FROM support WHERE cid = '$loginuser'";
$resultsup = $conn->query($sqlsup);
?>
<html>
<title>Dashboard | Submitted Educational Applications</title>
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
<a href="Legal.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-legal"></i> Legal Forms</a>
    <a href="Submitted.php" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-check-circle"></i> Submitted Applications</a>
    <a href="PSW.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-key"></i> Change Password</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i> Logout</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-check-circle"></i> Submitted Educational Applications</b></h5>
  </header>


 <div class="w3-row-padding w3-margin-bottom">
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#research">Research Degree</a></li>
    <li><a data-toggle="tab" href="#menu1">Institution Selection</a></li>
    <li><a data-toggle="tab" href="#menu2">Degree Recognition</a></li>
    <li><a data-toggle="tab" href="#menu3">Support</a></li>
  </ul>
  <div class="tab-content">
    <div id="research" class="tab-pane fade in active">
        <br>
      <table id="categories" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Submission Details</center></th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resultr->num_rows > 0) {
    // output data of each row
        while($row = $resultr->fetch_assoc()) {
                $ids = $row['rid'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
      echo "<td>Research Educational Journey</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
        echo "<td><center><form action=showresearch.php target=_blank>
      <input name=id type=hidden value='".$row['rid']."'> <center><input type=image src=img/views.png alt=Submit width=25 height=13 style = margin-top:15px;></form></center></td>";
      
        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removeProductModal data-whatever='".$row['rid']."' data-name='".$row['rdate']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removeProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="action/delcat.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : red;">Make sure there are no Account Details associated to with client. Otherwise, client cannot 
              be deleted.</p><h5>Are you sure you want to permanently remove this client?</h5><br>
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
    <div id="menu1" class="tab-pane fade">
      <br>
      <table id="institution" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Submission Details</center></th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resultins->num_rows > 0) {
    // output data of each row
        while($row = $resultins->fetch_assoc()) {
                $ids = $row['iid'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
      echo "<td>Academic Institution of Choice</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
        echo "<td><center><form action=showInstitution.php target=_blank>
      <input name=id type=hidden value='".$row['iid']."'> <center><input type=image src=img/views.png alt=Submit width=25 height=13 style = margin-top:15px;></form></center></td>";
      
        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removeProductModal data-whatever='".$row['iid']."' data-name='".$row['rdate']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removeProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="action/delcat.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : red;">Make sure there are no Account Details associated to with client. Otherwise, client cannot 
              be deleted.</p><h5>Are you sure you want to permanently remove this client?</h5><br>
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
      <table id="recognition" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Submission Details</center></th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resultrec->num_rows > 0) {
    // output data of each row
        while($row = $resultrec->fetch_assoc()) {
                $ids = $row['rid'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
      echo "<td>Recognition/Homologation of Degree</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
        echo "<td><center><form action=showrecognition.php target=_blank>
      <input name=id type=hidden value='".$row['rid']."'> <center><input type=image src=img/views.png alt=Submit width=25 height=13 style = margin-top:15px;></form></center></td>";
      
        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removeProductModal data-whatever='".$row['rid']."' data-name='".$row['rdate']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removeProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="action/delcat.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : red;">Make sure there are no Account Details associated to with client. Otherwise, client cannot 
              be deleted.</p><h5>Are you sure you want to permanently remove this client?</h5><br>
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
      <table id="support" class="display nowrap" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Case</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th><center>Delete Application</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
    if ($resultsup->num_rows > 0) {
    // output data of each row
        while($row = $resultsup->fetch_assoc()) {
                $ids = $row['sid'];
      ?>
            <tr>
            <?php
      echo "<td> ES-".$ids."</td>";
      echo "<td>".$row['subject']."</td>";
      echo "<td>".$row['rdate']."</td>";
      echo "<td>".$row['status']."</td>";
      
        echo "<td><center>
        <input type=image src=img/deletes.png data-toggle=modal data-target=#removeProductModal data-whatever='".$row['sid']."' data-name='".$row['rdate']."'  width=30 height=30></center></td>";
        
            ?>
            </tr>
            <?php
       
    }
} else {
    echo "0 results";
}
            ?>


   <div class="modal fade" id="removeProductModal" role="dialog">
    <div class="modal-dialog" role="document">
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="action/delcat.php" method="POST">
            
          <div class="form-group">
            <center><p style="color : red;">Make sure there are no Account Details associated to with client. Otherwise, client cannot 
              be deleted.</p><h5>Are you sure you want to permanently remove this client?</h5><br>
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


$('#removeProductModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var name = button.data('name')

 // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deleting Client ' + name)
  modal.find('.modal-body #recipient-id').val(recipient)
})

</script>
</body>
</html>
<script>
$(document).ready(function() {
    $('#categories').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'.com
        ]
    } );
} );

$(document).ready(function() {
    $('#institution').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'.com
        ]
    } );
} );
$(document).ready(function() {
    $('#recognition').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'.com
        ]
    } );
} );
$(document).ready(function() {
    $('#support').DataTable( {
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