<?php
require_once 'db_con.php';
require_once 'header.php';
?>
<style>
.error {color: #FF0000;}
</style>

<?php

	function test_input($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;

}


error_reporting(E_ERROR||E_WARNING);
//define variables and set to empty values
$pnameErr=$blood_groupErr=$ageErr=$ndateErr=$unitErr=$mobileErr=$hnameErr=$cityErr=$locationErr=$addressErr=$diseaseErr=$sdateErr=$emailErr="";
$pname=$blood_group=$age=$ndate=$unit=$mobile=$hname=$city=$location=$address=$disease=$sdate=$email="";
if(isset($_POST['submit'])){

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(empty($_POST["pname"])){
			$pnameErr="patient name is required";
			$var=true;
		}else{
			$pname=test_input($_POST["pname"]);
		}

		if(empty($_POST["blood_group"]) || $_POST["blood_group"]=="Select"){
			$blood_groupErr="blood group is required";
			$var=true;
		}else{
			$blood_group=test_input($_POST["blood_group"]);
		}

		if(empty($_POST["age"])){
			$ageErr="age is required";
			$var=true;
		}else{
			$age=test_input($_POST["age"]);
		}

		if(empty($_POST["ndate"])){
			$ndateErr="date is required";
			$var=true;
		}else{
			$ndate=test_input($_POST["ndate"]);
		}

		if(empty($_POST["unit"])){
			$unitErr="unit is required";
			$var=true;
		}else{
			$unit=test_input($_POST["unit"]);
		}

		if(empty($_POST["number"])){
			$mobileErr="contact number is required";
			$var=true;
		}else{
			$mobile=test_input($_POST["number"]);
		}

		if(empty($_POST["hname"])){
			$hnameErr="hospital name is required";
			$var=true;
		}else{
			$hname=test_input($_POST["hname"]);
		}

		if(empty($_POST["city"])){
			$cityErr="city is required";
			$var=true;
		}else{
			$city=test_input($_POST["city"]);
		}

		if(empty($_POST["location"])){
			$locationErr="location is required";
			$var=true;
		}else{
			$location=test_input($_POST["location"]);
		}

		if(empty($_POST["address"])){
			$addressErr="patient address is required";
			$var=true;
		}else{
			$address=test_input($_POST["address"]);
		}

		if(empty($_POST["disease"])){
			$diseaseErr="patient disease is required";
			$var=true;
		}else{
			$disease=test_input($_POST["disease"]);
		}

		if(empty($_POST["sdate"])){
			$sdateErr="submission date is required";
			$var=true;
		}else{
			$sdate=test_input($_POST["sdate"]);
		}

		if(empty($_POST["email"])){
			$emailErr="email is required";
			$var=true;
		}else{
			$email=test_input($_POST["email"]);
		}


	}
	if(!$var){
	$p_name=$_POST['pname'];
	$pblood_group=$_POST['blood_group'];
	$p_age=$_POST['age'];
	$need_blood=$_POST['ndate'];
	$quantity=$_POST['unit'];
	$cont_number=$_POST['number'];
	$hname=$_POST['hname'];
	$city=$_POST['city'];
	$location=$_POST['location'];
	$paddress=$_POST['address'];
	$tod=$_POST['disease'];
	$sdate=$_POST['sdate'];
	$email=$_POST['email'];
	$sql="INSERT INTO b_req(patient_name,pblood_group,p_age,need_blood,quantity,cont_number,hospital_name,city,location,patient_address,disease,reqsubmission_date,email) VALUES('$p_name','$pblood_group','$p_age','$need_blood','$quantity', '$cont_number','$hname','$city','$location','$paddress','$tod','$sdate','$email')";
	$result=mysqli_query($conn,$sql);
	if(!$result){
			echo "<center><b style='color:red;'>Error in submission!Please try again</b></center>";
		}else{
			echo "<center><b style='color:red;'>Submited Successfully!</b></center>";
		}
	}
}
?>

        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "yyyy/mm/dd"
                });  
            
            });

            $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "yyyy/mm/dd"
                });  
            
            });
        </script>


