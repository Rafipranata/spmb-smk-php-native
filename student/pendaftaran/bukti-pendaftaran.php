<?php
session_start();

include dirname(__DIR__, 2) . '/DB/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../sign-in.php");
    exit;
}

$id_users = (int) $_SESSION['user_id'];
$query = "SELECT * FROM pendaftaran WHERE id_users = '$id_users'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);


include dirname(__DIR__, 2) . '/vendor/autoload.php';

use Mpdf\Mpdf;

$mpdf = new Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4'
]);

ob_start();
?>
<h3 align="center">BUKTI PENDAFTARAN</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td width="30%">Kode_pendaftaran</td>
        <td><?= htmlspecialchars($data['kode_pendaftaran']) ?></td>
    </tr>
    <tr>
        <td width="30%">Nama</td>
        <td><?= htmlspecialchars($data['nama']) ?></td>
    </tr>
    <tr>
        <td>Asal Sekolah</td>
        <td><?= htmlspecialchars($data['asal_sekolah']) ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td><?= htmlspecialchars($data['nik']) ?></td>
    </tr>
    <tr>
        <td>NISN</td>
        <td><?= htmlspecialchars($data['nis']) ?></td>
    </tr>
    <tr>
        <td>agama</td>
        <td><?= htmlspecialchars($data['agama']) ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?= htmlspecialchars($data['jenis_kelamin']) ?></td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td><?= htmlspecialchars($data['jurusan_pertama']) ?>, <?= htmlspecialchars($data['jurusan_kedua']) ?></td>
    </tr>
    <tr>
        <td>Tanggal Daftar</td>
        <td><?= date('d-m-Y', strtotime($data['created_at'])) ?></td>
    </tr>
    <tr>
        <td>Status Pendaftaran</td>
        <td><?= htmlspecialchars($data['status']) ?></td>
    </tr>
    <tr>
        <td>Verifikasi Jurusan</td>
        <td><?= htmlspecialchars($data['verifikasi_jurusan']) ?></td>
    </tr>
</table>

<?php
// 🔼 AMBIL HTML
$html = ob_get_clean();

// TULIS KE PDF
$mpdf->WriteHTML($html);
$mpdf->Output('bukti-pendaftaran.pdf', 'I'); // tampil di browser

