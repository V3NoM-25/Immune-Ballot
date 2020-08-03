<?php 
$con=mysqli_connect("localhost","root","","immune");
$sqlinfo="select * from map";
$resinfo=mysqli_query($con,$sqlinfo);
if(isset($_POST['login'])){
$sql="select * from aadhar_use where aadhar_no='".$_POST['aadhar']."' and private_key='".$_POST['key']."'";
$res=mysqli_query($con,$sql);
if($res->num_rows > 0){
	echo "<script>alert('Login Successfully!!!')</script>";
	echo "<script>window.location='http://localhost:3000/'</script>";
}
else{
	echo "<script>alert('Invalid Key!!!')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Form For User</title>
	<link rel="stylesheet" type="text/css" href="../assest/bootstrap/css/bootstrap.css">
	<style>
		body{
			background-image: url('../assest/img/vote.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 100% 50%;
			background-attachment: fixed;
		}
	</style>
</head>
<body>
	<section class="container-flex bg-dark">
		<div class="container">
			<div class="row text-white text-center">
				<div class="col-lg-12">
					<h2>User Voting</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="my-4">
		<div class="container">
			<div class="row my-5 justify-content-center">
				<div class="col-lg-6 shadow-lg py-2 px-3">
					<form action="" method="post">
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Aadhar Number</label>
							<input type="text" name="aadhar" placeholder="Addhar Number" class="form-control" required="">
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Private Key</label>
							<input type="password" name="key" class="form-control name" placeholder="Private Key"  required="">
						</div>
					</div>
					<div class="row my-3">
						<div class="col-lg-12">
							<button type="submit" class="btn bg-success text-white form-control" name="login" >Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

</body>
</html>