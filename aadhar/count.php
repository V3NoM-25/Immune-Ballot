<?php 
header('Access-Control-Allow-Origin: *'); 
echo $_POST['id'];
$con=mysqli_connect("localhost","root","","immune");
$sqlfind="select * from voter_count where id='".$_POST['id']."'";
$resfind=mysqli_query($con,$sqlfind);
$rowfind=mysqli_fetch_array($resfind);
$vote=$rowfind["vote"];
$vote=$vote+1;

$sql="update voter_count set vote='".$vote."' where id='".$_POST['id']."'";
$res=mysqli_query($con,$sql);
echo "done";
?>