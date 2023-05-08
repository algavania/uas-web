<?php
include "../../connect.php";
$keyword = $_GET['keyword'];
$sql = "SELECT * FROM mahasiswa WHERE nrp LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
$query = mysqli_query($connect, $sql);
$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    echo '<tr class="bg-white border-b dark:bg-gray-800 text-black dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
    ' . $no++ . '
    </th>
    <td class="px-6 py-4">
    ' . $row['nrp'] . '
    </td>
    <td class="px-6 py-4">
    ' . $row['nama'] . '
    </td>
    <td class="px-6 py-4">
    ' . $row['jurusan'] . '
    </td>
    <td class="px-6 py-4 text-right">
    <a href="controller/mahasiswa/download.php?file=' . basename($row['photo']) . '" class="font-medium text-green-600 dark:text-green-500 hover:underline download">Download</a>
</td>
    <td class="px-6 py-4 text-right">
        <a href="student_form.php?nrp=' . $row['nrp'] . '" class="font-medium text-blue-600 dark:text-blue-500 hover:underline edit" data-nrp="' . $row['nrp'] . '" data-nama="' . $row['nama'] . '" data-jenis_kelamin="' . $row['jenis_kelamin'] . '" data-jurusan="' . $row['jurusan'] . '" data-alamat="' . $row['alamat'] . '" data-email="' . $row['email'] . '">Edit</a>
    </td>
    <td class="px-6 py-4 text-right">
        <a class="cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline delete" data-nrp="' . $row['nrp'] . '" data-nama="' . $row['nama'] . '" data-jenis_kelamin="' . $row['jenis_kelamin'] . '" data-jurusan="' . $row['jurusan'] . '" data-alamat="' . $row['alamat'] . '" data-email="' . $row['email'] . '">Delete</a>
    </td>
</tr>
';
}
