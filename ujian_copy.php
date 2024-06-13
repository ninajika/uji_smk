<?php

session_start();
if (!isset($_SESSION['nama'])) {
    echo "<script>alert('Silahkan Mendaftar Terlebih Dahulu'); window.location.href='index.php';</script>";
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Uji (Beta)</title>

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
        <!-- <script src="debug.js" defer></script> -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <!--bikin header -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!--<a class="navbar-brand" href="#">PlaceHolder</a>-->
                <img
                    src="smk_kotawaringin.png"
                    class="navbar-brand brand-logo"
                    alt="smk kotawaringin logo"
                    srcset=""
                />
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
                            <a class="nav-link" href="index.php"
                                >Daftar</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="leaderboard.php"
                                >LeaderBoard</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aroa-current="page"
                                href="ujian.php"
                                >Ujian</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- bikin ujian body -->
        <div class="container mt-2">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- form ujian -->
                            <form id="ujianForm">
                                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['nama']; ?>">
                                <div class="mb-3">
                                    <p
                                        style="
                                            margin-left: 85%;
                                            white-space: nowrap;
                                        "
                                        class="d-flex"
                                    >
                                        Waktu Berjalan :
                                        <span id="timer" style="margin-left: 0.5em" class="d-flex" >10:00</span>
                                    </p>
                                </div>
                                    <div class="mb-3">
                                        <h2 class="card-title">Soal 1</h2>
                                        <label for="soal1" class="form-label">Apa Itu Kalajengking?</label>
                                        <br />
                                        <input type="radio" name="answer_soal1" id="optionA" value="A">
                                        <label for="optionA">A) Hewan berkaki delapan yang memiliki cangkang keras.</label>
                                        <br />
                                        <input type="radio" name="answer_soal1" id="optionB" value="B">
                                        <label for="optionB">B) Tanaman berbunga dengan duri tajam.</label>
                                        <br>
                                        <input type="radio" name="answer_soal1" id="optionC" value="C">
                                        <label for="optionC">C) Jenis tanaman hias berdaun lebar dan berwarna-warni.</label>
                                        <br>
                                        <input type="radio" name="answer_soal1" id="optionD" value="D">
                                        <label for="optionD">D) Ikan predator yang hidup di perairan laut dalam.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 2</h2>
                                        <label for="soal2" class="form-label">Apa Itu Kadal?</label>
                                        <br>
                                        <input type="radio" name="answer_soal2" id="optionA" value="A">
                                        <label for="optionA1">A) Ikan predator yang hidup di perairan laut dalam.</label>
                                        <br>
                                        <input type="radio" name="answer_soal2" id="optionB" value="B">
                                        <label for="optionB2">B) Jenis tanaman hias berdaun lebar dan berwarna-warni.</label>
                                        <br>
                                        <input type="radio" name="answer_soal2" id="optionC" value="C">
                                        <label for="optionC2">C) Hewan berkaki delapan yang memiliki cangkang keras.</label><br />
                                        <input type="radio" name="answer_soal2" id="optionD" value="D">
                                        <label for="optionD2">D) Tanaman berbunga dengan duri tajam.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 3</h2>
                                        <label for="soal3" class="form-label">Apa itu Fotosintesis?</label>
                                        <br>
                                        <input type="radio" name="answer_soal3" id="optionA3" value="A">
                                        <label for="optionA3">A) Proses penguraian senyawa organik menjadi senyawa anorganik dengan bantuan energi matahari.</label>
                                        <br>
                                        <input type="radio" name="answer_soal3" id="optionB3" value="B">
                                        <label for="optionB3">B) Proses pembentukan senyawa organik dari senyawa anorganik dengan bantuan energi matahari.</label>
                                        <br>
                                        <input type="radio" name="answer_soal3" id="optionC3" value="C">
                                        <label for="optionC3">C) Proses penguraian senyawa anorganik menjadi senyawa organik tanpa bantuan energi matahari.</label><br />
                                        <input type="radio" name="answer_soal3" id="optionD3" value="D">
                                        <label for="optionD3">D) Proses pembentukan senyawa anorganik dari senyawa organik tanpa bantuan energi matahari.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 4</h2>
                                        <label for="soal4" class="form-label">Apa yang dimaksud dengan Gravitasi?</label>
                                        <br>
                                        <input type="radio" name="answer_soal4" id="optionA4" value="A">
                                        <label for="optionA4">A) Gaya tarik-menarik antara benda-benda dengan massa.</label>
                                        <br>
                                        <input type="radio" name="answer_soal4" id="optionB4" value="B">
                                        <label for="optionB4">B) Daya yang menghambat gerak benda.</label>
                                        <br>
                                        <input type="radio" name="answer_soal4" id="optionC4" value="C">
                                        <label for="optionC4">C) Daya yang menyebabkan perubahan bentuk benda.</label><br />
                                        <input type="radio" name="answer_soal4" id="optionD4" value="D">
                                        <label for="optionD4">D) Gaya yang menggerakkan benda ke atas.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 5</h2>
                                        <label for="soal5" class="form-label">Apa yang dimaksud dengan Evolusi?</label>
                                        <br>
                                        <input type="radio" name="answer_soal5" id="optionA5" value="A">
                                        <label for="optionA5">A) Proses terjadinya perubahan genetik pada suatu populasi makhluk hidup dari generasi ke generasi.</label>
                                        <br>
                                        <input type="radio" name="answer_soal5" id="optionB5" value="B">
                                        <label for="optionB5">B) Teori yang menjelaskan asal-usul kehidupan di Bumi.</label>
                                        <br>
                                        <input type="radio" name="answer_soal5" id="optionC5" value="C">
                                        <label for="optionC5">C) Proses perubahan bentuk tubuh makhluk hidup selama hidupnya.</label><br />
                                        <input type="radio" name="answer_soal5" id="optionD5" value="D">
                                        <label for="optionD5">D) Proses perubahan iklim global.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 6</h2>
                                        <label for="soal6" class="form-label">Apa yang dimaksud dengan Medan Magnet?</label>
                                        <br>
                                        <input type="radio" name="answer_soal6" id="optionA6" value="A">
                                        <label for="optionA6">A) Daerah di sekitar magnet dimana gaya magnet terasa.</label>
                                        <br>
                                        <input type="radio" name="answer_soal6" id="optionB6" value="B">
                                        <label for="optionB6">B) Titik pusat gaya magnet.</label>
                                        <br>
                                        <input type="radio" name="answer_soal6" id="optionC6" value="C">
                                        <label for="optionC6">C) Daerah di sekitar magnet dimana gaya magnet paling kuat.</label><br />
                                        <input type="radio" name="answer_soal6" id="optionD6" value="D">
                                        <label for="optionD6">D) Titik nol gaya magnet.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 7</h2>
                                        <label for="soal7" class="form-label">Apa yang dimaksud dengan Hukum Newton Pertama?</label>
                                        <br>
                                        <input type="radio" name="answer_soal7" id="optionA7" value="A">
                                        <label for="optionA7">A) Setiap benda akan tetap dalam keadaan diam atau bergerak lurus beraturan selama gaya total yang bekerja padanya adalah nol.</label>
                                        <br>
                                        <input type="radio" name="answer_soal7" id="optionB7" value="B">
                                        <label for="optionB7">B) Gaya yang diberikan pada suatu benda akan menghasilkan percepatan benda tersebut sebanding dengan besarnya gaya dan berlawanan arah dengan gaya tersebut.</label>
                                        <br>
                                        <input type="radio" name="answer_soal7" id="optionC7" value="C">
                                        <label for="optionC7">C) Hukum yang menyatakan bahwa gaya total yang bekerja pada suatu benda sama dengan massa benda dikalikan dengan percepatannya.</label><br />
                                        <input type="radio" name="answer_soal7" id="optionD7" value="D">
                                        <label for="optionD7">D) Hukum yang menyatakan bahwa setiap aksi memiliki reaksi yang sebanding tetapi berlawanan arah.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 8</h2>
                                        <label for="soal8" class="form-label">Apa yang dimaksud dengan Iklim?</label>
                                        <br>
                                        <input type="radio" name="answer_soal8" id="optionA8" value="A">
                                        <label for="optionA8">A) Kondisi atmosfer suatu tempat pada saat tertentu.</label>
                                        <br>
                                        <input type="radio" name="answer_soal8" id="optionB8" value="B">
                                        <label for="optionB8">B) Cuaca rata-rata suatu tempat dalam rentang waktu yang cukup lama.</label>
                                        <br>
                                        <input type="radio" name="answer_soal8" id="optionC8" value="C">
                                        <label for="optionC8">C) Proses perubahan suhu di Bumi.</label><br />
                                        <input type="radio" name="answer_soal8" id="optionD8" value="D">
                                        <label for="optionD8">D) Kondisi udara di atmosfer yang berlangsung dalam waktu yang lama.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 9</h2>
                                        <label for="soal9" class="form-label">Apa yang dimaksud dengan Satelit Buatan?</label>
                                        <br>
                                        <input type="radio" name="answer_soal9" id="optionA9" value="A">
                                        <label for="optionA9">A) Benda langit alami yang mengorbit planet.</label>
                                        <br>
                                        <input type="radio" name="answer_soal9" id="optionB9" value="B">
                                        <label for="optionB9">B) Pesawat ruang angkasa yang diluncurkan ke luar angkasa untuk mengorbit Bumi atau planet lain.</label>
                                        <br>
                                        <input type="radio" name="answer_soal9" id="optionC9" value="C">
                                        <label for="optionC9">C) Pesawat ruang angkasa yang mengorbit bumi untuk keperluan komunikasi, pemetaan, dll.</label><br />
                                        <input type="radio" name="answer_soal9" id="optionD9" value="D">
                                        <label for="optionD9">D) Pesawat ruang angkasa yang berada di luar angkasa dan tidak mengorbit bumi.</label>
                                    </div>
                                    <br>
                                    <div class="mb3">
                                        <h2 class="card-title">Soal 10</h2>
                                        <label for="soal10" class="form-label">Apa yang dimaksud dengan Bioteknologi?</label>
                                        <br>
                                        <input type="radio" name="answer_soal10" id="optionA10" value="A">
                                        <label for="optionA10">A) Ilmu yang mempelajari proses-proses biologis dalam organisme hidup.</label>
                                        <br>
                                        <input type="radio" name="answer_soal10" id="optionB10" value="B">
                                        <label for="optionB10">B) Ilmu yang mempelajari teknologi dalam bidang biologi.</label>
                                        <br>
                                        <input type="radio" name="answer_soal10" id="optionC10" value="C">
                                        <label for="optionC10">C) Penggunaan mikroorganisme atau bagian dari mikroorganisme untuk membuat produk atau proses yang berguna bagi manusia.</label><br />
                                        <input type="radio" name="answer_soal10" id="optionD10" value="D">
                                        <label for="optionD10">D) Teknologi yang memanfaatkan proses-proses biologi dalam produksi makanan dan minuman.</label>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" name="submit" onclick="confirm('Apakah anda yakin?')">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('ujianForm').addEventListener('submit', function(event) {
                event.preventDefault(); 

                const user = document.getElementById('user').value;

                const answers = [];

                for (let i = 1; i <= 10; i++) {
                    const answerElement = document.querySelector(`input[name="answer_soal${i}"]:checked`);

                    if (answerElement) {
                        answers.push({ soal: i, jawaban: answerElement.value });
                    } else {
                        answers.push({ soal: i, jawaban: null }); 
                    }
                }

                const payload = {
                    pengguna: user,
                    waktu: document.getElementById('timer').textContent,
                    jawaban: answers
                };

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'ujian_post.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            console.log('Response:', response);
                            if (response.status === 'success') {
                                alert('Terima kasih telah mengisi kuis!');
                                window.location.href = 'index.php?status=berhasil';
                            } else {
                                alert('Error: ' + response.message);
                            }
                        } else {
                            console.error('Error:', xhr.statusText);
                            alert('Terjadi kesalahan.', response.message);
                        }
                    }
                };

                console.log('Sending:', payload);
                xhr.send(JSON.stringify(payload));
            });

            function startTimer(duration, display) {
                let timer = duration,
                    minutes,
                    seconds;
                const interval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        clearInterval(interval);
                        alert("Waktu habis!");
                        window.location.href = "index.php";
                    }
                }, 1000);
            }

            window.onload = function () {
                const tenMinutes = 60 * 10, 
                    display = document.querySelector("#timer");
                startTimer(tenMinutes, display);
            };


        </script>
    </body>
</html>
