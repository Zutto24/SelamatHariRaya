<!DOCTYPE html>
<html>
<head>
	<title>Ucapan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	require_once "config.php" ;
	if (isset($_POST['kirim'])) {
		$t = $_GET['t'];
		$nama = urlencode($_POST['nama']);
		header("location:?t=".$t."&n=".$nama);
	}
	if(isset($_GET['t'])){
		$id = $_GET['t'];
		$data = mysqli_query($conn,"select * from kalimat where id = '$id'"); 
	}else{
		$id = 0;
		$data = mysqli_query($conn,"select * from kalimat where id = '$id'"); 
	}
	$all = mysqli_query($conn,"select * from kalimat"); 
	?>
</head>
<body>
	<div class="content">
		<?php if(mysqli_num_rows($data)>0) {?>
			<?php $row = mysqli_fetch_array($data) ?>
			<?php if(isset($_GET['n'])){ 
				$nm = $_GET['n'];
				?>
				<h1><?php echo $nm ?></h1>
				<p>Mengucapkan</p>
				<h3 class="appTitle"><?php echo $row['ucapan'] ?></h3>
			<?php } else{ ?>
				<h2>Masukkan Nama di pada kolom dibawah</h2>
			<?php }?>
		<?php }else{ ?>
			<h1>Aplikasi Ucapan</h1>
			<?php if(mysqli_num_rows($all)>0) {?>

				<ul>
					<?php while($row = mysqli_fetch_array($all)){ ?>
					<li>
						<a href="index.php?t=<?php echo $row['id'] ?>"><?php echo $row['hariraya'] ?></a>
					</li>
					<?php } ?>
				</ul>
			<?php } ?>

		<?php } ?>
	</div>
			<?php if(isset($_GET['t'])){ ?>
	<form action="" id="myform" method="post">
		<input type="text" name="nama" placeholder="Tulis nama disini...">
		<button type="submit" name="kirim">kirim</button>
	</form>
<?php } ?>
</body>
</html>