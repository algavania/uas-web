<?php 
    include '../../connect.php';
    session_start();
    include "../../middleware/roles.php";
    checkAuthMiddleware(false);
    $nrp = $_GET['nip'];
    $sql = "DELETE from lecturers WHERE nip='$nrp'";    
    $query = mysqli_query($connect, $sql);
    header("location:../../student.php");
?>