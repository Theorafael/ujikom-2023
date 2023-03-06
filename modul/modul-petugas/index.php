<!DOCTYPE html>
<html lang="en">
<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
	@header('location:../modul-auth/index.php');
}
// CRUD


if (isset($_POST['hapus'])) {
	$idLama = $_POST['idLama'];
	$q = mysqli_query($con, "DELETE FROM `petugas` WHERE id_petugas = '$idLama'");
}
if (isset($_POST['update'])) {
	$idLama = $_POST['idLama'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$telp = $_POST['telp'];
	$password = md5($_POST['password']);
	if ($password == '') {
		$q = mysqli_query($con, "UPDATE `petugas` SET id_petugas = '$idLama', nama _petugas= '$nama', username = '$username', telp = '$telp' WHERE id_petugas = '$idLama'");
	} else {
		$q = mysqli_query($con, "UPDATE `petugas` SET `password` = '$password', id_petugas = '$idLama', nama_petugas = '$nama', username = '$username', telp = '$telp' WHERE id_petugas = '$idLama'");
	}
}

?>
<!-- header -->
<?php include('../../assets/header.php') ?>

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
														New user registered
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
								<h2 class="text-white pb-2 fw-bold">Selamat Datang petugas</strong></h2>
								<h5 class="text-white op-7 mb-2">Selamat pagi <?= $_SESSION['username'] ?></h5>
								<!-- end -->
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--z">
						<div class="col-md-11">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Data Petugas</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-6">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div class="table-responsive">
												<table id="dataTablesNya" class="display table table-striped table-hover">
													<thead>
														<tr>
															<th>NO</th>
															<th>ID Petugas</th>
															<th>Nama Petugas</th>
															<th>Username</th>
															<th>Telp</th>
															<th>Update</th>
															<th>Hapus</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$q = mysqli_query($con, "SELECT * FROM `petugas`");
														$no = 1;
														while ($d = mysqli_fetch_object($q)) { ?>
															<tr>
																<td><?= $no ?></td>
																<td><?= $d->id_petugas ?></td>
																<td><?= $d->nama_petugas ?></td>
																<td><?= $d->username ?></td>
																<td><?= $d->telp ?></td>
																<td><button data-toggle="modal" data-target="#modal-xl<?= $d->id_petugas ?>" class="btn btn-success"><i class="fa fa-pen"></i></button></td>
																<td>
																	<form action="" method="post"><input type="hidden" name="idLama" value="<?= $d->id_petugas ?>"><button name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
																</td>
															</tr>

															<!-- modal start -->
															<div class="modal fade" id="modal-xl<?= $d->id_petugas ?>">
																<div class="modal-dialog modal-xl<?= $d->id_petugas ?>">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title">Edit Data</h4>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<form action="" method="post">
																			<input type="hidden" name="idLama" value="<?= $d->id_petugas ?>">
																			<div class="modal-body">
																				<div class="form-group"><label for="nama">Nama</label>
																					<input class="form-control" type="text" name="nama" value="<?= $d->nama_petugas ?>">
																				</div>
																				<div class="form-group"><label for="username">Username</label>
																					<input class="form-control" type="text" name="username" value="<?= $d->username ?>">
																				</div>
																				<div class="form-group"><label for="username">New Password</label>
																					<input class="form-control" type="password" name="password" value="">
																				</div>
																				<div class="form-group"><label for="username">Telepon</label>
																					<input class="form-control" type="number" name="telp" value="<?= $d->telp ?>">
																				</div>
																			</div>
																			<div class="modal-footer justify-content-between">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				<button type="submit" name="update" class="btn btn-primary">Save changes</button>
																			</div>
																	</div>
																	</form>
																	<!-- /.modal-content -->
																</div>
																<!-- /.modal-dialog -->
															</div>
															<!-- modal - ends -->

														<?php $no++;
														}
														?>
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