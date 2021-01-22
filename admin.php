<?php
  include 'assets/_koneksi.php';
  
    if(isset($_POST['bsimpan'])){

        if($_GET['hal'] == "edit"){
            $edit = mysqli_query($conn, "UPDATE tbl_pertanyaan SET judul_pertanyaan = '$_POST[tjudul]',
                                                                    desk_pertanyaan = '$_POST[tdeskripsi]' 
                                                                    WHERE id_pertanyaan = '$_GET[id]'");
            if($edit){
                echo "<script>
                        alert('Edit Data Berhasil');
                        document.location='admin.php';
                </script>";
            }else{
                echo "<script>
                        alert('Edit Data Gagal');
                        document.location='admin.php';
                </script>";
         
            }
        }
    }



    //Tombol Edit
    if(isset($_GET['hal'])){
        if($_GET['hal'] == "edit"){
            $tampil = mysqli_query($conn, "SELECT * FROM tbl_pertanyaan WHERE id_pertanyaan = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data){
                $vjudul =$data['judul_pertanyaan'];
                $vdesk =$data['desk_pertanyaan'];
            }
        }else if($_GET['hal'] == "hapus"){
            $hapus = mysqli_query($conn, "DELETE FROM tbl_pertanyaan WHERE id_pertanyaan = '$_GET[id]'");
            if($hapus){
                echo "<script>
                        alert('Data Berhasil di Hapus');
                        document.location='admin.php';
                </script>";
            }else{
                echo "<script>
                        alert('Data Gagal di Hapus');
                        document.location='admin.php';
                </script>";
            }
        }

        
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
    <?php include 'assets/_header.php';?>

    
    <div class="container">

        <!-- Awal card Form -->
        <div class="card mt-5 mb-5">
            <div class="card-header bg-dark text-light">
                Form Edit Pertanyaan
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Judul Pertanyaan</label>
                        <input type="text" name="tjudul" value="<?=$vjudul?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Pertanyaan</label>
                        <textarea class="form-control" name="tdeskripsi" ><?=$vdesk?></textarea>
                    </div>

                    <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                    <a href="admin.php" class="btn btn-danger"> Kosongkan </a>

                </form>
            </div>
        </div>
    <!-- Akhir card Form -->

        <!-- Awal card Tabel -->
        <div class="card mt-5 mb-5">
            <div class="card-header bg-dark text-light">
                Data Pertanyaan
            </div>
            <div class="card-body">
                
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Judul Pertanyaan</th>
                        <th>Deskripsi Pertanyaan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no = 1; 
                        $tampil = mysqli_query($conn, "SELECT * FROM tbl_pertanyaan ORDER BY id_pertanyaan DESC");
                        while($data = mysqli_fetch_array($tampil)) :

                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data['judul_pertanyaan']?></td>
                        <td><?=$data['desk_pertanyaan']?></td>
                        <td>
                            <a href="admin.php?hal=edit&id=<?=$data['id_pertanyaan']?>" class="btn btn-outline-warning"> Edit </a>
                            <a href="admin.php?hal=hapus&id=<?=$data['id_pertanyaan']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-outline-danger"> Hapus </a>
                        </td>
                    </tr>
                        <?php endwhile; ?> 
                </table>

            </div>
        </div>
    <!-- Akhir card Tabel -->

















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