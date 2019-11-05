<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "config.php";
$conn =connection();

if ($_POST != null) {
	$ch = 'SELECT COUNT(*) AS row FROM user WHERE uEmail LIKE "'.$_POST['uEmail'].'"';
	$check = mysqli_query($conn, $ch);
	$count;
	foreach ($check as $row) {
		$count = $row['row'];
	}
	if ($count > 0) {
		$res->status = 0;
		$res->msg = "User already exists.";
	} else {
		$q = "INSERT INTO `user` (`uId`, `uName`, `uContact`, `uEmail`, `uPassword`, `uStatus`) VALUES (NULL, '".$_POST['uName']."', '".$_POST['uContact']."', '".$_POST['uEmail']."', '".$_POST['uPassword']."', '0');";
		mysqli_query($conn, $q);
		$res->userInfo = $_POST;
		$res->status = 1;
		$res->msg = "User created successfully.";
	}
} else {
	$res->status = 0;
	$res->msg = "Invalid details.";
}

$res->post = $_POST;
echo json_encode($res);
$conn = null;
?>

