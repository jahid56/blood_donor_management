<?php
require_once 'db_con.php';
require_once 'header.php';
?>


<?php
   include('donor_session.php');
   //error_reporting(E_ERROR||E_WARNING);
?>
      		<center><h3>Donor Personal Info.</h3></center>
       
      <div class="container-fluid">
  <div class="row">
  <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
      <div class="panel-body">
      <p>Welcome - <?php echo "<b style='color:red;font-size:15px;'>".$login_session."</b>"; ?>
      <a href = "donor_logout.php" style="float:right;" class="btn btn-warning">Sign Out</a>
      </p>

<?php
      $user_check = $_SESSION['login_donor'];
      if(isset($_SESSION['login_donor'])){
      	$mquery=mysqli_query($conn,"SELECT * FROM donor_reg WHERE user_id='$user_check'");
      	$r=mysqli_fetch_array($mquery);
			echo "<div class='container-fluid' style='background-color:#D8D8D8;'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-12'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>User ID</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['user_id']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Blood Group</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['blood_group']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Weight</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['weight']."&nbsp;Kg</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Age</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['age']."&nbsp;Years</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Gender</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['gender']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Date of Birth</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['date_of_birth']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>District</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['district']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>City</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['city']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Present Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['present_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Permanent Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['permanent_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Email</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['email']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Mobile Number</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['mobile_number']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Available/Unavailable</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['ability']."</b></td>";
			echo "</tr>";
			echo "</table>";
			echo "<a href='update_donor.php?id=".$r['id']."' class='btn btn-info'>Update Information</a>";
	  		echo "<a href='delete_donor.php' class='btn btn-info'>Delete Account</a>";
	  		echo "</div>";
		 	echo "</div>";
		 	echo "<br/>";
		 	echo "</div>";
      }
      ?>
  
      </div>
      </div>
      </div>
  </div>
  </div>

<?php
   include("footer.php");
?>