<?php
$con=mysqli_connect("localhost","root","","immune"); 
if(isset($_POST["private"])){
	$sql="insert into map(area,latitude,longitude) value('".$_POST['area']."','".$_POST['latitude']."','".$_POST['longitude']."')";
	mysqli_query($con,$sql);
	echo "<script>alert('Insert successfully!!!')</script>";
	echo "<script>window.location='insert.php'</script>";
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
					<div class="row my-3">
						<div class="col-lg-12">
							<label>Area</label>
							<input type="text" class="form-control" name="area">
						</div>
					</div>
					<div class="row my-3">
						<div class="col-lg-12">
							<label>Latitude</label>
							<input type="text" class="form-control" name="latitude">
						</div>
					</div>
					<div class="row my-3">
						<div class="col-lg-12">
							<label>Longitude</label>
							<input type="text" class="form-control" name="longitude">
						</div>
					</div>
					<div class="row my-1">
						<div class="col-lg-12">
							<button class="btn btn-outline-danger form-control" name="private">Insert</button>
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