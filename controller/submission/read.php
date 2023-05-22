<?php
include "../../connect.php";
$isLecturer = checkIfLecturer();
$assignmentId = $_GET['id'];
$sql = "SELECT submissions.*, users.name AS student_name, courses.id AS course_id FROM submissions LEFT JOIN students ON students.nrp=submissions.student_nrp LEFT JOIN users ON users.id=students.user_id LEFT JOIN assignments ON assignments.id=submissions.assignment_id LEFT JOIN courses ON courses.id=assignments.course_id WHERE assignment_id=$assignmentId";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

$assignmentQuery = "SELECT * FROM assignments WHERE id=$assignmentId";
$assignmentResult = mysqli_query($connect, $assignmentQuery);
$row = $assignmentResult->fetch_assoc();
