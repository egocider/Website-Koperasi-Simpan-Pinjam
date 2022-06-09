<html>
    <body>
    <div class="col-lg-12">
        <h1>Transaksi<small> Simpan</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> List Simpanan Member</li>
        </ol>
    </div>

    <div class="col-12 mt-3">
        <?php
        include('config.php');
            $result = mysqli_query($conn, 'SELECT * FROM anggota ');
           
            if ($result->num_rows) {
                ?>
        <table class="table table-striped   table-hover  ">
            <thead class="">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Total Simpanan</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    
                while ($item = $result->fetch_object()) {
                    ?>
                <tr>

                    <td>
                        <?= $i; ?>
                    </td>

                    <td>
                        <?= $item->username; ?>
                    </td>
                    <td>
                        <?= $item->nama; ?>
                    </td>
                    <td>
                        <?= $item->simpanan; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="indexadmin.php?page=forminputsimpanan&username=<?= $item->username?>">Input Simpanan</a> <a
                            class="btn btn-warning" href="indexadmin.php?page=forminputtarikan&username=<?= $item->username?>">Tarik Simpanan</a>
    </div>
    </td>
    </td>
    </tr>
    <?php
                        $i++;
                        
                }
               
                ?>
    </tbody>

    </table>
    
    <?php
                
            } else
                echo 'Datanya tidak ada';
            ?>
    </body>
</html>