<?php 
header( "refresh:5;url=user/" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thank You For Request</title>
	<link rel="stylesheet" type="text/css" href="assest/bootstrap/css/bootstrap.css">
	<style>
		body{
			background-image: url('assest/img/1.png');
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
		}
		.text{
			background: rgba(0,0,0,0.7);
		}
		.neeche{
			margin-top: 18%;
		}
	</style>
</head>
<body>
	<section class="neeche">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-center text text-white py-5 rounded text-uppercase">Thank you for requesting. We'll send a private key on your mobile</h3>
				</div>
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