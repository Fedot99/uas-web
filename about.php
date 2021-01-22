<?php

session_start();
if(!isset($_SESSION['login'])){
    header("location: index.php");
    exit;

}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="./assets/mager.png">
    <title>Welcome to Mager Diskus</title>
</head>

<body>
    <?php include 'assets/_koneksi.php';?>
    <?php include 'assets/_header.php';?>

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header text-center bg-dark text-light">
                About
            </div>
            <div class="card-body">
                <h4 class="card-title text-md-center">Mager Diskus</h4>
                <p><b>Mager Diskus </b> adalah layanan untuk memberikan komentar dari setiap pertanyaan yang terdapat di
                 kategori, didalam halaman tersebut terdapat banyak sekali pertanyaan dan jawaban yang kalian inginkan</p>
                 <p>Diskusi penting dilakukan karena memiliki banyak manfaat,  yaitu melatih kemampuan berpikir kreatif 
                 dan kritis, menanamkan sikap demokratis dan belajar menghargai perbedaan pendapat. Kita juga bisa belajar
                  dari pengalaman orang lain sehingga memperkaya wawasan, serta melatih kemampuan untuk menyampaikan gagasan
                   secara baik. Tujuan dilakukan diskusi antara lain menyamakan pemahaman terkait suatu hal, bertukar gagasan,
                    atau  mencari solusi dari suatu permasalahan.</p>
                
                <p>Untuk mengikuti Forum Diskusi Mager, anda di wajibkan melakukan registrasi terlebih dahulu, jika sudah memiliki
                 akun atau sudah registrasi silahkan anda langsung login, untuk dapat memberikan masukan atau komentar dari setiap
                 petnyaan di menu kategori ataupun memberikan komentar dari pertanyaan peserta diskusi lainnya.</p>
                
            </div>
        </div>
    </div>
    
    <?php include 'assets/_footer.php';?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>