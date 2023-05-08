<?php 
echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
echo '<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>';
$connect = mysqli_connect("localhost","root","","testing");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>