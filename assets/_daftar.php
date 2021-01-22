<?php
$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_koneksi.php';
    $nama_user = $_POST['nama'];
    $email_user = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //cek email
    $existsql = "SELECT * FROM `tbl_user` WHERE email_user = '$email_user'";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email ini telah di gunakan";
    }
    else{
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `tbl_user` (`nama_user`, `email_user`, `password`, `waktu`) 
            VALUES ('$nama_user', '$email_user', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            
             if($result){
                 $showAlert = true;
                 header("Location: /komunitas/index.php?daftarberhasil=true");
                 
                 exit();
             }
        }
        else{
            $showError = "password harus sama";
            
        }
    }
    header("Location: /komunitas/index.php?daftarberhasil=false&error=$showError");
}
?>