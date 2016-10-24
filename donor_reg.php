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
	//define variables and set to emty values
$nameErr=$blood_groupErr=$weightErr=$ageErr=$genderErr=$dobErr=$numberErr=$distErr=$cityErr=$emailErr=$per_addressErr=$pre_addressErr=$uidErr=$passErr=$retype_passErr="";
$name=$blood_group=$weight=$age=$gender=$dob=$number=$dist=$city=$email=$per_address=$pre_address=$uid=$pass=$retype_pass="";

	if(isset($_POST['submit'])){

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST["name"])){
				$nameErr="Name is required";
				$var=true;
			}else{
				$name=test_input($_POST["name"]);
			}

			if(empty($_POST["blood_group"]) || $_POST["blood_group"]=="Select"){
				$blood_groupErr="blood group is required";
				$var=true;
			}else{
				$blood_group=test_input($_POST["blood_group"]);
			}

			if(empty($_POST["weight"])){
				$weightErr="weight is required";
				$var=true;
			}else{
				$weight=test_input($_POST["weight"]);
			}

			if(empty($_POST["age"])){
				$ageErr="age is required";
				$var=true;
			}else{
				$age=test_input($_POST["age"]);
			}

			if(empty($_POST["gender"]) || $_POST["gender"]=="Select"){
				$genderErr="gender is required";
				$var=true;
			}else{
				$gender=test_input($_POST["gender"]);
			}

			if(empty($_POST["date"])){
				$dobErr="date of birth is required";
				$var=true;
			}else{
				$dob=test_input($_POST["date"]);
			}

			if(empty($_POST["number"])){
				$numberErr="contact number is required";
				$var=true;
			}else{
				$number=test_input($_POST["number"]);
			}

			if(empty($_POST["dist"]) || $_POST["dist"]=="Select"){
				$distErr="district is required";
				$var=true;
			}else{
				$dist=test_input($_POST["dist"]);
			}

			if(empty($_POST["city"]) || $_POST["city"]=="Select"){
				$cityErr="city is required";
				$var=true;
			}else{
				$city=test_input($_POST["city"]);
			}

			if(empty($_POST["email"])){
				$emailErr="email is required";
				$var=true;
			}else{
				$email=test_input($_POST["email"]);
			}

			if(empty($_POST["per_address"])){
				$per_addressErr="permanent address is required";
				$var=true;
			}else{
				$per_address=test_input($_POST["per_address"]);
			}

			if(empty($_POST["pre_address"])){
				$pre_addressErr="present address id required";
				$var=true;
			}else{
				$pre_address=test_input($_POST["pre_address"]);
			}

			if(empty($_POST["user_id"])){
				$uidErr="user id is required";
				$var=true;
			}else{
				$uid=test_input($_POST["user_id"]);
			}

			if(empty($_POST["pass"])){
				$passErr="password is required";
				$var=true;
			}else{
				$pass=test_input($_POST["pass"]);
			}

			if($_POST['pass']!=$_POST["pass2"]){
				$retype_passErr="Oops! Password did not match! Try again.";
				$var=true;
			}else{
				$retype_pass=test_input($_POST["pass"]==$_POST["pass2"]);
			}

}
	if(!$var){
		$fname=$_POST['name'];
		$bgroup=$_POST['blood_group'];
		$weight=$_POST['weight'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$dob=$_POST['date'];
		$cont_num=$_POST['number'];
		$dist=$_POST['dist'];
		$city=$_POST['city'];
		$email=$_POST['email'];
		$per_address=$_POST['per_address'];
		$pre_address=$_POST['pre_address'];
		$uid=$_POST['user_id'];
		$pass=md5($_POST['pass']);
		$ability=$_POST['ability'];
		$sql="INSERT INTO donor_reg(name,blood_group,weight,age,gender,date_of_birth,mobile_number,district,city,email,present_address,permanent_address,user_id,pass,ability) VALUES('$fname','$bgroup','$weight','$age','$gender','$dob','$cont_num','$dist','$city','$email','$pre_address','$per_address','$uid','$pass','$ability')";
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

<center><h2>Donor Registration</h2></center>
<div class="container-fluid">
  <div class="row">
  <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
      <div class="panel-body">
<p>Please fill the following information to register as voluntary blood donor and become part of F2S vision. Kindly update your date of donatoin once done, so that your name will be hidden automatically till next 3 Months. Also please update your profile/information if in case you relocate in future. </p>
	</div>
	</div>
	</div>

<div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title">
           <b>Basic Information</b>
          </h3>
        </div>
      <div class="panel-body">
<form role="form" action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="demoForm" class="demoForm">
         <p><span class="error">* required field.</span></p>
<div class="form-group">
<label for="full_name">Full Name</label>
<input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
<span class="error">*<?php echo $nameErr;?></span>
</div>
<div class="form-group">
<label for="blood_group">Blood Group</label>
<select class="form-control" name="blood_group" value="<?php echo $blood_group; ?>">
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
<span class="error">*<?php echo $blood_groupErr;?></span>
</div>
<div class="form-group">
<label for="weight">Weight</label>
<input class="form-control" type="text" name="weight" value="<?php echo $weight; ?>">
<span class="error">*<?php echo $weightErr;?></span>
</div>
<div class="form-group">
<label for="age">Age</label>
<input class="form-control" type="text" name="age" value="<?php echo $age; ?>">
<span class="error">*<?php echo $ageErr;?></span>
</div>
<div class="form-group">
<label for="gender">Gender</label>
<select class="form-control" name="gender" value="<?php echo $gender; ?>">
	<option value="Select">-----Select-----</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
</select>
<span class="error">*<?php echo $genderErr;?></span>
</div>
<div class="form-group">
<label for="dob">Date of Birth:</label>
<input class="form-control" type="text" name="date" id="example1" value="<?php echo $dob; ?>">
<span class="error">*<?php echo $dobErr;?></span>
</div>
</div>
</div>
</div>

<div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
           <b>Contact Information</b>
          </h3>
        </div>
        <div class="panel-body">
<div class="form-group">
<label for="contact_number">Contact Number</label>
<input class="form-control" type="text" name="number" value="<?php echo $number; ?>">
<span class="error">*<?php echo $numberErr;?></span>
</div>
<div class="form-group">
<label for="division">Select District</label>
<select class="form-control" name="dist" value="<?php echo $dist; ?>">
	<option value="Select">-----Select-----</option>
	<option value="dhaka">Dhaka</option>
	<option value="rajshahi">Rajshahi</option>
	<option value="chittagong">Chittagong</option>
	<option value="Khulna">khulna</option>
	<option value="barishal">Barishal</option>
	<option value="sylhet">Sylhet</option>
	<option value="rangpur">Rangpur</option>
</select>
<span class="error">*<?php echo $distErr;?></span>
</div>
<div class="form-group">
<label for="city">Select City</label>
<select class="form-control" name="city" id="city" value="<?php echo $city; ?>">
	<option value="0">-----Select-----</option>
	<option value=""></option>
            <!-- js populates -->
</select>
<span class="error">*<?php echo $cityErr;?></span>
</div>
<div class="form-group">
<label for="email">E-mail ID</label>
<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
<span class="error">*<?php echo $emailErr;?></span>
</div>
<div class="form-group">
<label for="p_address">Permanent Address</label>
<textarea class="form-control" name="per_address" rows="5" cols="40" value="<?php echo $per_address; ?>"></textarea>
<span class="error">*<?php echo $per_addressErr;?></span>
</div>
<div class="form-group">
<label for="pre_address">Present Address</label>
<textarea class="form-control" name="pre_address" rows="5" cols="40" value="<?php echo $pre_address; ?>"></textarea>
<span class="error">*<?php echo $pre_addressErr;?></span>
</div>
<div class="form-group">
<label for="user">User ID</label>
<input class="form-control" type="text" name="user_id" value="<?php echo $uid; ?>">
<span class="error">*<?php echo $uidErr;?></span>
</div>
<div class="form-group">
<label for="pass">Password</label>
<input class="form-control" type="password" name="pass" value="<?php echo $pass; ?>">
<span class="error">*<?php echo $passErr;?></span>
</div>
<div class="form-group">
<label for="re-pass">Re-type Password</label>
<input class="form-control" type="password" name="pass2" value="<?= $retype_pass; ?>">
<span class="error">*<?= $retype_passErr; ?></span>
</div>
<div class="form-group">
<label for="avail">Please confirm your availability to donate blood</label>
<select class="form-control" name="ability">
	<option value="available">Available</option>
	<option value="unavailable">UnAvailable</option>
</select>
</div>
<input type="checkbox" name="check" value="check" checked> I authorise the website to display my name and telephone number, so that the needy could contact me, as and when there is an emergency.
<center>
<input type="submit" name="submit" class="btn btn-info" value="Submit">
</center>
</form>
</div>
</div>
</div>

<script>
// object literal holding data for option elements
var Select_List_Data = {
    
    'city': { // name of associated select box
        
        // names match option values in controlling select box
        dhaka: {
            text: ['Dhaka', 'Foridpur', 'Gazipur', 'Gopalgong', 'Jamalpur','Kishoregong','Madaripur','Manikgong','Munshigang','Mymensingh','Narayangang','Narshingdi','Netrokona','Rajbari','Shariatpur','Sherpur','Tangail'],
            value: [' ','dhaka', 'foridpur', 'gazipur', 'gopalgong', 'jamalpur','kishoegong','madaripur','manikgang','munshigang','mymensingh','narayangang','narshingdi','netrokona','rajbari','shariatpur','sherpur','tangail']
        },
        rajshahi: {
            text: ['Jaipurhat', 'Naogoan', 'Bogra', 'Nawabganj','Rajshahi','Natore','Sirajgonj','Pabna'],
            value: ['jaipurhat', 'noagoan', 'bogra', 'nawabganj','rajshahi','natore','sirajgonj','pabna']
        },
        chittagong: {
            text: ['Bandarban', 'Brahmanbaria', 'Chandpur', 'Chittagong','Comilla','Coxs Bazar','Feni','Khagrachori','Lakshmipur','Noakhali','Rangamati'],
            value: ['bandarban', 'brahmanbaria', 'chandpur', 'chittagong','comilla','coxs','feni','khagrachori','lakshmipur','noakhali','rangamati']
        },
        Khulna: {
            text: ['Bagerhat', 'Chuadanga', 'Jessore', 'Jhenaidah', 'Khulna','Kushtia','Magura','Meherpur','Narail','Satkhira'],
            value: ['bagerhat', 'chuadanga', 'jessore', 'jhenaidah', 'khulna','kushtia','magua','meherpur','narail','satkhira']
        },
        barishal: {
            text: ['Barguna', 'Barishal', 'Bhola', 'Jhalokati','Patuakhali','Pirojpur'],
            value: ['barguna', 'barishal', 'bhola', 'jhalokati','patuakhali','pirojpur']
        },
        sylhet: {
            text: ['Scrolling Divs', 'Tooltips', 'Rotate Images', 'Scrollers', 'Banner Rotator'],
            value: ['scroll', 'tooltips', 'rotate', 'scrollers', 'banner']
        },
        rangpur: {
            text: ['Panchagarh', 'Thakurgaon', 'Nilphamary', 'Lalmonirhat', 'Dinjpur','Rangpur','Kurigram','Gaibandha'],
            value: ['panchagarh', 'thakurgaon', 'nilphamary', 'lalmonirhat', 'dinajpur','rangpur','kurigram','gaibandha']
        }
    
    }    
};


// removes all option elements in select box 
// removeGrp (optional) boolean to remove optgroups
function removeAllOptions(sel, removeGrp) {
    var len, groups, par;
    if (removeGrp) {
        groups = sel.getElementsByTagName('optgroup');
        len = groups.length;
        for (var i=len; i; i--) {
            sel.removeChild( groups[i-1] );
        }
    }
    
    len = sel.options.length;
    for (var i=len; i; i--) {
        par = sel.options[i-1].parentNode;
        par.removeChild( sel.options[i-1] );
    }
}

function appendDataToSelect(sel, obj) {
    var f = document.createDocumentFragment();
    var labels = [], group, opts;
    
    function addOptions(obj) {
        var f = document.createDocumentFragment();
        var o;
        
        for (var i=0, len=obj.text.length; i<len; i++) {
            o = document.createElement('option');
            o.appendChild( document.createTextNode( obj.text[i] ) );
            
            if ( obj.value ) {
                o.value = obj.value[i];
            }
            
            f.appendChild(o);
        }
        return f;
    }
    
    if ( obj.text ) {
        opts = addOptions(obj);
        f.appendChild(opts);
    } else {
        for ( var prop in obj ) {
            if ( obj.hasOwnProperty(prop) ) {
                labels.push(prop);
            }
        }
        
        for (var i=0, len=labels.length; i<len; i++) {
            group = document.createElement('optgroup');
            group.label = labels[i];
            f.appendChild(group);
            opts = addOptions(obj[ labels[i] ] );
            group.appendChild(opts);
        }
    }
    sel.appendChild(f);
}

// anonymous function assigned to onchange event of controlling select box
document.forms['demoForm'].elements['dist'].onchange = function(e) {
    // name of associated select box
    var relName = 'city';
    
    // reference to associated select box 
    var relList = this.form.elements[ relName ];
    
    // get data from object literal based on selection in controlling select box (this.value)
    var obj = Select_List_Data[ relName ][ this.value ];
    
    // remove current option elements
    removeAllOptions(relList, true);
    
    // call function to add optgroup/option elements
    // pass reference to associated select box and data for new options
    appendDataToSelect(relList, obj);
};


// populate associated select box as page loads
(function() { // immediate function to avoid globals
    
    var form = document.forms['demoForm'];
    
    // reference to controlling select box
    var sel = form.elements['dist'];
    sel.selectedIndex = 0;
    
    // name of associated select box
    var relName = 'city';
    // reference to associated select box
    var rel = form.elements[ relName ];
    
    // get data for associated select box passing its name
    // and value of selected in controlling select box
    var data = Select_List_Data[ relName ][ sel.value ];
    
    // add options to associated select box
    appendDataToSelect(rel, data);
    
}());
</script>

</div>
</div>
<?php
   include("footer.php");
?>