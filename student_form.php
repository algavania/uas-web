<!DOCTYPE html>
<html lang="en">

<?php
include "connect.php";
$text = 'Add Student';
$postUrl = 'controller/mahasiswa/add_action.php';
$nrp = '';
$name = '';
$gender = 'Laki-laki';
$major = 'Informatics Engineering';
$email = '';
$address = '';
$photo = 'assets/profile.png';
if (isset($_GET['nrp'])) {
    $text = 'Edit Student';
    $postUrl = 'controller/mahasiswa/update_action.php';
    $nrp = $_GET['nrp'];
    $checkNrp = "SELECT * FROM mahasiswa WHERE nrp='$nrp'";
    $result = mysqli_query($connect, $checkNrp);
    $resNrp = $result->num_rows == 0;
    if ($resNrp) {
        header("Location: index.php");
        return;
    }
    $row = mysqli_fetch_array($result);
    $name = $row['nama'];
    $gender = $row['jenis_kelamin'];
    $major = $row['jurusan'];
    $email = $row['email'];
    $address = $row['alamat'];
    $photo = $row['photo'];
    $photo = 'img/' . $photo;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="dist/output.css?v=<?php echo time(); ?>">
    <title><?php echo $text ?></title>
</head>

<?php
    session_start();
    if (!$_SESSION['login']) {
        header('Location: login.php');
        exit;
    }
    ?>

<body class="w-full h-screen bg-[#F6F9FE]">
    <div class="mx-auto sm:w-3/4 lg:w-2/4 h-full bg-white relative">
        <div class="bg-primary w-full px-8 py-6 relative">
            <div class="font-bold text-xl text-white text-center">Student Form</div>
        </div>
        <div class="ml-6">
            <a type="button" href="index.php" class="rounded-full absolute top-4 bg-white p-5">
                <svg class="text-primary absolute top-0 bottom-0 left-0 right-0 mx-auto my-auto h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="px-8 py-6">
            <form method="POST" action="<?php echo $postUrl ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="relative mx-auto mb-10 " style="height: 12rem; width: 12rem;">
                    <img id="profile-image" src="<?php echo $photo ?>" class="w-full h-full rounded-full" alt="Profile">
                    <div class="absolute top-0 right-0">
                        <div id="edit-image" class="h-12 w-12 p-3 rounded-full bg-primary cursor-pointer">
                            <svg class="w-full h-full fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="absolute top-0 transform translate-y-10 left-0">
                        <a href="controller/mahasiswa/download.php?file=<?php echo basename($photo) ?>">
                            <div id="download-image" class="h-12 w-12 p-3 rounded-full bg-green-500 cursor-pointer">
                                <svg class="w-full h-full fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M13,5V11H14.17L12,13.17L9.83,11H11V5H13M15,3H9V9H5L12,16L19,9H15V3M19,18H5V20H19V18Z" />
                                </svg>
                            </div>
                        </a>
                    </div>

                </div>
                <input class="hidden" type="file" id="file_input" name="photo" accept="image/png, image/jpeg, image/jpg">
                <input class="hidden" value="<?php echo $nrp; ?>" name="nrp_awal">
                <input class="hidden" value="<?php echo $email; ?>" name="email_awal">

                <div class="grid gap-6 mb-10 md:grid-cols-2">
                    <div>
                        <label for="nrp" class="block mb-2 text-sm font-medium text-gray-900 text-black">NRP</label>
                        <input value="<?php echo $nrp; ?>" type="text" pattern="[0-9]{10}" name="nrp" id="nrp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Full Name</label>
                        <input value="<?php echo $name; ?>" type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 text-black">Gender</label>
                        <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option <?php if ($gender == 'Male') :
                                        echo 'selected';
                                    endif;
                                    ?> value="Male">Male</option>
                            <option <?php if ($gender == 'Female') :
                                        echo 'selected';
                                    endif;
                                    ?> value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="major" class="block mb-2 text-sm font-medium text-gray-900 text-black">Major</label>
                        <select id="major" name="major" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option <?php if ($major == 'Informatics Engineering') :
                                        echo 'selected';
                                    endif;
                                    ?> value="Informatics Engineering">Informatics Engineering</option>
                            <option <?php if ($major == 'Data Science') :
                                        echo 'selected';
                                    endif;
                                    ?> value="Data Science">Data Science</option>
                        </select>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-black">Email</label>
                        <input value="<?php echo $email; ?>" name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 text-black">Address</label>
                        <input value="<?php echo $address; ?>" name="address" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                </div>
                <div class="w-full flex place-content-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg font-bold w-full sm:w-64 px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <?php echo $text ?>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>

    <script>
        const fileInput = document.getElementById('file_input');
        const label = document.getElementById('edit-image');
        const preview = document.getElementById('profile-image');
        var isChange = false;

        label.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', () => {
            const selectedFile = fileInput.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', () => {
                preview.src = reader.result;
                isChange = true;
                checkImage();
            });

            reader.readAsDataURL(selectedFile);
        });

        const nrpInput = document.getElementById("nrp");
        nrpInput.addEventListener("input", function(event) {
            if (nrpInput.validity.patternMismatch) {
                nrpInput.setCustomValidity("Please enter a valid NRP (10-digit number)");
            } else {
                nrpInput.setCustomValidity("");
            }
        });

        const downloadImage = document.getElementById("download-image");
        checkImage();

        function checkImage() {
            const photo = '<?php echo $photo; ?>';
            if (photo == 'assets/profile.png' || isChange) {
                downloadImage.classList.add('hidden');
            } else {
                downloadImage.classList.remove('hidden');
            }
            console.log('check image', photo, isChange);
        }

        function validateForm() {
            const photo = '<?php echo $photo; ?>';
            if (fileInput.files.length === 0 && photo == 'assets/profile.png') {
                swal({
                    title: "Error",
                    text: "Please upload a photo!",
                    icon: "error",
                });
                return false;
            }
        }
    </script>

</body>

</html>