<?php
require_once 'db_con.php';
require_once 'header.php';
?>
<div class="container-fluid">
  <div class="row">

<?php
	error_reporting(E_ERROR||E_WARNING);

	$blood_group=$_REQUEST['blood_group'];
	$op=mysqli_query($conn,"SELECT DISTINCT blood_group FROM donor_reg");
	$dist=$_REQUEST['district'];
	$op1=mysqli_query($conn,"SELECT DISTINCT district FROM donor_reg");
	$city=$_REQUEST['city'];
	$op2=mysqli_query($conn,"SELECT DISTINCT city FROM donor_reg");

?>
<div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
      <div class="panel-body">
<form role="form" action="find_donor.php" method="post">
<div class="form-group">
		<label for="blood_group">Blood Group</label>
		<select class="form-control" name="blood_group">
		<option value="allgroup">All</option>

<?php
	while($res=mysqli_fetch_array($op)){
		$b=$res['blood_group'];
		if(strcmp ($b,$blood_group) == 0){
	    			$isSelected="selected";
	    		}
	    		else{
	    			$isSelected="";
	    		}
		

?>
	<option value="<?= $b; ?>" <?= $isSelected; ?> > <?= $b; ?> </option>
<?php } ?>
		</select>
		</div>

<div class="form-group">
	<label for="district">District</label>
	<SELECT class="form-control" name="district">
	<option value="alldist">All</option>
	<?php
	while($res1=mysqli_fetch_array($op1)){
		$d=$res1['district'];
		if(strcmp($d,$dist)==0){
			$isSelected="selected";
		}else{
			$isSelected="";
		}
	?>
	<option value="<?= $d; ?>" <?= $isSelected; ?> ><?= $d; ?></option>
	<?php } ?>
	</SELECT>
	</div>

<div class="form-group">
	<label for="city">City</label>
	<SELECT class="form-control" name="city">
	<option value="allcity">All</option>
	<?php
	while($res2=mysqli_fetch_array($op2)){
		$c=$res2['city'];
		if(strcmp($c,$city)==0){
			$isSelected="selected";
		}else{
			$isSelected="";
		}

	?>
	<option value="<?= $c; ?>" <?= $isSelected; ?> ><?=  $c; ?></option>

	<?php } ?>
	</SELECT>
	</div>
	<center><input class="btn btn-info" type="submit" name="submit" value="Search"></center>
	</form>


	<?php
	if($blood_group=='allgroup' && $dist=='alldist' && $city=='allcity'){
		$qall=mysqli_query($conn,"SELECT * FROM donor_reg");
		while($r=mysqli_fetch_array($qall)){
			echo "<hr>";
			echo "<div class='container-fluid' style='background-color:#D8D8D8;'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>Donor Name</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['name']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Blood Group</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['blood_group']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Weight</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['weight']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Age</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['age']."</b></td>";
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
			echo "<th><b>Mobile Number</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['mobile_number']."</b></td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";

			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
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
			echo "<th><b>Email</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['email']."</b></td>";
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
			echo "<th><b>Available/Unavailable</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r['ability']."</b></td>";
			echo "</tr>";
			echo "</table>";
	  		echo "</div>";
		 	echo "</div>";
		 	echo "<br/>";
		 	echo "</div>";
		}
	}
	elseif ($blood_group!='allgroup' && $dist=='alldist' && $city=='allcity') {
		$qblood=mysqli_query($conn,"SELECT * FROM donor_reg WHERE blood_group='$blood_group'");
		while ($r1=mysqli_fetch_array($qblood)) {
			echo "<hr>";
			echo "<div class='container-fluid' style='background-color:#D8D8D8;'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>Donor Name</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['name']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Blood Group</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['blood_group']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Weight</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['weight']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Age</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['age']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Gender</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['gender']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Date of Birth</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['date_of_birth']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Mobile Number</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['mobile_number']."</b></td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";

			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>District</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['district']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>City</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['city']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Email</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['email']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Present Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['present_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Permanent Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['permanent_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Available/Unavailable</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r1['ability']."</b></td>";
			echo "</tr>";
			echo "</table>";
	  		echo "</div>";
		 	echo "</div>";
		 	echo "<br/>";
		 	echo "</div>";
		}
	}
	elseif ($blood_group!='allgroup' && $dist!='alldist' && $city=='allcity') {
		$qdist=mysqli_query($conn,"SELECT * FROM donor_reg WHERE district='$dist'");
		while ($r2=mysqli_fetch_array($qdist)) {
			echo "<hr>";
			echo "<div class='container-fluid' style='background-color:#D8D8D8;'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>Donor Name</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['name']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Blood Group</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['blood_group']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Weight</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['weight']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Age</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['age']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Gender</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['gender']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Date of Birth</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['date_of_birth']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Mobile Number</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['mobile_number']."</b></td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";

			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>District</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['district']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>City</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['city']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Email</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['email']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Present Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['present_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Permanent Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['permanent_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Available/Unavailable</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r2['ability']."</b></td>";
			echo "</tr>";
			echo "</table>";
	  		echo "</div>";
		 	echo "</div>";
		 	echo "<br/>";
		 	echo "</div>";
		}
	}
	elseif ($blood_group!='allgroup' && $dist!='alldist' && $city!='allcity') {
		$qcity=mysqli_query($conn,"SELECT * FROM donor_reg WHERE city='$city'");
		while ($r3=mysqli_fetch_array($qcity)) {
			echo "<hr>";
			echo "<div class='container-fluid' style='background-color:#D8D8D8;'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>Donor Name</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['name']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Blood Group</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['blood_group']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Weight</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['weight']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Age</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['age']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Gender</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['gender']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Date of Birth</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['date_of_birth']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Mobile Number</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['mobile_number']."</b></td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";

			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>District</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['district']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>City</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['city']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Email</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['email']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Present Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['present_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Permanent Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['permanent_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Available/Unavailable</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r3['ability']."</b></td>";
			echo "</tr>";
			echo "</table>";
	  		echo "</div>";
		 	echo "</div>";
		 	echo "<br/>";
		 	echo "</div>";
		}
	}
	else{
		$other=mysql_query($conn,"SELECT * FROM donor_reg WHERE blood_group='$blood_group' AND district='$dist' AND city='$city'");
		while ($r4=mysqli_fetch_array($other)) {
			echo "<hr>";
			echo "<div class='container-fluid' style='background-color:#D8D8D8;'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>Donor Name</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['name']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Blood Group</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['blood_group']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Weight</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['weight']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Age</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['age']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Gender</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['gender']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Date of Birth</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['date_of_birth']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Mobile Number</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['mobile_number']."</b></td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";

			echo "<div class='col-sm-6'>";
			echo "<br/>";
			echo "<table>";
			echo "<tr>";
			echo "<th><b>District</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['district']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>City</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['city']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Email</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['email']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Present Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['present_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Permanent Address</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['permanent_address']."</b></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th><b>Available/Unavailable</b></th>";
			echo "<th>&nbsp; : &nbsp;</th>";
			echo "<td><b style='color:#21610B;'>".$r4['ability']."</b></td>";
			echo "</tr>";
			echo "</table>";
	  		echo "</div>";
		 	echo "</div>";
		 	echo "<br/>";
		 	echo "</div>";
		}
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