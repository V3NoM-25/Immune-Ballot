<?php 
$con=mysqli_connect("localhost","root","","immune");
$sqlinfo="select * from map";
$resinfo=mysqli_query($con,$sqlinfo);
if(isset($_POST['login'])){
$sql="select * from user where username='".$_POST['username']."' and password='".$_POST['password']."' and area='".$_POST['region']."'";
$res=mysqli_query($con,$sql);
if($res->num_rows > 0){
	session_start();
	$row=mysqli_fetch_array($res);
	$_SESSION['sr']=$row['Sr_No'];
	echo "<script>alert('Login Successful!!!')</script>";
	echo "<script>window.location='main.php'</script>";
}
else{
	echo "<script>alert('Wrong Password!!!')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="../assest/bootstrap/css/bootstrap.css">

</head>
<body>
	<section class="container-flex bg-dark">
		<div class="container">
			<div class="row text-white text-center">
				<div class="col-lg-12">
					<h2>Login For Admin</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="my-4">
		<div class="container">
			<div class="row my-5 justify-content-center">
				<div class="col-lg-6 shadow-lg">
					<form action="" method="post">
					<div class="row my-1">
						<div class="col-lg-12">
							<label>UserName</label>
							<input type="text" name="username" placeholder="UserName" class="form-control" required="">
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Password</label>
							<input type="password" name="password" class="form-control name" placeholder="Password"  required="">
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Region</label>
							<select name="region" class="form-control"  required="">
							<option>select</option>
							<?php 
							while($rowinfo=mysqli_fetch_array($resinfo)){
								?>
							<option value="<?php echo $rowinfo['area'] ?>"><?php echo $rowinfo['area'] ?></option>	
								<?php 
							}
							?>
							 </select>
						</div>
					</div>
					
					<div class="row my-3">
						<div class="col-lg-12">
							<button type="submit" class="btn btn-outline-danger form-control" name="login" >Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

</body>
</html>