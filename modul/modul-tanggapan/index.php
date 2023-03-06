<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
	@header('location:../modul-auth/index.php');
} else {
	if ($_SESSION['level'] == 'masyarakat') {
		$nik = $_SESSION['nik'];
	} else {
		$id_petugas = $_SESSION['id_petugas'];
	}
}
// tambah tanggapan
if (isset($_POST['tambah_tanggapan'])) {
	$id_pengaduan = $_POST['id_pengaduan'];
	$tgl_tanggapan = $_POST['tgl_tanggapan'];
	$id_petugas = $_POST['id_petugas'];
	$tanggapan = $_POST['tanggapan'];
	$q = "INSERT INTO `tanggapan` (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('','$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')";
	$r = mysqli_query($con, $q);
}
// hapus tanggapan
if (isset($_POST['hapusTanggapan'])) {
	$id_tanggapan = $_POST['id_tanggapan'];
	mysqli_query($con, "DELETE FROM `tanggapan` WHERE id_tanggapan = '$id_tanggapan'");
}
// update tanggapan
if (isset($_POST['ubahTanggapan'])) {
	$id_tanggapan =  $_POST['id_tanggapan'];
	$tgl_tanggapan = $_POST['tgl_tanggapan'];
	$tanggapan = $_POST['tanggapan'];
	mysqli_query($con, "UPDATE `tanggapan` SET tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan' WHERE `id_tanggapan` = '$id_tanggapan'");
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- header -->
<?php include('../../assets/header.php') ?>

</head>

<body data-background-color="dark">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="index.html" class="logo">
					<img src="../../assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														ini tanggapan
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-img">
													<img src="../../assets/img/arashmil.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../../assets/img/arashmil.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../assets/img/arashmil.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $_SESSION['username'] ?></h4>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-profile">My Profile</a>
										<a class="dropdown-item" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-pengaduan">Pengaduan</a>
										<a class="dropdown-item" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-auth/logout.php">Log Out</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<?php include('../../assets/menu.php'); ?>
		<!-- End profile nav -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<!-- nav ke 2 -->
								<h2 class="text-white pb-2 fw-bold">Selamat Datang di Modul tanggapan</h2>
								<h5 class="text-white op-7 mb-2">Selamat pagi</h5>
								<!-- end -->
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Tanggapan</h4>
								<?php if ($_SESSION['level'] == 'petugas') { ?>
									<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
										<i class="fa fa-plus"></i>
										Add Tanggapan
									</button>
								<?php } ?>

							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header no-bd">
											<h5 class="modal-title">
												<span class="fw-mediumbold">
													Add</span>
												<span class="fw-light">
													Tanggapan
												</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="" method="post">
												<div class="row">
													<div class="col-sm-12">
														<input class="form-control" name="id_tanggapan" type="hidden">
														<div class="form-group form-group-default">
															<label for="id_pengaduan"> Beri Tanggapan</label>
															<textarea class="form-control" name="tanggapan" id="" cols="30" rows="10"></textarea>
														</div>

														<div class="form-group form-group-default">
															<label for="id_pengaduan"> Pilih Id Pengaduan</label>
															<select name="id_pengaduan" class="form-control">
																<?php
																$q = "SELECT * FROM pengaduan JOIN `masyarakat` WHERE pengaduan.nik = masyarakat.nik";
																$r = mysqli_query($con, $q);
																while ($d = mysqli_fetch_object($r)) { ?>
																	<option value="<?= $d->id_pengaduan ?>"><?= $d->id_pengaduan . '|' . $d->nik . '|' . $d->nama ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="col-md-6 pr-0">
														<div class="form-group form-group-default">
															<label>Tanggal</label>
															<input class="form-control" type="date" name="tgl_tanggapan">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group form-group-default">
															<label>ID Petugas</label>
															<input name="id_petugas" type="text" class="form-control" value="<?= $id_petugas ?>" readonly>
														</div>
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button name="tambah_tanggapan" type="submit" id="addRowButton" class="btn btn-primary">Tambahkan</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</form>
										</div>

									</div>
								</div>
							</div>

							<div class="table-responsive">
								<table id="dataTablesNya" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Id Pengaduan</th>
											<th>tanggal Tanggapan</th>
											<th>Isi Tanggapan</th>
											<th>Petugas</th>
											<?php if ($_SESSION['level'] == 'petugas') { ?>

												<th>hapus</th>
											<?php } ?>
											<?php if ($_SESSION['level'] == 'petugas') { ?>

												<th>edit</th>
											<?php } ?>

										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$q = "SELECT * FROM `tanggapan` JOIN `petugas` JOIN `pengaduan`
                             WHERE tanggapan.id_petugas = petugas.id_petugas 
                             AND tanggapan.id_pengaduan = pengaduan.id_pengaduan";
										$r = mysqli_query($con, $q);
										while ($d = mysqli_fetch_object($r)) { ?>
											<tr>
												<td>
													<?= $no ?>
												</td>
												<td>
													<?= $d->id_pengaduan ?>
												</td>
												<td>
													<?= $d->tgl_tanggapan ?>
												</td>
												<td>
													<?= $d->tanggapan ?>
												</td>
												<td>
													<?= $d->nama_petugas ?>
												</td>
												<?php if ($_SESSION['level'] == 'petugas') { ?>
													<td>
														<form action="" method="post"><input type="hidden" name="id_tanggapan" value="<?= $d->id_tanggapan ?>"><button name="hapusTanggapan" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>&nbsp;hapus</button></form>
													</td>
												<?php } ?>
												<?php if ($_SESSION['level'] == 'petugas') { ?>
													<td>
														<button class="btn btn-success" data-toggle="modal" data-target="#modal-lg<?= $d->id_pengaduan ?>" class="btn btn-success"><i class="fa fa-pen"></i>&nbsp;Edit</button>
													</td>
												<?php } ?>
											</tr>
											<div class="modal fade" id="modal-lg<?= $d->id_pengaduan ?>">
												<div class="modal-dialog modal-lg<?= $d->id_pengaduan ?>">
													<div class="modal-content">
														<div class="modal-header">
															Edit Pengaduan
														</div>
														<form a ction="" method="post">
															<div class="modal-body">
																<input class="form-control" name="id_tanggapan" type="hidden" value="<?= $d->id_tanggapan ?>">
																<label for="id_pengaduan">ID Pengaduan</label><br>
																<select class="form-control" name="id_pengaduan">
																	<?php
																	$result = mysqli_query($con, "SELECT * FROM `pengaduan` JOIN `masyarakat` WHERE pengaduan.nik = masyarakat.nik");
																	while ($data = mysqli_fetch_object($result)) { ?>
																		<option value="<?= $data->id_pengaduan ?>" <?php if ($d->id_pengaduan == $data->id_pengaduan) {
																														echo 'selected';
																													} ?>><?= $data->id_pengaduan . '|' . $data->nik . '|' . $data->nama ?></option>
																	<?php } ?>
																</select><br>
																<label for="tgl_tanggapan">Tanggal Tanggapan</label>
																<input class="form-control" name="tgl_tanggapan" class="form-control" type="date" name="" value="<?= $d->tgl_tanggapan ?>">
																<label for="tanggapan">Tanggapan</label>
																<textarea class="form-control" name="tanggapan" id="" cols="30" rows="10"><?= $d->tanggapan ?></textarea>
																<br>
																<button name="ubahTanggapan" type="submit" class="btn btn-info">Update</button>
															</div>
														</form>
													</div>

												</div>
											</div>
										<?php $no++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!-- Custom template | don't include it in your project! -->
	<div class="custom-template">
		<div class="title">Settings</div>
		<div class="custom-content">
			<div class="switcher">
				<div class="switch-block">
					<h4>Logo Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
						<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
						<br />
						<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Navbar Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeTopBarColor" data-color="dark"></button>
						<button type="button" class="changeTopBarColor" data-color="blue"></button>
						<button type="button" class="changeTopBarColor" data-color="purple"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
						<button type="button" class="changeTopBarColor" data-color="green"></button>
						<button type="button" class="changeTopBarColor" data-color="orange"></button>
						<button type="button" class="changeTopBarColor" data-color="red"></button>
						<button type="button" class="changeTopBarColor" data-color="white"></button>
						<br />
						<button type="button" class="changeTopBarColor" data-color="dark2"></button>
						<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="purple2"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="green2"></button>
						<button type="button" class="changeTopBarColor" data-color="orange2"></button>
						<button type="button" class="changeTopBarColor" data-color="red2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Sidebar</h4>
					<div class="btnSwitch">
						<button type="button" class="selected changeSideBarColor" data-color="white"></button>
						<button type="button" class="changeSideBarColor" data-color="dark"></button>
						<button type="button" class="changeSideBarColor" data-color="dark2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Background</h4>
					<div class="btnSwitch">
						<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
						<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
						<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						<button type="button" class="changeBackgroundColor" data-color="dark"></button>
					</div>
				</div>
			</div>
		</div>
		<div class="custom-toggle">
			<i class="flaticon-settings"></i>
		</div>
	</div>
	<!-- End Custom template -->
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
	<?php include('../../assets/footer.php') ?>

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