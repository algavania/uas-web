<?php 
    include '../../connect.php';
    session_start();
    if (!$_SESSION['login']) {
        header('Location: login.php');
        exit;
    }
    $nrp = $_GET['nip'];
    $sql = "DELETE from lecturers WHERE nip='$nrp'";    
    $query = mysqli_query($connect, $sql);
    header("location:../../student.php");
?>