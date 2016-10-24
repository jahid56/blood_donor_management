<?php
require_once 'db_con.php';
require_once 'header.php';
include('session.php');
?>

<?php
//error_reporting(E_ERROR||E_WARNING);
	$id=$_REQUEST['id'];
      if(isset($_POST['submit'])){
      	
      		$uid=$_POST['u_id'];
      		$name=$_POST['name'];
      		$bgroup=$_POST['blood_group'];
      		$weight=$_POST['weight'];
      		$age=$_POST['age'];
      		$gender=$_POST['gender'];
      		$dob=$_POST['date'];
      		$mob=$_POST['number'];
      		$email=$_POST['email'];
      		$occu=$_POST['occupation'];
      	$sql = "UPDATE member_reg SET user_id='$uid',name='$name',blood_group='$bgroup',weight='$weight',age='$age',gender='$gender',dob='$dob',mobile='$mob',email='$email',occupation='$occu' WHERE id='$id'";
      	$retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('<center><b style="color:red;">Could not update data</b></center> ' . mysqli_error($conn));
            }
            echo "Updated data successfully! Please Login again.";
            header("Location:mem_login.php");


      }

      	if($id==TRUE){
		$sql=mysqli_query($conn,"SELECT * FROM member_reg WHERE id='$id'");
		$result = mysqli_fetch_array($sql);
		//print_r($result);

?>
<div class="container-fluid">
  <div class="row">
<center>
<h2>Update Member Information</h2>
</center>

    <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
           <b>Log in Information</b>
          </h3>
        </div>
        <div class="panel-body">
<form role="form"action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

<div class="form-group">
<label for="user_id">User ID</label>
<input class="form-control" type="text" name="u_id" value="<?= $result['user_id']; ?>">
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
<input class="form-control" type="text" name="name" value="<?= $result['name']; ?>">
</div>
<div class="form-group">
<label for="blood_group">
Blood Group:</label>
<select class="form-control" name="blood_group">

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
</div>
<div class="form-group">
<label for="weight">Weight</label>
<input class="form-control" type="text" name="weight" value="<?= $result['weight']; ?>">
</div>
<div class="form-group">
<label for="age">Age</label>
<input class="form-control" type="text" name="age" value="<?= $result['age']; ?>">
</div>
<div class="form-group">
<label for="gender">Gender</label>
<select class="form-control" name="gender">
	<option value="Select">-----Select-----</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
</select>
</div>
<div class="form-group">
<label for="dob">Date of Birth</label>
<input class="form-control" type="text" name="date" id="example1" value="<?= $result['dob']; ?>">
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
<input class="form-control" type="text" name="number" value="<?= $result['mobile']; ?>">
</div>
<div class="form-group">
<label for="email">E-mail ID</label>
<input class="form-control" type="text" name="email" value="<?= $result['email']; ?>">
</div>
<div class="form-group">
<label for="occupation">Occupation</label>
<input class="form-control" type="text" name="occupation" value="<?= $result['occupation']; ?>">
</div>

<center><input type="submit" name="submit" value="Update" class="btn btn-info"></center>
</form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<?php
   include("footer.php");
?>