<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Barang</title>
</head>
<body>
    <!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
	$('#example').DataTable();
   } );
</script>

<a href="tambah_data.php">
    <button style="margin-bottom: 20px;" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </button>
</a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>No</td>
			<td>Nama Mahasiswa</td>
			<td>Alamat</td>
			<td>Jenis Kelamin</td>
			<td>Tanggal Masuk</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php
	        $no = 1;
	        $query = "SELECT * FROM barang ORDER BY barang ASC";
	        $dewan1 = $db1->prepare($query);
	        $dewan1->execute();
	        $res1 = $dewan1->get_result();

	        if ($res1->num_rows > 0) {
		        while ($row = $res1->fetch_assoc()) {
		        	$kode_item = $row['kode_item'];
		            $barang = $row['barang'];
		            $barcode = $row['barcode'];
		            $idsatuan = $row['idsatuan'];
		            $jenis = $row['jenis'];
                    $hargaumum = $row['hargaumum'];
                    $hargagrosir = $row['hargagrosir'];
                    $id = $row['id'];
                    $qty = $row['qty'];
		?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $barang; ?></td>
				<td><?php echo $jenis; ?></td>
				<td><?php echo $hargagrosir; ?></td>
				<td><?php echo $hargaumum; ?></td>
				<td>
					<a href="edit_data.php?<?php echo base64_encode($id) ?>">
						<button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </button>
					</a>
					<a href="hapus_data.php?<?php echo base64_encode($id) ?>">
						<button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus </button>
					</a>
				</td>
			</tr>
	    <?php } } else { ?> 
		    <tr>
		    	<td colspan='6'>Tidak ada data ditemukan</td>
		    </tr>
	    <?php } ?>
	</tbody>
</table>

<div class="text-center">© <?php echo date('Y'); ?> Copyright:
	<a href="https://dewankomputer.com/"> Dewan Komputer</a>
</div>
    
</body>
</html>