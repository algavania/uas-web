<?php 
    include '../../connect.php';
    session_start();
    if (!$_SESSION['login']) {
        header('Location: login.php');
        exit;
    }
    $nrp = $_GET['nrp'];
    $sql = "DELETE from mahasiswa WHERE nrp='$nrp'";    
    $query = mysqli_query($connect, $sql);
    header("location:../../student.php");
?>