<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Arial';
            font-weight: 500;
        }

        .container {
            margin-top: 50px;
        }

        .foto {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>

    <!-- Link JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-5">List Barang</h2>
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "insert"){
                    echo "
                    <script>
                    alert('Siswa Berhasil di Tambah')
                    </script>
                  ";
                }elseif ($_GET['pesan'] == "update") {
                    echo "
                    <script>
                    alert('Siswa Berhasil di Update')
                    </script>
                  ";
                }
                elseif ($_GET['pesan'] == "delete") {
                    echo "
                    <script>
                    alert('Siswa Berhasil di Hapus')
                    </script>
                  ";
                }
            }
	    ?>

        <br>
        <a href="create.php" class="btn btn-primary mb-4">Tambah Siswa</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Umum</th>
                    <th scope="col">Harga Grosir</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            include 'koneksi.php';
            $data = mysqli_query($koneksi, "select * from barang");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <th scope="row"><?php echo $d['kode_item'] ?></th>
                    <td><?php echo $d['barang'] ?></td>
                    <td><?php echo $d['jenis'] ?></td>
                    <td><?php echo $d['hargaumum'] ?></td>
                    <td><?php echo $d['hargagrosir'] ?></td>
                    <td>
                        <a href="view/update.php?id=<?php echo $d['kode_item']; ?>" class="btn btn-warning text-white mb-2">Edit</a>
                        <a href="delete.php?id=<?php echo $d['kode_item']; ?>" class="btn btn-danger mb-2">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
</body>

</html>