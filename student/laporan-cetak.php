<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mpdf\Mpdf;

$mpdf = new Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4'
]);

$html = '
<style>
    #judul{
        text-align:center;
        font-size:14pt;
        font-weight:bold;
        margin-bottom:20px;
    }
    table{
        border-collapse:collapse;
        width:100%;
    }
    th{
        padding:5px;
        text-align:center;
        background:#eee;
    }
    td{
        padding:5px;
    }
</style>

<div id="judul">LAPORAN TRANSAKSI PENJUALAN</div>

<table border="1">
<tr>
    <th width="50">No</th>
    <th width="100">Tanggal</th>
    <th width="200">Nama Barang</th>
    <th width="50">Jumlah</th>
    <th width="100">Harga</th>
    <th width="100">Total</th>
</tr>
<tr>
    <td align="center">1</td>
    <td align="center">2021-11-01</td>
    <td>LCD Monitor</td>
    <td align="center">2</td>
    <td align="right">2.500.000</td>
    <td align="right">5.000.000</td>
</tr>
<tr>
    <td align="center">2</td>
    <td align="center">2021-11-02</td>
    <td>Mouse</td>
    <td align="center">3</td>
    <td align="right">150.000</td>
    <td align="right">450.000</td>
</tr>
<tr>
    <td align="center">3</td>
    <td align="center">2021-11-05</td>
    <td>Keyboard</td>
    <td align="center">1</td>
    <td align="right">175.000</td>
    <td align="right">175.000</td>
</tr>
</table>
';

$mpdf->WriteHTML($html);
$mpdf->Output('laporan-penjualan.pdf', 'I'); // I = tampil di browser
