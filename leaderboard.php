<?php

include 'koneksi.php';
if (isset($_GET['jurusan'])) {
    $jurusan = $_GET['jurusan'];
    $sql = "SELECT nama, score FROM leaderboard WHERE jurusan = '$jurusan' ORDER BY score DESC";
    $result = mysqli_query($koneksi, $sql);
} else {
    $sql = "SELECT nama, score FROM leaderboard ORDER BY score DESC";
    $result = mysqli_query($koneksi, $sql);

}
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="smk_kotawaringin.png" class="navbar-brand brand-logo" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="leaderboard.php">LeaderBoard</a>
                    </li>
                    <li class="nav-item">
                        <a href="kuis.php" class="nav-link">kuis</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-bg-6 offset-bg-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="mt-2">Leaderboard</h4>
                    </div>
                    <div class="text-center">
                        <p>Sort By Jurusan</p>
                    </div>
                    <div class="d-flex justify-content-center mt-2 mb-5">
                        <a href="leaderboard.php?jurusan=modelbangunan" class="btn btn-primary me-2">Desain Permodelan dan Informasi Bangunan</a>
                        <a href="leaderboard.php?jurusan=aksestelekomunikasi" class="btn btn-primary me-2">Teknik Akses Telekomunikasi</a>
                        <a href="leaderboard.php?jurusan=otomatisasiperkebunan" class="btn btn-primary">Otomatisasi Perkebunan</a>
                    </div>
                </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; 
                                if (mysqli_num_rows($result) > 0) {
                                    
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>" . $no++ . "</td><td>" . $row["nama"]. "</td><td>" . $row["score"]. "</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No results found</td></tr>";
                                }
                                mysqli_close($koneksi);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setInterval(() => {
            location.reload();
        }, 10000);
    </script>
</body>
</html>
