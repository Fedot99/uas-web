<?php
include 'assets/_koneksi.php';
?>
<!DOCTYPE html>
<html>
<link rel="icon" href="./assets/mager.png">
<link rel="stylesheet" href="./assets/tema.css">

<head>
    <title>Halaman Utama</title>
</head>

<body style="height:850px">
    <div class="headerx">
    </div>
    <div class="header">
        <div id="image1" class="header">
            <a href="index.php" style="color: white;"><img src="./assets/mager.png"
                    class="rounded-circle, color:#FF0000;" id="image1">Mager</a>
        </div>
        <form action="/komunitas/assets/_masuk.php" method="POST"">
            <div id="form1" class="header">
                <font size="2">Nama Pengguna</font><br>
                <input placeholder="" type="text" id="loginemail" name="loginemail"><br>
            </div>
            <div id="form2" class="header">
                <font size="2">Kata Sandi</font><br>
                <input placeholder="" type="password" name="loginpass" id="loginpas"><br>
            </div>
            <div id="submit1" class="header"><input type="submit" id="button1" value="Masuk">
            </div>
        </form>
    </div>

    <div class="bodyx">
        <div id="intro1" class="bodyx">Mager Diskus membantu anda terhubung dan<br>berbagi dengan orang-orang dalam
            kehidupan anda.
        </div>
        <div id="intro2" class="bodyx">Daftar
        </div>
        <div id="img2" class="bodyx"><img src="./assets/forum.jpg">
        </div>
        <div id="intro3" class="bodyx">Ini cepat dan mudah.
        </div>
        <form action="/komunitas/assets/_daftar.php" method="POST">
            <div id="form3" class="bodyx">
                <input placeholder="Nama Lengkap" type="text" id="nama" name="nama"><br>
                <input placeholder="Email" type="email" id="email" name="email"><br>
                <input placeholder="Kata Sandi Baru" type="password" id="password" name="password"><br>
                <input placeholder="Ketik Ulang Kata Sandi" type="password" id="cpassword" name="cpassword"><br>
                <font size="2">Dengan Mengklik Daftar, Anda Menyetujui Ketentuan, Kebijakan Data dan Kebijakan Cookie
                    Kami.
                </font><br><br>
                <input type="submit" id="button2" name="daftar" value="Daftar">
            </div>
        </form>
        <footer>
            Mager Diskus Coding Forums © 2021
        </footer>
    </div>
    <?php
    if(isset($_GET['daftarberhasil']) && $_GET['daftarberhasil']=="true"){
    echo "<script>
            alert('Berhasil! Sekerang anda bisa masuk')
            </script>";
    }
    
?>
<?php
    if(isset($_GET['login']) && $_GET['login']=="false"){
    echo "<script>
            alert('Masukkan Email dan Kata Sandi yang benar')
            </script>";
    }
?>
<?php
    if(isset($_GET['login']) && $_GET['login']=="gagal"){
    echo "<script>
            alert('Silahkan masukkan email dan kata sandi')
            </script>";
    }
?>
</body>

</html>