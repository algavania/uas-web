<?php
include "../connect.php";
$id = $_GET['id'];
$courseQuery = "SELECT * FROM courses WHERE id=$id";
$courseResult = mysqli_query($connect, $courseQuery);
$courseRow = $courseResult->fetch_assoc();
