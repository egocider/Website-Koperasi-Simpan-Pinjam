<?php 

include('config.php');
if (isset($_GET['id'])){
    $id = $_GET['id'];

  $query = mysqli_query($conn, "SELECT * FROM anggota WHERE id='$id'");

    
}else {
    die ("Error, Username tidak ada");
}

if (!empty($id) && $id != ""){
    $hapusanggota = mysqli_query($conn, "DELETE FROM anggota WHERE id='$id'");
    $hapususer = mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

    if ($hapusanggota) {
        echo '<script>alert("Berhasil dihapus!");</script>';
	    echo '<script>window.location="indexadmin.php?page=datamember";</script>';
        die();
    }else {
        echo '<script>alert( "Hapus gagal");</script>';
    }
    
}

?>