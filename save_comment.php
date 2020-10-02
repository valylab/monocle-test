<?php

include 'db.php';

$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$comment = mysqli_real_escape_string($conn,$_POST['comment']);
$comment_date = date('Y-m-d H:i:s');

$query = "INSERT INTO comments (name,email,comment,comment_date) VALUES('".$name."','".$email."','".$comment."','".$comment_date."')";
mysqli_query($conn,$query);

?>