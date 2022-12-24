<?php 



$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$cat = $_POST['cat'];

// images

$imgName = $_FILES['img']['name'];
$temp = $_FILES['img']['tmp_name'];

/**
 * 
 * 1 - check if there is uploaded image
 * 2 - specify an extension to the file
 * 3 - specify size  < 200 mb
 * 4 - name the image with random name
 * 5 - move uploaded file
 * 6 - insert image name into the database
 * */


// 1 - check if there is uploaded image
if ($_FILES['img']['error']  == 0 ) {

	// 2 - specify an extension to the file
	$extensions = ['jpg','gif','png' ,'jpeg'];
	$ext = pathinfo($imgName , PATHINFO_EXTENSION);

	if (in_array($ext, $extensions)) {

		// 3 - specify size  < 200 mb

		if($_FILES['img']['size'] < 2000000) {

			// 4 - name the image with random name
			$newName = md5(uniqid()) . "." . $ext;

			move_uploaded_file($temp, "../../images/$newName");

		} else {

			echo "file size is too big";
		}

	} else {

		echo "wrong file extension";
		exit();
	}

} else {

	echo "you must upload an image";
	exit();
}




include '../connect.php';

$insert = "INSERT INTO products (name , price , sale , cat_id , img) VALUES ('$name' , '$price' , '$sale' , '$cat' , '$newName')";

if ($conn -> query($insert)) {

	header("location: ../../products.php");

} else {

	echo $conn -> error ;

}