<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="assets/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>

	<?php
if (isset($_POST['tambah'])) {
	$nama = mysqli_escape_string($koneksi,$_POST['nama']);
	$select = mysqli_query($koneksi,"SELECT name FROM users WHERE name='$nama'");
	$cek = mysqli_num_rows($select);
	if ($cek > 0) {
		 echo '<script type="text/javascript">
		    swal({
		    title: "Maaf",
		     icon: "error",
		    text: "Programmer Sudah Ditambahkan !",
		    type: "error"
		}).then(function() {
		    window.location = "partb.php";
		});
		    </script>';
	} else {
	$query = mysqli_query($koneksi,"INSERT INTO users VALUES(
		'',
		'$nama'
		)");
	if ($query) {
		 echo '<script type="text/javascript">
		    swal({
		    title: "Berhasil",
		     icon: "success",
		    text: "Programmer telah ditambahkan !",
		    type: "success"
		}).then(function() {
		    window.location = "partb.php";
		});
		    </script>';
	}	
}
}

if (isset($_POST['skill'])) {
	$id = mysqli_escape_string($koneksi,$_POST['id']);
	$skill = mysqli_escape_string($koneksi,$_POST['nama_skill']);
	if ($skill == '') {
		echo '<script type="text/javascript">
		    swal({
		    title: "Peringatan",
		     icon: "error",
		    text: "Tidak Boleh Kosong !",
		    type: "error"
		}).then(function() {
		    window.location = "partb.php";
		});
		    </script>';
	} else {
	$insert = mysqli_query($koneksi,"INSERT INTO skills VALUES (
		'',
		'$skill',
		'$id'
		)");
	if ($insert) {
		 echo '<script type="text/javascript">
		    swal({
		    title: "Berhasil",
		     icon: "success",
		    text: "Skill telah ditambahkan !",
		    type: "success"
		}).then(function() {
		    window.location = "partb.php";
		});
		    </script>';
	}
}
}
	?>

	<section id="tambah" class="mt-5">
		<div class="container">
			<div class="card">
			  <div class="card-header" id="supmerah">
			    Tambah Programmer
			  </div>
			  <div class="card-body">
			  	<form action="" method="POST">
			  		  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Programmer</label>
					    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
					  	<input type="submit" class="btn btn-danger mt-3" name="tambah" value="Kirim">
					  </div>
			  	</form>
			  </div>
			</div>
		</div>
	</section>

	<section id="daftar" class="mt-5">
		<div class="container">
			<h3 class="text-center text-title mb-5" style="letter-spacing:5px;">Daftar Programmer</h3>

			<?php
			$sql = mysqli_query($koneksi,"SELECT * FROM users ORDER BY id_user DESC");
			while ($r = mysqli_fetch_array($sql)) {
			$id = $r['id_user'];
			?>
			<div class="card mb-5 border-0" id="suphijau">
			  <div class="card-body">
			  	<div class="row justify-content-center">
			  		<div class="col-md-4">
			  			<i class="material-icons" style="font-size:15rem">person</i>
			  		</div>
			  	<div class="col-md-4">
			  		<h3 class="card-title font-weight-bold" style="letter-spacing:2px;"><div><?php echo $r['name']?></div></h3>
			  		<p style="font-size:20px">Skills : </p>
				    <p class="card-text">
				    	<?php
				    		$skill = mysqli_query($koneksi,"SELECT * FROM skills WHERE user_id='$id'");
			while ($data = mysqli_fetch_array($skill)) {
				# code...
			
				    	?>
				    	<div>- <?php echo $data['nama_skill']?></div>
				    	<?php
				    }
				    ?>
				    </p>
			  	</div>
			  	<div class="col-md-4" align="left">
			  		<form action="" method="POST">
			  		 	<div class="form-group">
					    	<label for="exampleInputEmail1"><b>Tambah Skill</b></label>
					    	<input type="text" name="nama_skill" class="form-control"  placeholder="Skill">
					    	<input type="text" name="id" value="<?php echo $r['id_user']?>" readonly hidden>
					    	 <small  class="form-text ">Hanya 1 Skill</small>
					  		<input type="submit" class="tombol btn-block mt-3" name="skill" value="Kirim">
						</div>
			  		</form>
			  	</div>
			  	</div>
			  </div>
			</div>
			<?php
		}
			?>
		</div>
	</section>
</body>
</html>