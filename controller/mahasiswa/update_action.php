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
    <link rel="stylesheet" href="../dist/output.css?v=<?php echo time(); ?>">
    <title>Edit Student</title>
</head>

<body>
    <?php
    include '../../connect.php';
    session_start();
    if (!$_SESSION['login']) {
        header('Location: login.php');
        exit;
    }
    $nrp = $_POST['nrp'];
    $nrpAwal = $_POST['nrp_awal'];
    $email = $_POST['email'];
    $emailAwal = $_POST['email_awal'];
    $major = $_POST['major'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $name = $_POST['name'];

    $checkNrp = "SELECT * FROM mahasiswa WHERE nrp='$nrp'";
    $checkEmail = "SELECT * FROM mahasiswa WHERE email='$email'";
    $resultNrp = mysqli_query($connect, $checkNrp);
    $resultEmail = mysqli_query($connect, $checkEmail);
    $resNrp = $resultNrp->num_rows != 0 && $nrp != $nrpAwal;
    $resEmail = $resultEmail->num_rows != 0 && $email != $emailAwal;
    $resImage = false;

    $fileName = '';
    $size = 0;
    $tmpName = '';


    if ($_FILES['photo']['error'] != 4) {
        $fileName = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];
        $tmpName = $_FILES['photo']['tmp_name'];

        if ($size > 2 * 1024 * 1024) {
            $resImage = true;
        }
    }

    if ($resNrp || $resEmail || $resImage) {
        $message = 'Image size is too big. Maximum size is 2MB.';
        if ($resNrp) {
            $message = 'NRP has been used!';
        }
        if ($resEmail) {
            $message = 'Email has been used!';
        }
        echo '
        <script>
        $(document).ready(function() {
            swal({
                title: "Error",
                text: "' . $message . '",
                icon: "error",
            }).then((value) => {
                window.location = "../student_form.php?nrp=' . $nrpAwal . '";
        });
         });
        </script>';
    } else {
        $text = '';
        if ($_FILES['photo']['error'] != 4) {
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileName = $nrp . '.' . $extension;
            move_uploaded_file($tmpName, $fileName);
            $text = ",photo='$fileName'";
        }
        $sql = "UPDATE mahasiswa SET nrp='$nrp',
                                    nama='$name',
                                    jenis_kelamin='$gender',
                                    jurusan='$major',
                                    email='$email',
                                    alamat='$address'
                                    ".$text."
                WHERE nrp='$nrpAwal'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo '
        <script>
        $(document).ready(function() {
            swal({
                title: "Edit Data",
                text: "Data has been edited!",
                icon: "success",
            }).then((value) => {
                window.location = "../../index.php";
            });
         });
        </script>';
        } else {
            echo '
        <script>
        $(document).ready(function() {
            swal({
                title: "Error",
                text: "Query error!",
                icon: "error",
            }).then((value) => {
                window.location = "../../index.php";
            });
         });
        </script>';
        }
    } ?>
</body>

</html>