<?php
require_once 'db_con.php';
require_once 'header.php';
?>
<style>
.error {color: #FF0000;}
</style>

<?php

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


error_reporting(E_ERROR||E_WARNING);
// define variables and set to empty values
$uidErr = $passErr = $retype_passErr = $nameErr = $blood_groupErr=$weightErr=$ageErr=$genderErr=$dobErr=$mobileErr=$emailErr=$per_addressErr="";
$uid = $pass = $retype_pass = $name = $blood_group = $weight=$age=$gender=$dob=$mobile=$email=$per_address="";
if(isset($_POST['submit'])){


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["user_id"])) {
     $uidErr = "User ID is required";
     $var=true;
   } else {
     $uid = test_input($_POST["user_id"]);
   }
  
   if (empty($_POST["pass"])) {
     $passErr = "Password is required";
     $var=true;
   } else {
     $pass = test_input($_POST["pass"]);
    }
    
   if (empty($_POST["name"])) {
      $nameErr = "Name is required";
      $var=true;
    } else {
      $name = test_input($_POST["name"]);
    }

     if (empty($_POST["blood_group"]) || $_POST["blood_group"]=="Select") {
     $blood_groupErr = "Blood Group is required";
     $var=true;
    } else {
      $blood_group = test_input($_POST["blood_group"]);
   }

    if(empty($_POST["weight"])){
    	$weightErr="Weight is required";
    	$var=true;
    }else{
    	$weight=test_input($_POST["weight"]);
    }

    if(empty($_POST["age"])){
    	$ageErr="Age is required";
    	$var=true;
    }else{
    	$age=test_input($_POST["age"]);
    }

    if (empty($_POST["gender"]) || $_POST["gender"]=="Select") {
      $genderErr = "Gender is required";
      $var=true;
    } else {
      $gender = test_input($_POST["gender"]);
    }

    if(empty($_POST['date'])){
    	$dobErr="Date of Birth is required";
    	$var=true;
    }else{
    	$dob=test_input($_POST["dob"]);
    }

    if(empty($_POST["number"])){
    	$mobileErr="Contact Number is required";
    	$var=true;
    }else{
    	$mobile=test_input($_POST["mobile"]);
    }

    if(empty($_POST["email"])){
    	$emailErr="Email is required";
    	$var=true;
    }else{
    	$email=test_input($_POST["email"]);
    }

    if(empty($_POST["per_address"])){
    	$per_addressErr="Permanent Address is required";
    	$var=true;
    }else{
    	$per_address=test_input($_POST["per_address"]);
    }
}
	if(!$var){
		$fname=$_POST['name'];
		$mobile=$_POST['number'];
		$pre_address=$_POST['pre_address'];
		$per_address=$_POST['per_address'];
		$blood_group=$_POST['blood_group'];
		$weight=$_POST['weight'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$dob=$_POST['date'];
		$occupation=$_POST['occupation'];
		$why_join=$_POST['why'];
		$email=$_POST['email'];
		$uid=$_POST['user_id'];
		$pass=md5($_POST['pass']);
		$sql="INSERT INTO member_reg(name,mobile,present_add,permanent_add,blood_group,weight,age,gender,dob,occupation,why_join,email,user_id,pass) VALUES('$fname','$mobile','$pre_address','$per_address','$blood_group','$weight','$age','$gender','$dob','$occupation','$why_join','$email','$uid','$pass')";
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
        </script>


<div class="container-fluid">
  <div class="row">
<center>
<h2>Member Registration</h2>
</center>

    <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
           <b>Log in Information</b>
          </h3>
        </div>
        <div class="panel-body">
<form role="form"action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<p><span class="error">* required field.</span></p>

<div class="form-group">
<label for="user_id">User ID</label>
<input class="form-control" type="text" name="user_id" value="<?php echo $uid;?>">
<span class="error">* <?php echo $uidErr;?></span>
</div>
<div class="form-group">
<label for="password">Password</label>
<input class="form-control" type="password" name="pass" value="<?php echo $pass;?>">
<span class="error">* <?php echo $passErr;?></span>
</div>
<div class="form-group">
<label for="retype_password">Re-type Password</label>
<input class="form-control" type="password" name="pass2">
<span class="error">* <?php if ($_POST['pass']!= $_POST['pass2']){
     echo("Oops! Password did not match! Try again. ");
 	}?></span>
  </div>
      </div>
      </div>


      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
          <b> Basic Information</b>
          </h3>
        </div>
        <div class="panel-body">
<div class="form-group">
<label for="full_name">Full Name</label>
<input class="form-control" type="text" name="name" value="<?php echo $name;?>">
<span class="error">* <?php echo $nameErr;?></span>
</div>
<div class="form-group">
<label for="blood_group">
Blood Group:</label>
<select class="form-control" name="blood_group" value="<?php echo $blood_group;?>">

	<option value="Select">-----Select-----</option>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
	<option value="B+">B+</option>
	<option value="B-">B-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>
	<option value="O+">O+</option>
	<option value="O-">O-</option>
</select>
<span class="error">* <?php echo $blood_groupErr;?></span>
</div>
<div class="form-group">
<label for="weight">Weight</label>
<input class="form-control" type="text" name="weight" value="<?php echo $weight;?>">
<span class="error">* <?php echo $weightErr;?></span>
</div>
<div class="form-group">
<label for="age">Age</label>
<input class="form-control" type="text" name="age" value="<?php echo $age;?>">
<span class="error">* <?php echo $ageErr;?></span>
</div>
<div class="form-group">
<label for="gender">Gender</label>
<select class="form-control" name="gender">
	<option value="Select">-----Select-----</option>
	<option <?php if (isset($gender) && $gender=="male") echo "selected";?> value="male">Male</option>
	<option <?php if (isset($gender) && $gender=="female") echo "selected";?> value="female">Female</option>
</select>
<span class="error">* <?php echo $genderErr;?></span>
</div>
<div class="form-group">
<label for="dob">Date of Birth</label>
<input class="form-control" type="text" name="date" id="example1" value="<?php echo $dob;?>">
<span class="error">* <?php echo $dobErr;?></span>
</div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            <b>Contact Information</b>
          </h3>
        </div>
        <div class="panel-body">
<div class="form-group">
<label for="contact_number">Contact Number</label>
<input class="form-control" type="text" name="number" value="<?php echo $mobile;?>">
<span class="error">* <?php echo $mobileErr;?></span>
</div>
<div class="form-group">
<label for="email">E-mail ID</label>
<input class="form-control" type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span>
</div>
<div class="form-group">
<label for="per_adress">Permanent Address</label>
<textarea class="form-control" name="per_address" rows="3" cols="18" value="<?php echo $per_address;?>"></textarea>
<span class="error">* <?php echo $per_addressErr;?></span>
</div>
<div class="form-group">
<label for="pre_address">Present Address</label>
<textarea class="form-control" name="pre_address" rows="3" cols="18"></textarea>
</div>
<div class="form-group">
<label for="why">Why Join</label>
<textarea class="form-control" name="why" rows="3" cols="18"></textarea>
</div>
<div class="form-group">
<label for="occupation">Occupation</label>
<input class="form-control" type="text" name="occupation">
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