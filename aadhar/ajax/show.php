<?php
$con=mysqli_connect("localhost","root","","immune");
$sql="select * from aadhar_dummy where Aadhar_no='".$_POST['aadhar_no']."'";
$res=mysqli_query($con,$sql);
if($res->num_rows > 0){
$row=mysqli_fetch_array($res);
$array_data->name=$row["name"];
$array_data->dob=$row["dob"];
$array_data->mob=$row["mob"];
$array_data->gender=$row["gender"];
$array_data->aadr=$row["aadr"];
echo json_encode($array_data);
}
else{
	echo "not";
}
?>