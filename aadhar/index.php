<?php
$con=mysqli_connect("localhost","root","","immune"); 
if(isset($_POST["show"])){
$sql="select * from aadhar_dummy where Aadhar_no='".$_POST['addhrno']."'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
}
if(isset($_POST["private"])){
	$sqlcheck="select * from aadhar_use where aadhar_Sr_No='".$_POST['sr']."'";
	$res=mysqli_query($con,$sqlcheck);
	if($res->num_rows > 0){
		echo "<script>alert('We have already sent you a SMS')</script>";
	}
	else{
	$sql="insert into aadhar_use(aadhar_Sr_No,aadhar_no,request,area) value('".$_POST['sr']."','".$_POST['addhrno']."','false','".$_POST['area']."')";
	echo $sql;
	mysqli_query($con,$sql);
	echo "<script>window.location='send.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Aadhar Form</title>
	<link rel="stylesheet" type="text/css" href="assest/bootstrap/css/bootstrap.css">

</head>
<body>
	<section class="container-flex bg-dark">
		<div class="container">
			<div class="row text-white text-center">
				<div class="col-lg-12">
					<h2>Aadhar Card Details</h2>
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
						<div class="col-lg-8">
							<label>Aadhar Number</label>
							<input type="hidden" name="sr" value="<?php empty($row['Sr_No']) ? '' : print_r($row['Sr_No']) ?>">
							<input type="text" name="addhrno" class="form-control aadhar_no" placeholder="Aadhar Number" value="<?php empty($row['Aadhar_no']) ? '' : print_r($row['Aadhar_no']) ?>">

						</div>
						<div class="col-lg-4 mt-4">
							<button class="btn btn-success" name="show">Show Details</button>
						</div>
						<?php 
							if(isset($_POST["show"])){
								if(!$res->num_rows > 0){
									?>
									<p class="text-danger ml-4">Invalid Aadhar Number</p>
									<?php
								}
							}
							?>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Name</label>
							<input type="text" name="name" class="form-control name" placeholder="Name" value="<?php empty($row['name']) ? '' : print_r($row['name']) ?>" disablednodejs>
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Birth Date</label>
							<input type="date" name="bday" class="form-control dob" placeholder="Birth Date" value="<?php empty($row['dob']) ? '' : print_r($row['dob']) ?>" disablednodejs>
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Mobile No</label>
							<input type="text" name="mob" class="form-control mob" placeholder="Mobile No" value="<?php empty($row['mob']) ? '' : print_r($row['mob']) ?>" disabled>
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Gender</label>
							<input type="text" name="gender" class="form-control gender" placeholder="Gender" value="<?php empty($row['gender']) ? '' : print_r($row['gender']) ?>" disablednodejs>
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Address</label>
							<input type="text" name="aadr" class="form-control aadr" placeholder="Address" value="<?php empty($row['aadr']) ? '' : print_r($row['aadr']) ?>" disablednodejs>
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<label>Area</label>
							<input type="text" name="area" class="form-control aadr" placeholder="Area" value="<?php empty($row['area']) ? '' : print_r($row['area']) ?>" disablednodejs>
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<button class="btn btn-outline-danger form-control" name="private">Proceed</button>
						</div>
					</div>
				</div>
				<!-- End of col-6 -->
				</form>
			</div>
		</div>
	</section>
</body>
</html>
<script type="text/javascript" src="assest/js/jquery.js"></script>
<script type="text/javascript" src="assest/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
	
	// $(document).ready(function () {
	// 	$(".aadhar_no").on("change",function(){
	// 		var aadhar_no=$(this).val();
	// 		$.post("ajax/show.php",{
	// 			aadhar_no : aadhar_no
	// 		},function(data,status){
	// 			alert(data);
	// 			$data1=JSON.parse($data);
	// 			alert($data1[0]);
	// 			$(".name").val(data[0]);
	// 		});
	// 	});
	// })
</script>