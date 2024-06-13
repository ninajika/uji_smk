<?php
$msg = '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
session_start();
// for handling query berhasil atau gagal
if (strpos($status, 'berhasil') !== false) {
    $msg = '<script>
        if (!alert_shown) {
            alert("Selamat Kamu Berhasil Menyelesaikan Soalnya");
            alert_shown = true;
        }
        setTimeout(function() {
            var msgContainer = document.getElementById("msg-container");
            if (msgContainer) {
                msgContainer.innerHTML = "";
                // make display none
                msgContainer.style.display = "none";
            }
        }, 5000);
    </script>';
    $msg = $msg . '<script>var alert_shown = false;</script>';
} elseif (strpos($status, 'gagal') !== false) {
    $msg = '<script>
        if (!alert_shown) {
            alert("Data Gagal Ditambahkan");
            alert_shown = true;
        }
        setTimeout(function() {
            var msgContainer = document.getElementById("msg-container");
            if (msgContainer) {
                msgContainer.innerHTML = "";
                msgContainer.style.display = "none";
            }
        }, 5000);
    </script>';
    $msg = $msg . '<script>var alert_shown = false;</script>';
} else {
    $msg = '';
}

echo $msg;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Test Login ajah</title>

        <!--untuk import bootstrap-->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>

        <!--for debugging perpouse because i using nvim-->
        <script src="debug.js" defer></script>
        <link rel="stylesheet" href="style.css" />
        <script>
            // easter egg if someone aware of it
            document.addEventListener("keydown", function (event) {
                const activeElement = document.activeElement;
                if (event.key === "l" && event.repeat && activeElement.tagName !== "INPUT") {
                    window.location.href = "leaderboard.php";
                } 
                
                if (event.key == "p" && event.repeat && activeElement.tagName !== "INPUT") {
                    alert("Selamat Kamu Menemukan easter egg")
                    window.location.href = "login_process.php?secret=politeknik"
                }
            });

            
        </script>
    </head>
    <body>
        <div id="msg-container">
            <?php echo $msg; ?>
        </div>
        <!--bikin header -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!--<a class="navbar-brand" href="#">PlaceHolder</a>-->
                <img src="smk_kotawaringin.png" class="navbar-brand brand-logo" alt="" srcset="" >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php" >Login (Test)</a>
                        </li>
                        <li class="nav-item">
                            <?php if (!isset($_SESSION['nama'])): ?>
                            <a class="nav-link" href="leaderboard.php">LeaderBoard</a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a href="kuis.php" class="nav-link">Kuis</a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--  <a class="nav-link disabled" aria-disabled="true">Disabled</a>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- bikin login -->
        <div class="imgimg"></div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div
                            class="card-header text-center justify-content-center">
                            <img src="logo_smk.png" alt="logo smk" srcset="" width="100" height="100">
                            <h4 class="mt-2">Login (test)</h4>
                        </div>
                        <div class="card-body">
                            <form id="login-form">
                                <div class="mb-3">
                                    <label for="Nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb3">
                                    <label for="NomorHp" class="form-label">Nomor Hape</label>
                                    <input type="number" name="nomor_hp" id="nomorhp" class="form-control" min="0">
                                </div>
                                <div class="mb3 mt-2">
                                    <label for="asalsekolah" class="form-label">Asal Sekolah</label>
                                    <input type="text" name="asalsekolah" id="asalsekolah" class="form-control">
                                </div>
                                <div class="mt-5 justify-content-center d-flex">
                                      <button type="submit" class="btn btn-primary w-100" name="Login">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 60rem;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Jurusan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="width: 60rem;">
                        <div class="d-flex flex-row">
                            <div class="card mx-2" style="width: 100%;">
                                <img src="https://akcdn.detik.net.id/visual/2023/06/13/ilustrasi-satelit-satria-1-kominfo_169.png?w=650" class="card-img-top" alt="satelit">
                                <div class="card-body">
                                    <h5 class="card-title">Jurusan Teknik Akses Telekomunikasi</h5>
                                    <p class="card-text">Prospek lulusan menjadi Teknisi Fiber Optik, Teknik Radio Wireless, Teknik Internet Satelit dan Network Administrator.</p>
                                    <button type="button" class="btn btn-primary" onclick="submitForm('aksestelekomunikasi')">Pilih Jurusan</button>
                                </div>
                            </div>
                            <div class="card mx-2" style="width: 100%;">
                                <img src="https://smkn1kediri.sch.id/wp-content/uploads/2017/07/Desain-Permodelan-dan-Informasi-Bangunan.jpg" class="card-img-top" alt="bangunan" height="165">
                                <div class="card-body">
                                    <h5 class="card-title">Jurusan Desain Permodelan dan Informasi Bangunan</h5>
                                    <p class="card-text">Prospek Lulusan menjadi Drafter, Quality Control, Quantity Surveyor, Pelaksana Lapangan, Konsultan Perencana, Kontraktor.</p>
                                    <button type="button" class="btn btn-primary" onclick="submitForm('modelbangunan')">Pilih Jurusan</button>
                                </div>
                            </div>
                            <div class="card mx-2" style="width: 100%;">
                                <img src="https://static.wixstatic.com/media/1a34da_d04764e9bea847ea83654727a82d6b3b~mv2.jpg/v1/fill/w_1000,h_625,al_c,q_85,usm_0.66_1.00_0.01/1a34da_d04764e9bea847ea83654727a82d6b3b~mv2.jpg" class="card-img-top" alt="kebun" height="165">
                                <div class="card-body">
                                    <h5 class="card-title">Jurusan Otomatisasi Perkebunan</h5>
                                    <p class="card-text">Prospek Lulusan Menjadi Programmer IOT Pertanian, Petani Modern, Perancang Sistem Kontrol dan Pebisnis Pertanian dan Perkebunan.</p>
                                    <button type="button" class="btn btn-primary" onclick="submitForm('otomatisasiperkebunan')">Pilih Jurusan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <script>
    document.getElementById('login-form').addEventListener('submit', function (event) {
        event.preventDefault(); 
        const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show(); 
    });

    function submitForm(jurusan) {
        var nama = document.getElementById('nama').value;
        var nomorhp = document.getElementById('nomorhp').value;
        var asalsekolah = document.getElementById('asalsekolah').value;

        var form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', 'login_process.php');

        var inputLogin = document.createElement('input');
        inputLogin.setAttribute('type', 'hidden');
        inputLogin.setAttribute('name', 'login');
        inputLogin.setAttribute('value', 'true');
        form.appendChild(inputLogin);

        var inputNama = document.createElement('input');
        inputNama.setAttribute('type', 'hidden');
        inputNama.setAttribute('name', 'nama');
        inputNama.setAttribute('value', nama);
        form.appendChild(inputNama);

        var inputNomorHp = document.createElement('input');
        inputNomorHp.setAttribute('type', 'hidden');
        inputNomorHp.setAttribute('name', 'nomor_hp');
        inputNomorHp.setAttribute('value', nomorhp);
        form.appendChild(inputNomorHp);

        var inputAsalSekolah = document.createElement('input');
        inputAsalSekolah.setAttribute('type', 'hidden');
        inputAsalSekolah.setAttribute('name', 'asalsekolah');
        inputAsalSekolah.setAttribute('value', asalsekolah);
        form.appendChild(inputAsalSekolah);

        var inputJurusan = document.createElement('input');
        inputJurusan.setAttribute('type', 'hidden');
        inputJurusan.setAttribute('name', 'jurusan');
        inputJurusan.setAttribute('value', jurusan);
        form.appendChild(inputJurusan);

        document.body.appendChild(form);
        form.submit();
    }
        </script>
    </body>
</html>
