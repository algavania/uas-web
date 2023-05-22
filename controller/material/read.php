<?php
include "../connect.php";
$courseId = $_GET['id'];

$listSql = "SELECT * FROM materials WHERE course_id=$courseId ORDER BY id";
$listQuery = mysqli_query($connect, $listSql);
$result = mysqli_fetch_all($listQuery, MYSQLI_ASSOC);

$courseQuery = "SELECT * FROM courses WHERE id=" . $_GET['id'];
$courseResult = mysqli_query($connect, $courseQuery);
$row = $courseResult->fetch_assoc();
