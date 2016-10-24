<?php
require_once 'db_con.php';
require_once 'header.php';
//include('session.php');
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
          $district=$_POST['dist'];
          $city=$_POST['city'];
      		$email=$_POST['email'];
          $ability=$_POST['ability'];
      	$sql = "UPDATE donor_reg SET user_id='$uid',name='$name',blood_group='$bgroup',weight='$weight',age='$age',gender='$gender',date_of_birth='$dob',mobile_number='$mob',district='$district',city='$city',email='$email',ability='$ability' WHERE id='$id'";
      	$retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('<center><b style="color:red;">Could not update data</b></center> ' . mysqli_error($conn));
            }
            echo "Updated data successfully! Please Login again";
            header("Location:donor_login.php");


      }

      	if($id==TRUE){
		$sql=mysqli_query($conn,"SELECT * FROM donor_reg WHERE id='$id'");
		$result = mysqli_fetch_array($sql);
		//print_r($result);

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

<center><h2>Update Donor Information</h2></center>
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
<form role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="demoForm" class="demoForm">
<div class="form-group">
<label for="user">User ID</label>
<input class="form-control" type="text" name="u_id" value="<?= $result['user_id']; ?>">
</div>
<div class="form-group">
<label for="full_name">Full Name</label>
<input class="form-control" type="text" name="name" value="<?= $result['name']; ?>">
</div>
<div class="form-group">
<label for="blood_group">Blood Group</label>
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
<label for="dob">Date of Birth:</label>
<input class="form-control" type="text" name="date" id="example1" value="<?= $result['date_of_birth']; ?>">
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
<input class="form-control" type="text" name="number" value="<?= $result['mobile_number']; ?>">
</div>
<div class="form-group">
<label for="division">Select District</label>
<select class="form-control" name="dist">
  <option value="Select">-----Select-----</option>
  <option value="dhaka">Dhaka</option>
  <option value="rajshahi">Rajshahi</option>
  <option value="chittagong">Chittagong</option>
  <option value="Khulna">khulna</option>
  <option value="barishal">Barishal</option>
  <option value="sylhet">Sylhet</option>
  <option value="rangpur">Rangpur</option>
</select>
</div>
<div class="form-group">
<label for="city">Select City</label>
<select class="form-control" name="city" id="city">
  <option value="0">-----Select-----</option>
  <option value=""></option>
            <!-- js populates -->
</select>
</div>
<div class="form-group">
<label for="email">E-mail ID</label>
<input class="form-control" type="text" name="email" value="<?= $result['email']; ?>">
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
<a href="donor_profile.php" class="btn btn-info">back</a>
<input type="submit" name="submit" class="btn btn-info" value="update">
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

<?php } ?>

<?php
   include("footer.php");
?>