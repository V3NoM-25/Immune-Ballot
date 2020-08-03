<?php 
session_start();
if(!$_SESSION['sr']){
	header("location: index.php");
}
$con=mysqli_connect("localhost","root","","immune");
$sql="select * from user where Sr_No='".$_SESSION['sr']."'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$sqlview="select * from aadhar_use where area='".$row['area']."' and request='false'";
$resview=mysqli_query($con,$sqlview);
$resview1=mysqli_query($con,$sqlview);
$sqlco="select * from map where area='".$row['area']."'";
$resco=mysqli_query($con,$sqlco);
$rowco=mysqli_fetch_array($resco);
$_SESSION['lat']=$rowco["latitude"];
$_SESSION['long']=$rowco["longitude"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="../assest/bootstrap/css/bootstrap.css">
	<style>
		#map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	</style>
</head>
<body>
	<section class="container-flex bg-dark">
		<div class="container">
			<div class="row text-white text-center">
				<div class="col-lg-12">
					<h2>Admin Panel</h2>
				</div>
			</div>
		</div>
	</section>


	<section class="my-4">
		<div class="container-lg">
			<div class="row mx-auto">
				<div class="col-lg-12">
					<h3>Welcome <b><?php echo $row['username'] ?></b></h3>
				</div>
			</div>
			<hr>
			<div class="row my-5 mx-auto">

				<div class="col-lg-2 shadow-lg ml-5 px-2">
					<h4 class="text-center mt-1">Aadhar list:</h4>
					<hr>
					<?php 
					while($show_lg=mysqli_fetch_array($resview1)){
					?>
					<p style=" padding:0 margin:0 !important" class="text-center"><?php echo $show_lg['aadhar_no'] ?></p>
					<hr>
					<?php
					}
					?>
				</div>
				<!-- ennd  -->
				<div class="col-lg-8 shadow px-5">

					<div class="row mt-1">
						<div class="col-lg-12">
							<p class="text-center text-danger"> <b>Region : <?php echo $row['area'] ?></b></p>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-lg-12">
							<p class="text-left	"> Requests : <?php echo $resview->num_rows ?></p>
						</div>
					</div>

					<hr>
					
					<?php 
					while($rowview=mysqli_fetch_array($resview)){
					?>
					<div class="main-<?php echo $rowview['Sr_No'] ?>">	
					<div class="row mt-1">
						<div class="col-lg-10 text-left">
							<h4>Aadhar No: <span id="aadhar-<?php echo $rowview['Sr_No'] ?>"><?php echo $rowview['aadhar_no'] ?></span></h4>
						</div>
						<div class="col-lg-2">
							<button class="btn btn-outline-success form-control show-<?php echo $rowview['Sr_No'] ?>" name="private" onclick="show(<?php echo $rowview['Sr_No'] ?>)">Show</button>
							<button class="btn btn-outline-success form-control hide-<?php echo $rowview['Sr_No'] ?>" name="private" onclick="hide(<?php echo $rowview['Sr_No'] ?>)" style="display: none;">Hide</button>
						</div>
					</div>
					
					</div>
					<!-- end of main -->
					<div class="sub-main" style="display: none;">
					<div class="row mt-2">
							
						<div class="col-lg-12 " >
							<label>Primary key:</label>
								<input type="text" name="key" class="form-control name key-<?php echo $rowview['Sr_No'] ?>" placeholder="Key" >
							
						</div>
					</div>
					<div class="row my-3 ">
						<div class="col-lg-12">
							<button class="btn btn-danger form-control" name="private" onclick="send(<?php echo $rowview['Sr_No'] ?>)">Send SMS</button>
						</div>
					</div>
					
					</div>
					<hr>
					<!-- end of sub-main -->
					<?php
					}
					?>
				</div>
				<!-- End of col-6 -->
				
				</form>
			</div>
		</div>
	</section>
	<section class="shadow-lg" style="margin-top: 100px">
		<iframe src="MapCode/mapcode.php" width="100%" height="auto"></iframe>
	</section>
</body>
</html>
<script src="../assest/js/jquery.js"></script>
<script src="../assest/bootstrap/js/bootstrap.js"></script>
<script>
	$(document).ready(function () {
	});
	function show(sr){
		$(".main-"+sr).next().show("slow");
		$(".show-"+sr).hide();
		$(".hide-"+sr).show();
	}
	function hide(sr){
		$(".main-"+sr).next().hide("slow");
		$(".hide-"+sr).hide();
		$(".show-"+sr).show();
	}

	
      function send(sr){
      	var aadhar_no=$("#aadhar-"+sr).html();
      	var key=$(".key-"+sr).val();
 		$.post("sms-send.php",{
 			aadhar_no: aadhar_no,
 			key: key
 		},function(data,status){
 			if(data == "done"){
 				$.post("done.php",{
 					aadhar_no: aadhar_no,
 					key: key
 				},function(data,status){
 					if(data == "done"){
 						alert("SMS Send to Voter Successfully!!");
 						window.location='main.php';
 					}
 					else{
 						alert("fail to send !!!");
 					}
 				});
 			}
 			else{
 				alert("fail to send");
 			}
 		});
      }
</script>