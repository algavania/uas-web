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
    <title>Register</title>
</head>

<body>
    <?php
    include '../../connect.php';
    session_start();
    $message = 'Invalid username or password!';
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header('Location: ../../index.php');
                exit;
            } else {
                $message = 'Invalid password!';
            }
        } else {
            $message = 'No users found';
        }
    }
    echo '
<script>
$(document).ready(function() {
swal({
    title: "Error",
    text: "'.$message.'",
    icon: "error",                                
    }).then((value) => {
    window.location = "../../login.php";
});
});
</script>';

    ?>
</body>

</html>