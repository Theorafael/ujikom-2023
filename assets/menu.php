<div class="sidebar sidebar-style-2"  data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../../assets/img/arashmil.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <!-- profile nav -->
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                        <?= $_SESSION['username'] ?>
                            <span class="user-level"><?= $_SESSION['level'] ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-pengaduan">
                                    <span class="link-collapse">Pengaduan</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-auth/logout.php">
                                    <span class="link-collapse">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                </li>
                <li class="nav-item">
                    <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-profile/">
                            <i class="fas fa-users"></i>
                            <span class="sub-item">Profile</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-pengaduan/">
                            <i class="fas fa-plus"></i>
                            <span class="sub-item">Pengaduan</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-tanggapan/">
                            <i class="fas fa-plus"></i>
                            <span class="sub-item">Tanggapan</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-auth/logout.php">
                            <i class="fas fa-unlock-alt"></i>
                            <span class="sub-item">Logout</span>
                        </a>
                    <?php } ?>

                    <?php if ($_SESSION['level'] == 'admin') { ?>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-profile/">
                            <i class="fas fa-users"></i>
                            <span class="sub-item">Profile</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-pengaduan/">
                            <i class="fas fa-plus"></i>
                            <span class="sub-item">Pengaduan</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-tanggapan/">
                            <i class="fas fa-plus"></i>
                            <span class="sub-item">Tanggapan</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-petugas/">
                            <i class="fas fa-info-circle"></i>
                            <span class="sub-item">Petugas</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-masyarakat/">
                            <i class="fas fa-info-circle"></i>
                            <span class="sub-item">Masyarakat</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-auth/logout.php">
                            <i class="fas fa-unlock-alt"></i>
                            <span class="sub-item">Logout</span>
                        </a>
                    <?php } ?>


                    <?php if ($_SESSION['level'] == 'petugas') { ?>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-profile/">
                            <i class="fas fa-users"></i>
                            <span class="sub-item">Profile</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-pengaduan/">
                            <i class="fas fa-plus"></i>
                            <span class="sub-item">Pengaduan</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-tanggapan/">
                            <i class="fas fa-plus"></i>
                            <span class="sub-item">Tanggapan</span>
                        </a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_theo/ujikom_theo/modul/modul-auth/logout.php">
                            <i class="fas fa-unlock-alt"></i>
                            <span class="sub-item">Logout</span>
                        </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->