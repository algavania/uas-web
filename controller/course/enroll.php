<?php
include '../../connect.php';
session_start();
include "../../middleware/roles.php";
checkAuthMiddleware(false);
$id = $_GET['id'];
$userId = $_SESSION['id'];

$studentSql = "SELECT * FROM students WHERE user_id=$userId";
$result = mysqli_query($connect, $studentSql);
$row = $result->fetch_assoc();
$nrp = $row['nrp'];

$sql = "INSERT INTO enrollments VALUES (
        '',
        $nrp,
        $id,
        CURRENT_TIMESTAMP
    )";
$query = mysqli_query($connect, $sql);
header("location:../../index.php");
