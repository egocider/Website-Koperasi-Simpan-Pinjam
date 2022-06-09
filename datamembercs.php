<?php 
include("config.php");
?>
<html>

<body>


    <div class="col-lg-12">
        <h1>Input Data<small> Anggota</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> Data Member CS</li>
        </ol>



        <div class="col-12 mt-3">
            <?php
            $result = mysqli_query($conn, 'SELECT * FROM anggota');
            if ($result->num_rows) {
                ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No HP</th>


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
                            <?= $item->nik; ?>
                        </td>
                        <td>
                            <?= $item->no_hp; ?>
                        </td>


                    </tr>
                    <?php
                        $i++;
                        $a = $i-1;
                }
               
                ?>
                </tbody>

            </table>
            <a>Jumlah Member : <?php echo $a ?> </a>
            <?php
                
            } else
                echo 'Datanya tidak ada';
            ?>
        </div>
    </div>

    </div>
    </form>
    </div>
</body>

</html>