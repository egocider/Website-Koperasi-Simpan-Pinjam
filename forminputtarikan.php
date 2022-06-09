<?php
include('config.php');
if(isset($_GET['username'])){
    $username = $_GET['username'];
    $query = mysqli_query($conn, "SELECT * FROM anggota WHERE username = '$username'");
    $fetch = mysqli_fetch_array($query);
    $username = $fetch['username'];
    $nama = $fetch['nama'];
}else{
    die("Error, Tidak ada Data yang dipilih");
}

if(isset($_POST['tarik'])){
$username = $_POST['username'];
$nama = $_POST['nama'];
$tgl_trx = $_POST['tgl_trx'];
$jlh_bayar = $_POST['jlh_bayar'];

if (empty($_POST['jlh_bayar'])) {
    echo '<script>alert("Masukkan Jumlah Tarikan!");</script>';
    echo '<script>window.location="indexadmin.php?page=tarikan";</script>';
}else {
    #query ke tbl pinjaman
    $querypinjaman = mysqli_query($conn, "INSERT INTO tarikan (username, nama, tgl_trx,jlh_bayar) VALUES ('$username', '$nama', '$tgl_trx', '$jlh_bayar')");
    #query ke tbl anggota
    $queryanggota = mysqli_query($conn, "UPDATE anggota SET simpanan = simpanan - $jlh_bayar WHERE username = '$username'");

    if ($queryanggota){
        echo '<script>alert("Pinjaman berhasil diinput!");</script>';
        echo '<script>window.location="indexadmin.php?page=simpanan";</script>';
    }else {
        echo "Pinjaman gagal diinput!";
    }
}
}


?>
<div class="col-lg-12">
    <h1>Tarik Simpanan<small> </small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-edit"></i> Tarikan</li>
    </ol><a class = "btn btn-info " href="indexadmin.php?page=simpanan">Kembali</a>
    <h4 class="text-center mb-3">Tarik Simpanan </h4>
    
    <form action="" method="POST">
        <div class="error" style="display: none"></div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" value="<?=$username?>" name="username" disabled="disabled" >
            <input type="hidden" class="form-control" value="<?=$username?>" name="username" >
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="<?=$nama?>" disabled="disabled">
            <input type="hidden" class="form-control" name="nama" value="<?=$nama?>" >
        </div>

        <div class="form-group">
            <label>Tanggal Transaksi</label>
            <input type="Date" class="form-control" name="tgl_trx" required>
        </div>

        <div class="form-group">
            <label>Jumlah Pinjaman</label>
            <input type="number" class="form-control" name="jlh_bayar" required>
        </div>

        <div class="form-group mt-4">
                                <input type="submit" class="btn btn-primary" value="Tarik"name="tarik">
                                <input type="reset" class="btn btn-danger" value="Batal">
                                <br>

                            </div>

    </form>