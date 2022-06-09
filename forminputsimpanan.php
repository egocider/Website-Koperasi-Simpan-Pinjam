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

if(isset($_POST['simpan'])){
$username = $_POST['username'];
$nama = $_POST['nama'];
$tgl_trx = $_POST['tgl_trx'];
$jlh_simpan = $_POST['jlh_simpan'];

if (empty($_POST['jlh_simpan'])) {
    echo '<script>alert("Masukkan Jumlah simpanan!");</script>';
    echo '<script>window.location="indexadmin.php?page=simpanan";</script>';
}else {
    #query ke tbl pinjaman
    $querysimpanan = mysqli_query($conn, "INSERT INTO simpanan (username, nama, tgl_trx,jlh_simpan) VALUES ('$username', '$nama', '$tgl_trx', '$jlh_simpan')");
    #query ke tbl anggota
    $queryanggota = mysqli_query($conn, "UPDATE anggota SET simpanan = simpanan + $jlh_simpan WHERE username = '$username'");

    if ($queryanggota){
        echo '<script>alert("Simpanan berhasil diinput!");</script>';
        echo '<script>window.location="indexadmin.php?page=simpanan";</script>';
    }else {
        echo "Simpanan gagal diinput!";
    }
}
}


?>
<div class="col-lg-12">
    <h1>Input Trasaksi<small> Simpan</small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-edit"></i> Simpanan</li>
    </ol><a class = "btn btn-info " href="indexadmin.php?page=simpanan">Kembali</a>
    <h4 class="text-center mb-3">Input Transaksi Simpan </h4>
    
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
            <input type="number" class="form-control" name="jlh_simpan" required>
        </div>

        <div class="form-group mt-4">
                                <input type="submit" class="btn btn-primary" value="Simpan"name="simpan">
                                <input type="reset" class="btn btn-danger" value="Batal">
                                <br>

                            </div>

    </form>