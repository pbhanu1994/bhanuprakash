<?php
$conn = mysqli_connect('localhost','bhanupra_1072','10721073','bhanupra_blog');

if($conn){
	echo "Connected Successfully";

$name = "bhanu";
$email = "bhanuprakash@gmail.com";
$commentit = "Hello this is a nice article!";

$query = "INSERT INTO comment VALUES (NOT NULL'$name','$email','$commentit')";
$dbcmthis = mysqli_query($conn,$query);

if($dbcmthis){
	echo "Database updated!";
}else{
	die(mysqli_error());
}

}else{
	die(mysqli_error());
}






?>