<?php
include('config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    
    $datamember = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql)< 1){
        echo "Data tidak ada";
    }
}

if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $akses = $_POST['akses'];

    $sqlusers = mysqli_query($conn, "UPDATE users SET  akses = '$akses' WHERE id = '$id'");

    if($sqlusers){
        echo '<script>alert("Edit Berhasil!");</script>';
        header('Location:indexadmin.php?page=datauser');
    }else {
        echo '<script>alert("Edit Gagal!");</script>';
    }
}


?>

<html>
    <body>
        <div class="col-lg-12">
        <h1>Edit Data<small> Users</small></h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-edit"></i> User</li>
                    </ol>
                    <a class = "btn btn-info " href="indexadmin.php?page=datauser">Kembali</a>
                    <h4 class="text-center mb-3">Edit Hak Akses  </h4>
                    
                    <form class="form" method="POST" action="">
                        <div class="error" style="display: none"></div>
                        <input type="hidden" name="id" value="<?php echo $datamember['id'];?>" />

                        <div class="form-group">
                            <label>Username  Anggota</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $datamember['username'];?>" disabled="disabled" />
                        </div>

                        <div class="form-group">
                            <label>Password  Anggota</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $datamember['password'];?>" disabled="disabled" />
                        </div>

                        <div class="form-group">
                            <label>Hak Akses</label>
                            <select class="form-control" name="akses"  value="<?php echo $datamember['akses'];?>">
                                <option value="admin">Admin</option>
                                <option value="cs">Customer Service</option>
                                <option value="member">Member</option>
                            </select>

                            <br>

                            <div class="form-group mt-4">
                                <input type="submit" class="btn btn-primary" value = "Simpan" name="simpan">
                                <input type="reset" class="btn btn-danger" value="Batal">
                                <br>

                            </div>
        </div>
    </body>
</html>