<?php 
	$con=mysqli_connect("localhost","root","","immune");
	$sql="select * from aadhar_dummy where Aadhar_no='".$_POST['aadhar_no']."'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
// Account details
	$apiKey = urlencode('R3aodoJ31jY-ittUSPKUDRjV1XrRd1RQMZckKf96ed');
	$mob="91".$row['mob'];
	// Message details
	$numbers = array($mob);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('Your private = '.$_POST['key']." link = http://localhost:8080/aadhar/user/ ");
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo "done";
?>