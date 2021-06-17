
<?php
if(isset($_SESSION['id_blog'])){
    $id_blog = $_SESSION['id_blog'];
    $id_kategori_blog = $_POST['id_kategori_blog'];
    $judul = $_POST['judul'];
    $isi = addslashes($_POST['isi']);
if(empty($id_kategori_blog)){
    header("Location:index.php?include=edit-blog&data=".$id_blog."&notif=editkosong");
}else if(empty($judul)){
    header("Location:index.php?include=edit-blog&data=".$id_blog."&notif=editkosong");
}else if(empty($isi)){
    header("Location:index.php?include=edit-blog&data=".$id_blog."&notif=editkosong");
}else{

$sql = "UPDATE `blog` set `id_kategori_blog`='$id_kategori_blog',`judul`='$judul',`isi`='$isi',`tanggal`=DATE_FORMAT(CURRENT_TIMESTAMP(), '%Y-%c-%d')) where `id_blog`='$id_blog'";
mysqli_query($koneksi,$sql);

header("Location:index.php?include=blog&notif=tambahberhasil");
}
}
?>