<div class="container-fluid">
  <div class="row">
  <center><h3>POST BLOOD REQUEST</h3></center>
  <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
      <div class="panel-body">
<p>Dear,
Please fill the following information to post your blood request. We will inform our donors and we hope the needy people recover soon.</p>
</div>
</div>
</div>

<div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
           If your are already posted your blood request and want to update your blood request then please enter request code and press submit.
          </h3>
        </div>
        <div class="panel-body">
<form role="form" action="blood_req.php" method="post">
<div class="form-group">
<label for="code"> Enter Your Blood Request Code</label>
<input class="form-control" type="text" name="code">
</div>
<center><input type="submit" name="search" value="Submit" class="btn btn-info"></center>
</form>
</div>
</div>
</div>

<div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
      <div class="panel-body">
<form role="form" action="blood_req.php" method="post">
<div class="form-group">
<label for="p_name">Patient Name</label>
<input class="form-control" type="text" name="pname" value="<?= $pname; ?>">
<span class="error">*<?= $pnameErr; ?></span>
</div>
<div class="form-group">
<label for="blood_group">Patient Blood Group</label>
<select class="form-control" name="blood_group" value="<?= $blood_group; ?>">
	<option value="Select">-----select-----</option>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
	<option value="B+">B+</option>
	<option value="B-">B-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>
	<option value="O+">O+</option>
	<option value="O-">O-</option>
</select>
<span class="error">*<?= $blood_groupErr; ?></span>
</div>
<div class="form-group">
<label for="age">Patient Age</label>
<input class="form-control" type="text" name="age" value="<?= $age; ?>">
<span class="error">*<?= $ageErr; ?></span>
</div>
<div class="form-group">
<label for="need_blood">When You Need Blood</label>
<input class="form-control" type="text" name="ndate" id="example1" value="<?= $ndate; ?>">
<span class="error">*<?= $ndateErr; ?></span>
</div>
<div class="form-group">
<label for="units">How many units you need ? </label>
<input class="form-control" type="text" name="unit" value="<?= $unit; ?>">
<span class="error">*<?= $unitErr; ?></span>
</div>
<div class="form-group">
<label for="number">Contact Number</label>
<input class="form-control" type="text" name="number" value="<?= $mobile; ?>">
<span class="error">*<?= $mobileErr; ?></span>
</div>
<div class="form-group">
<label for="hospital_name">Hospital Name</label>
<input class="form-control" type="text" name="hname" value="<?= $hname; ?>">
<span class="error">*<?= $hnameErr; ?></span>
</div>
<div class="form-group">
<label for="city">City</label>
<input class="form-control" type="text" name="city" value="<?= $city; ?>">
<span class="error">*<?= $cityErr; ?></span>
</div>
<div class="form-group">
<label for="location">Location</label>
<input class="form-control" type="text" name="location" value="<?= $location; ?>">
<span class="error">*<?= $locationErr; ?></span>
</div>
<div class="form-group">
<label for="paddress">Patient Address</label>
<textarea class="form-control" name="address" rows="5" cols="40" value="<?= $address; ?>"></textarea>
<span class="error">*<?= $addressErr; ?></span>
</div>
<div class="form-group">
<label for="disease">Type of Disease</label>
<textarea class="form-control" name="disease" rows="5" cols="40" value="<?= $disease;?>"></textarea>
<span class="error">*<?= $diseaseErr; ?></span>
</div>
<div class="form-group">
<label for="date">Request Submission Date</label>
<input class="form-control" type="text" name="sdate" id="example2" value="<?= $sdate; ?>">
<span class="error">*<?= $sdateErr; ?></span>
</div>
<div class="form-group">
<label for="email">E-mail</label>
<input class="form-control" type="text" name="email" value="<?= $email; ?>">
<span class="error">*<?= $emailErr; ?></span>
</div>
<center><input type="submit" name="submit" value="Submit" class="btn btn-info"></center>
</form>
</div>
</div>
</div>
</div>
</div>

<?php
   include("footer.php");
?>