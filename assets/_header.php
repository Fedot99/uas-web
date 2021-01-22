<?php
session_start();
if(!isset($_SESSION['login'])){
  header("location: index.php");
  exit;

}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">Mager</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="forum.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

      $sql = "SELECT nama_kategori, kategori_id FROM tbl_kategori";
      $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="lihatlist.php?katid='. $row['kategori_id'] .'">'. $row['nama_kategori'] .'</a>';
        
        }
      echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin.php" tabindex="-1">Admin</a>
    </li>
  </ul>
  <div class="row mx-2">';
  if(isset($_SESSION['login']) && $_SESSION['login']== true){
    echo '<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="text">Search</button>
    <p class="text-light my-0 mx-2"><b>'. $_SESSION['useremail']. '</b></p>
    <a href="assets/_logout.php" class="btn btn-outline-danger mx-2">Logout</a>
  </form>';
  }
  else{
  echo

  '<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    welcome
  </form>
        <button class="btn btn-outline-danger mx-2">Logout</button>';
  }
        echo '
  </div>
  
</div>
</nav>';


?>