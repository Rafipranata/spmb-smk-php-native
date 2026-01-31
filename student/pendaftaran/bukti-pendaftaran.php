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

function formatGajiRange($gaji) {

    // kasus <500000 atau >5000000
    if (str_contains($gaji, '<')) {
        return '< Rp 500.000';
    }

    if (str_contains($gaji, '>')) {
        return '> Rp 5.000.000';
    }

    // kasus range 3000000-4000000
    if (str_contains($gaji, '-')) {
        [$min, $max] = explode('-', $gaji);
        return 'Rp ' . number_format($min, 0, ',', '.') .
               ' – Rp ' . number_format($max, 0, ',', '.');
    }

    // fallback kalau angka tunggal
    return 'Rp ' . number_format((int)$gaji, 0, ',', '.');
}
?>


<h3 align="center">BUKTI PENDAFTARAN</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td width="30%">Kode Pendaftaran</td>
        <td><?= htmlspecialchars($data['kode_pendaftaran']) ?></td>
    </tr>
    <tr>
        <td width="30%">Nama</td>
        <td><?= htmlspecialchars($data['nama']) ?></td>
    </tr>
    <tr>
        <td width="30%">Tanggal Lahir</td>
        <td><?= htmlspecialchars($data['tgl_lahir']) ?></td>
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
        <td>Jurusan Pertama</td>
        <td><?= htmlspecialchars($data['jurusan_pertama']) ?></td>
    </tr>
    <tr>
        <td>Jurusan Kedua</td>
        <td><?= htmlspecialchars($data['jurusan_kedua']) ?></td>
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
    <tr>
        <td>Alamat Siswa</td>
        <td> <?= htmlspecialchars($data['alamat_siswa']) ?> </td>
    </tr>
</table>

<h3 align="center">Data Orang Tua Siswa</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td width="30%">Nama Ayah</td>
        <td><?= htmlspecialchars($data['nama_ayah']) ?></td>
    </tr>
    <tr>
        <td width="30%">Nama Ibu</td>
        <td><?= htmlspecialchars($data['nama_ibu']) ?></td>
    </tr>
    <tr>
        <td>Pekerjaan Ayah</td>
        <td><?= htmlspecialchars($data['pekerjaan_ayah']) ?></td>
    </tr>
    <tr>
        <td>Pekerjaan Ibu</td>
        <td><?= htmlspecialchars($data['pekerjaan_ibu']) ?></td>
    </tr>
    <tr>
        <td>Gaji Orang Tua</td>
        <td><?= formatGajiRange($data['gaji_ortu']) ?>
    </td>

</table>

<?php
// 🔼 AMBIL HTML
$html = ob_get_clean();

// TULIS KE PDF
$mpdf->WriteHTML($html);
$mpdf->Output('bukti-pendaftaran.pdf', 'I'); // tampil di browser

