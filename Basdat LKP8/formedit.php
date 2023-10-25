<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Data| SMK Coding</title>
</head>

<body>
	<header>
		<h3>Formulir Edit Data</h3>
	</header>

	<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$query = pg_query("SELECT * FROM calonsiswa WHERE id=$id");
		$siswa = pg_fetch_array($query);
		$jk=$siswa['jenis_kelamin'];
		$l=FALSE;
		$p=FALSE;
		if($jk=='laki-laki') $l=TRUE;
		if($jk=='perempuan') $p=TRUE;
	}
	?>

	<form action="prosesedit.php" method="POST">
		<fieldset>
		<input type="hidden" name="id" value="<?=$siswa['id'] ?>">
		<p>
			<label for="nama">Nama: </label>
			<input type="text" name="nama" placeholder="nama lengkap" value="<?=$siswa['nama']?>"/>
		</p>
		<p>
			<label for="alamat">Alamat: </label>
			<textarea name="alamat"><?=$siswa['alamat']?></textarea>
		</p>
		<p>
			<label for="jenis_kelamin">Jenis Kelamin: </label>
			<?php
			if($l==TRUE){
				echo "<label><input type='radio' name='jenis_kelamin' value='laki-laki' checked>".'Laki-laki'."</label>";
				echo "<label><input type='radio' name='jenis_kelamin' value='perempuan'>".'Perempuan'."</label>";
			}else{
				echo "<label><input type='radio' name='jenis_kelamin' value='laki-laki'>".'Laki-laki'."</label>";
				echo "<label><input type='radio' name='jenis_kelamin' value='perempuan' checked>".'Perempuan'."</label>";
			}
			?>
		</p>
		<p>
			<label for="sekolah_asal">Sekolah Asal: </label>
			<input type="text" name="sekolah_asal" value="<?=$siswa['sekolah_asal']?>" />
		</p>
		<p>
			<input type="submit" value="Edit" name="edit" />
		</p>
		</fieldset>
	</form>

	</body>
</html>
