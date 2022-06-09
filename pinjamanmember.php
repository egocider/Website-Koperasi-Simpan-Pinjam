<div class="col-lg-12">
        <h1>Data Simpanan<small> Anggota</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> Simpanan </li>
        </ol>
    </div>
    <table class="table table-striped ">
        <tr>
        
          
        </tr>
        <tr bgcolor="#DFE6EF" height="30">
        <h4><center><b>Simpanan Anda <u><i><?=$_SESSION['username']?></i></u></b></center></h4>
            <td><a class = "btn btn-info " href="indexmember.php?page=dashboard">Kembali</a>  </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Total Simpanan</th>
        </tr>


<?php
include('config.php');
if (isset($_GET['username'])) {
    $username = $_GET['username'];
}
else {
die ("Username tidak ada!");	
}
$sql = mysqli_query($conn, "SELECT * FROM anggota WHERE username = '$username'");
$no = 0;
while ( $fetch = mysqli_fetch_array($sql)){
    $username = $fetch['username'];
    $nama = $fetch['nama'];
    $simpanan = $fetch['simpanan'];
{
    $no++;

?>
<tr>
    <td><?=$no?></td>
    <td><?=$username?></td>
    <td><?=$nama?></td>
    <td><?=$simpanan?></td>
</tr>



<?php
    }
}
?>
</table>
</div>
