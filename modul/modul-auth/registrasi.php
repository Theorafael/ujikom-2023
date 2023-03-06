<?php
include('../../config/database.php');
if (isset($_POST['simpan'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$telp = $_POST['telp'];
	$q = mysqli_query($con, "INSERT INTO `masyarakat` (nik, nama, username, password, telp, verifikasi) VALUES ('$nik', '$nama', '$username', '$password', '$telp', 0)");
	if ($q) {
		echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                Registrasi Berhasil Tunggu verifikasi oleh admin
                </div>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php include('../../assets/header.php') ?>
<body data-background-color="dark">

<div class="wrapper">

	<section class="content ">
		<div class="container-fluid">
			<div class="row justify-content-md-center">
				<div class="col-md-3" style="margin-top:5%">

					<div class="card " style="background-color : rgb(186, 190, 195)">
						<div class="card card-secondary">
							<div class="card-header">
								<h3 class="card-title">&nbsp;</i>administrator <small></small></h3>
							</div>
						</div>
						<form action="" method="post">
							<div class="card-body">
								<div class="form-group">
									<label>Nik</label>
									<input type="text" name="nik" class="form-control" placeholder="Masukan NIK anda">
								</div>
								<div class="form-group">
									<label>Nama Lengkap Sesuai KTP</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control"
										placeholder="Masukan Username">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control"
										placeholder="Masukan Password">
								</div>
								<div class="form-group">
									<label>Telp</label>
									<input type="number" name="telp" class="form-control"
										placeholder="Masukan Nomor telepon">
								</div>
							</div>
							<div class="card-footer">
								<div class="form-group">
									<button name="simpan" type="submit" class="form-control btn btn-secondary "
										role="button" aria-disabled="true">Daftar</button>
								</div>
								<div class="form-group mb-0">
									<span class="text text-primary">Sudah Verifikasi?</span>Silahkan Masuk <a
										href="index.php">disini</a>
								</div>
							</div>

						</form>
					</div>

				</div>
			</div>
		</div>
	</section>
</div>


<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="../../assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../../assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="../../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="../../assets/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="../../assets/js/setting-demo.js"></script>
<script src="../../assets/js/demo.js"></script>
<script>
	Circles.create({
		id: 'circles-1',
		radius: 45,
		value: 60,
		maxValue: 100,
		width: 7,
		text: 5,
		colors: ['#f1f1f1', '#FF9E27'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	})

	Circles.create({
		id: 'circles-2',
		radius: 45,
		value: 70,
		maxValue: 100,
		width: 7,
		text: 36,
		colors: ['#f1f1f1', '#2BB930'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	})

	Circles.create({
		id: 'circles-3',
		radius: 45,
		value: 40,
		maxValue: 100,
		width: 7,
		text: 12,
		colors: ['#f1f1f1', '#F25961'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	})

	var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

	var mytotalIncomeChart = new Chart(totalIncomeChart, {
		type: 'bar',
		data: {
			labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
			datasets: [{
				label: "Total Income",
				backgroundColor: '#ff9e27',
				borderColor: 'rgb(23, 125, 255)',
				data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false,
			},
			scales: {
				yAxes: [{
					ticks: {
						display: false //this will remove only the label
					},
					gridLines: {
						drawBorder: false,
						display: false
					}
				}],
				xAxes: [{
					gridLines: {
						drawBorder: false,
						display: false
					}
				}]
			},
		}
	});

	$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#ffa534',
		fillColor: 'rgba(255, 165, 52, .14)'
	});
</script>
</body>

</html>