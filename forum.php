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
    

    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="./assets/slide1.jpeg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./assets/slide2.jpeg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./assets/slide3.jpeg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Kategori container -->
    <div class="container my-4">
        <h2 class="text-center my-4">Mager - Categories</h2>
        <div class="row my-4">
            <!-- Fetch semua kategori -->
            <?php 
            $sql = "SELECT * FROM `tbl_kategori`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                // echo $row['kategori_id'];
                // echo $row['nama_kategori'];
                $id = $row['kategori_id'];
                $kat = $row['nama_kategori'];
                $des = $row['deskripsi'];
                echo '<div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./assets/card' . $id . '.jpeg"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><a href="lihatlist.php?katid=' . $id. '">' . $kat. '</a></h5>
                        <p class="card-text">' . substr($des, 0, 90). '...</p>
                        <a href="lihatlist.php?katid=' . $id. '" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>';
            }            
            ?>
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