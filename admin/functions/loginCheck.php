<?php 
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);


include 'connect.php';

$select = "SELECT * FROM users 
		     WHERE
		     	username = '$username'
		     	AND
		     	password = '$password'
";

$query = $conn -> query($select);

if ($query -> num_rows > 0 ) {

	// get logged user id

	$user = $query -> fetch_assoc();
	$id = $user['id'];

	// create session for user

	$_SESSION['login'] = $id ;

	header("location: ../index.php");

} else {

	$_SESSION['error'] = '<div class="alert alert-danger">wrong credentials</div>';
	header("location: ../login.php");	
}