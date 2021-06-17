<?php
  include("koneksi/koneksi.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include ("includes/head.php");?>
</head>
<body>
  <?php
    include("includes/navigasi.php");
    //pemanggilan konten halaman index
    if (isset($_GET["include"])) {
      $include = $_GET["include"];
        if ($include=="detail-buku") {
          include("include/detailbuku.php");
        }elseif ($include=="detail-blog") {
          include("include/detailblog.php");
        }elseif ($include=="about-us") {
          include("include/aboutus.php");
        }elseif ($include=="blog") {
          include("include/blog.php");
        }elseif ($include=="contact-us") {
          include("include/contactus.php");
        }elseif ($include=="daftar-buku") {
          include("include/daftarbuku.php");
        }elseif ($include=="detail-buku") {
          include("include/detailbuku.php");
        }elseif ($include=="daftar-buku-kategori") {
          include("include/daftarbuku.php");
        }elseif ($include=="daftar-buku-tag") {
          include("include/daftarbuku.php");
        }elseif ($include=="daftar-blog-kategori") {
          include("include/daftarblog.php");
        }elseif ($include=="daftar-blog-arsip") {
          include("include/daftarblog.php");
        }elseif ($include=="daftar-buku-cari") {
          include("include/daftarbuku.php");
        }elseif ($include=="detail-penulis") {
          include("include/detailpenulis.php");
        }
        else {
          include("include/index.php");
        }
    }else {
      include("include/index.php");
    }
  ?>
  <?php include ("includes/footer.php"); ?>
  <!-- Optional JavaScript; choose one of the two! -->
  <?php include("includes/script.php"); ?>
</body>
</html>