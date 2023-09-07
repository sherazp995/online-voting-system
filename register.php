<?php
include 'includes/conn.php';
session_start();
if (isset($_SESSION['admin'])) {
	header('location: admin/home.php');
}

if (isset($_SESSION['voter'])) {
	header('location: home.php');
}

if (isset($_POST['register'])) {
	$cnic = $_POST['cnic'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$filename = $_FILES['photo']['name'];
	$active = false;
	if (!empty($filename)) {
		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $filename);
	}
	//generate voters id
	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$voter = substr(str_shuffle($set), 0, 15);

	$sql = "INSERT INTO voters (voters_id, password, cnic, firstname, lastname, photo, active) VALUES ('$voter', '$password','$cnic', '$firstname', '$lastname', '$filename', '$active')";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Registered successfully';
		$_SESSION['register_id'] = $voter;
	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Fill up registeration form first';
}

header('location: index.php');
