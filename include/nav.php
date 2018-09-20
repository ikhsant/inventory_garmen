<?php

/**
 * @Author: Ikhsan
 * @Date:   2018-09-19 22:11:29
 * @Last Modified by:   Ikhsan
 * @Last Modified time: 2018-09-21 06:19:13
 */
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="padding: 4px!important">
      <img src="../uploads/logo/<?php echo $setting['logo']; ?>" height="100%">
    </a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php"><b><?php echo $setting['nama_website']; ?></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><i class="fa fa-star"></i> Dashboard</a></li>

        <?php if($_SESSION['akses_level'] == "admin"){ ?>
        <li><a href="stok.php"><i class="fa fa-exchange"></i> Stok</a></li>
        <li><a href="barang.php"><i class="fa fa-archive"></i> Barang</a></li>
        <li><a href="style.php"><i class="fa fa-paint-brush"></i> Style</a></li>
        <li><a href="laporan.php"><i class="fa fa-print"></i> Laporan</a></li>
        <li><a href="user.php"><i class="fa fa-users"></i> Pegawai</a></li>
        <?php  } ?>

        <?php if($_SESSION['akses_level'] == "cutting"){ ?>
          <li><a href="stok.php"><i class="fa fa-exchange"></i> Stok</a></li>
        <li><a href="barang.php"><i class="fa fa-archive"></i> Barang</a></li>
        <li><a href="style.php"><i class="fa fa-paint-brush"></i> Style</a></li>
        <?php  } ?>

        <?php if($_SESSION['akses_level'] == "gudang"){ ?>
          <li><a href="stok.php"><i class="fa fa-exchange"></i> Stok</a></li>
        <li><a href="barang.php"><i class="fa fa-archive"></i> Barang</a></li>
        <li><a href="style.php"><i class="fa fa-paint-brush"></i> Style</a></li>
        <?php  } ?>

        <?php if($_SESSION['akses_level'] == "supervisor"){ ?>
          <li><a href="laporan.php"><i class="fa fa-print"></i> Laporan</a></li>
        <li><a href="user.php"><i class="fa fa-users"></i> Pegawai</a></li>
        <?php } ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nama'] ?> <span class="label label-info"><?php echo $_SESSION['akses_level'] ?></span></a></li>
        <?php if($_SESSION['akses_level'] == "admin" | $_SESSION['akses_level'] == "supervisor"){ ?>
        <li><a href="setting.php"><span class="glyphicon glyphicon-cog"></span> Setting</a></li>
        <?php  } ?>
        <li><a href="logout.php" onclick="return confirm('Yakin Keluar?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">