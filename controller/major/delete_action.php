<?php 
    include '../../connect.php';
    session_start();
    if (!$_SESSION['login']) {
        header('Location: login.php');
        exit;
    }
    $id = $_GET['id'];
    $sql = "DELETE from majors WHERE id='$id'";    
    $query = mysqli_query($connect, $sql);
    header("location:../../major.php");
?>