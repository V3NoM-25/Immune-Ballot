<?php 
$con=mysqli_connect("localhost","root","","immune");
$sql="update aadhar_use set request='true', private_key='".$_POST['key']."', voted='Yes' where aadhar_no='".$_POST['aadhar_no']."'";
$res=mysqli_query($con,$sql);
echo "done";
?>