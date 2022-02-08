<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>

	
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="sign.css">
</head>
<body> 
<?php require_once('Admin/php/session.php'); ?>
<?php require_once('Admin/php/functions.php'); ?>


	<?php  
	require_once('connect.php');
$error="";
$vs="";
session_start();
    $error="";
	if(isset($_SESSION['error'])){
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
}

if(isset($_POST['sign'])){
	$phonenumber = $_POST['phone'];
	$check = "SELECT * FROM  users
	WHERE phone='$phonenumber' ";
	// echo "<script>console.log('connected successfully')</script>";
	$result = $conn->query($check);
	if($result->num_rows >0){
		$error ="User Present with This Phone Number";
	} else{
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$username=$_POST['email'];
		$password=$_POST['pwd'];
		$city=$_POST['city'];
		$zip=$_POST['zip'];
		$state = $_POST['state'];
		
		
		$sql = "insert into Users(name,username,password,city,zip,state) values('$name','$username','$password','$city','$zip','$state')";
		$conn->query($sql);	
		
			header("Location: redirect.php");
			
	}

} 
?>


	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<span style="color:red"><?php echo $error; ?></span>
				<form method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<label><?php $error ?></label>
				<input type="text" name="name" placeholder="Enter Name" required="">
					<input type="Number" id="phone" placeholder="Phone Number" name="phone"   required="" minlength="10">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pwd" id="password" placeholder="password" required="" minlength="8">
					<input type="text" name="city" id="city" placeholder="city" required="">
					<input type="number" name="zip" id="zip" placeholder="zip" required>
					<div class="state">
  <select id="inputState" class="form-select" name="state" placeholder="State" >
    <option selected>Choose...</option>
    <option>Andhra Pradesh</option>
    <option>Arunachal Pradesh</option>
    <option>Assam</option>
    <option>Bihar</option>
    <option>Chhattisgarh</option>
    <option>Delhi</option>
    <option>Goa</option>
    <option>Gujarat</option>
    <option>Haryana</option>
    <option>Himachal Pradesh</option>
    <option>Jharkhand</option>
    <option>Karnataka</option>
    <option>Kerala</option>
    <option>Madhya Pradesh</option>
    <option>Maharashtra</option>
    <option>Manipur</option>
    <option>Meghalaya</option>
    <option>Mizoram</option>
    <option>Nagaland</option>
    <option>Odisha</option>
    <option>Punjab</option>
    <option>Rajasthan</option>
    <option>Sikkim</option>
    <option>Tamil Nadu</option>
    <option>Telangana</option>
    <option>Uttar Pradesh</option>
    <option>Tripura</option>
    <option>Uttarakhand</option>
    <option>West Bengal</option>
  </select>
					</div>
					
					<button type="submit" name="sign"> Sign up</button>
				
					<div class="login">
					<p class="already">Already have account</p>
					<?php echo $vs;
					
					?>
					<a href="login.php" style="text-decoration: none; font-weight:bold;">Login</a>
					</div>
					</form>
			</div>
	</div>
</body>
</html>