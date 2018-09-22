<?php
include '../include/header.php';
?>

<?php 
// notif pesan
if (!empty($_SESSION['pesan'])) { ?>
	<div class="alert alert-success">
		<i class="fa fa-check"></i> <?php echo $_SESSION['pesan']; ?>
	</div>
	<br>
	<?php 
	$_SESSION['pesan'] = '';
} 

// notif pesan ewrror
if (!empty($_SESSION['error'])) { ?>
	<div class="alert alert-danger">
		<i class="fa fa-check"></i> <?php echo $_SESSION['error']; ?>
	</div>
	<br>
	<?php 
	$_SESSION['error'] = '';
} 
?>

<?php 
if($_SESSION['akses_level'] == "admin" | $_SESSION['akses_level'] == "gudang" | $_SESSION['akses_level'] == "cutting" | $_SESSION['akses_level'] == "supervisor"){

$barang = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_total FROM stok"));
$barang_masuk = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) as barang_masuk FROM stok"));
$barang_keluar = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_keluar) as barang_keluar FROM stok"));
$pegawai = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user"));

?>

<script type="text/javascript" src="../assets/js/Chart.min.js"></script>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-archive fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 50px"><?php echo $barang['sisa_total'] ?></span>
                    <div><b>Total Barang</b></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-arrow-circle-o-down fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 50px"><?php echo $barang_masuk['barang_masuk'] ?></span>
                    <div>Barang masuk</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-arrow-circle-o-up fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 50px"><?php echo $barang_keluar['barang_keluar'] ?></span>
                    <div>Barang Keluar</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 50px"><?php echo $pegawai ?></span>
                    <div>Pegawai</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            Barang
        </div>
        <div class="panel-body">
            <canvas id="myChart" height="200px"></canvas>
        </div>
    </div>
</div>

<div class="col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            Barang
        </div>
        <div class="panel-body">
            <canvas id="myChart2" height="200px"></canvas>
        </div>
    </div>
</div>


<?php  
$b1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_barang, stok.* FROM stok WHERE barang = '1' "));
$b2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_barang, stok.* FROM stok WHERE barang = '2' "));
$b3 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_barang, stok.* FROM stok WHERE barang = '3' "));
$b4 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(qty_masuk) - SUM(qty_keluar) as sisa_barang, stok.* FROM stok WHERE barang = '4' "));
?>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["sae-a", "sae-u", "Jersey panny", "awl"],
            datasets: [{
                label: '# Jumlah Barang',
                data: [<?php echo $b1['sisa_barang'] ?>, <?php echo $b2['sisa_barang'] ?>, <?php echo $b3['sisa_barang'] ?>, <?php echo $b4['sisa_barang'] ?>],
                backgroundColor: [
                'rgb(255, 128, 170)',
                'rgb(0, 255, 153)',
                'rgb(0, 191, 255)',
                'rgb(255, 128, 0)'
                ]
            }]
        },

    });
</script>

<script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["sae-a", "sae-u", "Jersey panny", "awl"],
            datasets: [{
                label: '# Jumlah Barang',
                data: [<?php echo $b1['sisa_barang'] ?>, <?php echo $b2['sisa_barang'] ?>, <?php echo $b3['sisa_barang'] ?>, <?php echo $b4['sisa_barang'] ?>],
                backgroundColor: [
                'rgb(255, 128, 170)',
                'rgb(0, 255, 153)',
                'rgb(0, 191, 255)',
                'rgb(255, 128, 0)'
                ]
            }]
        },

    });
</script>

<?php } ?>


<?php  
include '../include/footer.php';
?>