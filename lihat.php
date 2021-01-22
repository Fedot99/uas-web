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
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Welcome to Mager Diskus</title>
</head>

<body>
    <?php include 'assets/_koneksi.php';?>
    <?php include 'assets/_header.php';?>
    

    <?php
    $id = $_GET['idpertanyaan'];
    $sql = "SELECT * FROM `tbl_pertanyaan` WHERE id_pertanyaan =$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $judul = $row['judul_pertanyaan'];
        $des = $row['desk_pertanyaan'];
        $pertanyaan_user_id = $row['pertanyaan_user_id'];

        $sql2 = "SELECT email_user FROM tbl_user WHERE id_user='$pertanyaan_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['email_user'];
        
    }
    ?>

    <?php
    $showAlert = false; 
    $method = $_SERVER['REQUEST_METHOD']; 
    if ($method == 'POST'){
        //Tambah ke Database
        $komen = $_POST['komentar'];
        $komen = str_replace("<", "&lt", $komen);
        $komen = str_replace(">", "&gt", $komen);
        $id_user = $_POST['id_user'];
        $sql = "INSERT INTO `tbl_komentar` (`komentar`, `id_pertanyaan`, `komentar_by`, `waktu_komentar`)
         VALUES ('$komen', '$id', '$id_user', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Komentar telah di tambah! Harap tunggu tanggapan dari kumunitas
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
        }
    }
    ?>


    <!-- Kategori container -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $judul;?></h1>
            <p class="lead"><?php echo $des;?></p>
            <hr class="my-4">
            <p>Ini adalah forum untuk berbagi pengalaman dengan orang lain</p>
            <p>Posted by: <b><?php echo $posted_by; ?></b></p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    <?php
    if(isset($_SESSION['login']) && $_SESSION['login']== true){
    echo '<div class="container">
        <h1 class="py-2">Tulis Komentar</h1>

        <form action="'. $_SERVER['REQUEST_URI']. '" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ketik Komentar Anda</label>
                <textarea class="form-control" id="komentar" name="komentar" rows="3"></textarea>
                <input type="hidden" name="id_user" value="'. $_SESSION['id_user'] .'">
            </div>
            <button type="submit" class="btn btn-success">Tambah Komentar</button>
        </form>
    </div>';
    }
?>
    <div class="container mb-5" id="ques">
        <h1 class="py-2">Diskusi</h1>
        <?php
        $id = $_GET['idpertanyaan'];
        $sql = "SELECT * FROM `tbl_komentar` WHERE id_pertanyaan=$id";
        $result = mysqli_query($conn, $sql);
        $noresult =true;
        while($row = mysqli_fetch_assoc($result)){
            $noresult =false;
            $id = $row['id_komentar'];
            $komen = $row['komentar'];
            $waktu_komentar = $row['waktu_komentar'];
            $pertanyaan_user_id = $row['komentar_by'];

            $sql2 = "SELECT email_user FROM tbl_user WHERE id_user='$pertanyaan_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
    
        
        echo '<div class="media my-3">
            <img class="mr-3" width="55px" src="./assets/user.png" alt="Generic placeholder image">
            <div class="media-body">
            <p class="font-weight-bold my-0">'. $row2['email_user'] .' at ' . $waktu_komentar . '</p>
                '. $komen .'
            </div>
        </div>';
}

if($noresult){
    echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            <h1 class="display-4">Tidak ada Pertanyaan</h1>
            <p class="lead">Ajukan Pertanyaan</p>
            </div>
        </div>';
}
?>
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