<?php
$showError = "true";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_koneksi.php';
    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];

    $sql = "SELECT * FROM tbl_user WHERE email_user='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['password'])){
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['useremail'] = $email;
                echo "logged in ". $email;
                header("Location: /komunitas/forum.php");
                exit;
            }
            else{
                $showAlert = true;
                 header("Location: /komunitas/index.php?login=false");
                 exit();
                    }
            } 
            $showAlert = true;
            header("Location: /komunitas/index.php?login=gagal");
            exit();
    }



?>