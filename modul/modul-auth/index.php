<?php
include('../../config/database.php');
if (isset($_POST['cek'])) {
  $pilihan = $_POST['pilihan']; //masyarakat atau petugas
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  if ($pilihan == 'masyarakat') {
    $q = mysqli_query($con, "SELECT * FROM `masyarakat` WHERE username = '$username' AND password = '$password' AND verifikasi = 1");
    $r = mysqli_num_rows($q);
    if ($r == 1) {
      $d = mysqli_fetch_object($q);
      @session_start();
      $_SESSION['nik'] = $d->nik;
      $_SESSION['username'] = $d->username;
      $_SESSION['nama'] = $d->nama;
      $_SESSION['telp'] = $d->telp;
      $_SESSION['level'] = 'masyarakat';
      @header('location:../../modul/modul-profile/');
    } else {
      echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-black">Data salah atau belum di verifikasi</strong></div>';
    }
  } else if ($pilihan == 'petugas') {
    $q = mysqli_query($con, "SELECT * FROM `petugas` WHERE username = '$username' AND password = '$password'");
    $r = mysqli_num_rows($q);
    if ($r == 1) {
      $d = mysqli_fetch_object($q);
      @session_start();
      $_SESSION['username'] = $d->username;
      $_SESSION['nama_petugas'] = $d->nama_petugas;
      $_SESSION['level'] = $d->level;
      $_SESSION['id_petugas'] = $d->id_petugas;
      $_SESSION['telp'] = $d->telp;
      if ($_SESSION['level'] == 'admin') {
        @header('location:../../modul/modul-profile/');
      }
      if ($_SESSION['level'] == 'petugas') {
        @header('location:../../modul/modul-profile/');
      }

    }else {
      echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-black">Data salah atau belum di verifikasi</strong></div>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Pengaduan Masyarakat</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
</head>

<body data-background-color="dark">

<div class="wrapper">
       
    <section class="content " >
        <div class="container-fluid">
            <div class="row justify-content-md-center ">
                <div class="col-md-3" style="margin-top:5%">
                    
                    <div class="card " style="background-color : rgb(186, 190, 195)">
                   
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                                </div>
                                <label for="pilihan">LOGIN SEBAGAI</label>
                                <div class="form-group">
                                    <select class="form-control" name="pilihan">
                                        <option value="masyarakat">masyarakat</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <span class="text text-primary">Belum terverifikasi?</span>Coba daftar <a href="registrasi.php">disini</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                <button name="cek" type="submit" class="form-control btn btn-secondary " role="button" aria-disabled="true">Masuk</button>
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
        id:'circles-1',
        radius:45,
        value:60,
        maxValue:100,
        width:7,
        text: 5,
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-2',
        radius:45,
        value:70,
        maxValue:100,
        width:7,
        text: 36,
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-3',
        radius:45,
        value:40,
        maxValue:100,
        width:7,
        text: 12,
        colors:['#f1f1f1', '#F25961'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

    var mytotalIncomeChart = new Chart(totalIncomeChart, {
        type: 'bar',
        data: {
            labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
            datasets : [{
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
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }],
                xAxes : [ {
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }]
            },
        }
    });

    $('#lineChart').sparkline([105,103,123,100,95,105,115], {
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