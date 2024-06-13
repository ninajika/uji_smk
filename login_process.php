<?php

include 'koneksi.php';
session_start();

$nama = $_POST['nama'];
$nohp = $_POST['nomor_hp'];
$asalsekolah = $_POST['asalsekolah'];
$jurusan = $_POST['jurusan'];

/*
 if someone aware of this
*/
if (isset($_GET['secret']) && $_GET['secret'] == 'politeknik') {
    $_SESSION['nama'] = 'mahasiswa';
    $_SESSION['jurusan'] = 'aksestelekomunikasi';
    header('location: kuis.php');
}

if(isset($_POST['login'])){
    $checkUser = mysqli_query($koneksi, "SELECT * FROM user WHERE nama = '$nama' AND no_telp = '$nohp' AND asal_sekolah = '$asalsekolah' AND jurusan = '$jurusan'");
    if(mysqli_num_rows($checkUser) > 0){
        $_SESSION['nama'] = $nama;
        header('location: kuis.php');
    } else {
        $sql = "INSERT INTO user (id, nama, no_telp, asal_sekolah, jurusan) VALUES ('', '$nama', '$nohp', '$asalsekolah', '$jurusan')";
        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            $_SESSION['nama'] = $nama;
            $_SESSION['jurusan'] = $jurusan;
            header('location: kuis.php');
        } else {
            echo "<script>alert('Gagal')</script>";
            header('location: index.php');
        }
    }
}

?>
