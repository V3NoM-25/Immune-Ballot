<?php
$con=mysqli_connect("localhost","root","","immune"); 
$sql="select * from voter_count";
$res=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Voting Panel</title>
	<link rel="stylesheet" type="text/css" href="../assest/bootstrap/css/bootstrap.css">
	<style>
		tr td,tr th{
			padding: 30px;
		}
		body{
			background-image: url('../assest/img/wall.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
			background-position: center;
		}
	</style>
</head>
<body>
	<section class="container-flex shadow-lg">
		<div class="container">
			<div class="row text-white text-center">
				<div class="col-lg-12">
					<h2>Voting Panel Result</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="container-flex">
		<div class="container">
			<div class="row justify-content-center mt-3">
				<div class="col-lg-6 shadow-lg text-center text-white">
					<h3>Panel</h3>
				</div>
			</div>
			<div class="row justify-content-center my-5">
				<div class="col-lg-6 shadow-lg">
					<div class="row">
						<div class="col-lg-12">
							<table border="2" class="table table-stripper font-weight-bold">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Vote</th>
								</tr>
								<?php 
								while($row=mysqli_fetch_array($res)){
								?>
								<tr>
								<td><?php echo $row["id"] ?></td>
								<td><?php echo $row["name"] ?></td>
								<td><?php echo $row["vote"] ?></td>
								</tr>
								<?php
								}
								?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<script type="text/javascript" src="../assest/js/jquery.js"></script>
<script type="text/javascript" src="../assest/bootstrap/js/bootstrap.js"></script>
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