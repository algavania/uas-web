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
    <title>Add Department</title>
</head>

<body>
    <?php
    include '../../connect.php';
    session_start();
    if (!$_SESSION['login']) {
        header('Location: login.php');
        exit;
    }
    if (isset($_POST['name'])) {
        $checkName = "SELECT * FROM departments WHERE name='$_POST[name]'";
        $resultName = mysqli_query($connect, $checkName);

        if ($resultName->num_rows != 0) {
            $message = 'Department Name has been used!';
            echo '
    <script>
    $(document).ready(function() {
        swal({
            title: "Error",
            text: "' . $message . '",
            icon: "error",
        }).then((value) => {
            window.location = "../../department.php";
    });
     });
    </script>';
        } else {
            $sql = "INSERT INTO departments
VALUES ('',
        '$_POST[name]'
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
    window.location = "../../department.php";
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