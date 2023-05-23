<?php 
    include '../../connect.php';
    session_start();
    include "../../middleware/roles.php";
    checkAuthMiddleware(false);
    $nrp = $_GET['nrp'];
    $sql = "DELETE from students WHERE nrp='$nrp'";    
    $query = mysqli_query($connect, $sql);
    header("location:../../student.php");
?>