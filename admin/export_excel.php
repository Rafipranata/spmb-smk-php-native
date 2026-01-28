<?php
session_start();
include __DIR__ . '/../DB/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

    $query = "SELECT * FROM pendaftaran WHERE status='Terverifikasi'";
    $result = mysqli_query($koneksi, $query);   
    

?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Murid Baru</title>
</head>
<body>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}
		.container {
			border: 1px solid #3c3c3c; 
			padding: 20px;
			width: 70%;
			margin: 0 auto;
		}
		h1 {
			text-align: center;
			border: 1px solid #3c3c3c; 
			padding: 10px;
			margin-bottom: 20px;
			background-color: #f4f4f4;
		}
		table {
			margin: 0 auto;
			border-collapse: collapse;
			width: 50%;
		}
        table tbody tr td{
            text-align: center;
        }
	</style>
 
	<?php
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Data_Murid_Baru.xls");
        header("Cache-Control: max-age=0");
	?>
 
<div class="container">
		<table border="1" >
            <thead>
                <tr>
                    <th colspan="15"><h1>Data Murid Baru SMK PGRI 02 TAMAN</h1></th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Kode Pendaftaran</th>
                    <th>Nama</th>
                    <th>Asal Sekolah</th>
                    <th>NIS</th>
                    <th>NIK</th>
                    <th>Status</th>
                    <th>Jurusan Terverifikasi</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Tanggal Lahir</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Gaji Orang Tua</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['kode_pendaftaran']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['asal_sekolah']; ?></td>
				<td><?php echo $row['nis']; ?></td>
				<td><?php echo $row['nik']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['verifikasi_jurusan']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['no_telp']; ?></td>
				<td><?php echo $row['tgl_lahir']; ?></td>
				<td><?php echo $row['nama_ayah']; ?></td>
				<td><?php echo $row['nama_ibu']; ?></td>
				<td><?php echo $row['pekerjaan_ayah']; ?></td>
				<td><?php echo $row['pekerjaan_ibu']; ?></td>
				<td><?php echo $row['gaji_ortu']; ?></td>
				<td><?php echo $row['jenis_kelamin']; ?></td>
			</tr>
            <?php } ?>
            </tbody>

		</table>
	</div>
</body>
</html>