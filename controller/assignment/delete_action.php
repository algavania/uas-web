<?php 
    include '../../connect.php';
    session_start();
    if (!$_SESSION['login']) {
        header('Location: login.php');
        exit;
    }
    $id = $_GET['id'];
    $sql = "DELETE from assignments WHERE id='$id'";    
    $query = mysqli_query($connect, $sql);
    header("location:../../course/assignment.php?id=".$_GET['course_id']);
?>