<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../dist/output.css?v=<?php echo time(); ?>">
    <title>Add Student</title>
</head>

<body>
    <?php
    include '../../connect.php';
    session_start();
    if (!$_SESSION['login']) {
        header('Location: login.php');
        exit;
    }
    if (isset($_POST['nrp'])) {
        $checkNrp = "SELECT * FROM mahasiswa WHERE nrp='$_POST[nrp]'";
        $checkEmail = "SELECT * FROM mahasiswa WHERE email='$_POST[email]'";
        $resultNrp = mysqli_query($connect, $checkNrp);
        $resultEmail = mysqli_query($connect, $checkEmail);
        $resImage = false;

        $fileName = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];
        $tmpName = $_FILES['photo']['tmp_name'];

        if ($size > 2 * 1024 * 1024) {
            $resImage = true;
        }

        if ($resultNrp->num_rows != 0 || $resultEmail->num_rows != 0 || $resImage) {
            $message = 'NRP has been used!';
            if ($resultEmail->num_rows != 0) {
                $message = 'Email has been used!';
            }
            if ($resImage) {
                $message = 'Image size is too big. Maximum size is 2MB.';
            }
            echo '
    <script>
    $(document).ready(function() {
        swal({
            title: "Error",
            text: "' . $message . '",
            icon: "error",
        }).then((value) => {
            window.location = "../../student_form.php";
    });
     });
    </script>';
        } else {
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileName = $_POST['nrp'] . '.' . $extension;
            move_uploaded_file($tmpName, '../../img/'.$fileName);
            $sql = "INSERT INTO mahasiswa(nrp,
                nama,
                jenis_kelamin,
                jurusan,
                email,
                alamat,
                photo
                )
VALUES ('$_POST[nrp]',
        '$_POST[name]',
        '$_POST[gender]',
        '$_POST[major]',
        '$_POST[email]',
        '$_POST[address]',
        '$fileName'
        )";
            $query = mysqli_query($connect, $sql);
            if ($query && mysqli_affected_rows($connect) > 0) {
                echo '
                        <script>
$(document).ready(function() {
swal({
    title: "Add Data",
    text: "Data has been added!",
    icon: "success",
}).then((value) => {
    window.location = "../../index.php";
});
});
</script>';
            } else {
                echo '<script>
swal({
title: "Error",
text: "Query error!",
icon: "error",
});
</script>';
            }
        }
    }
    ?>
</body>

</html>