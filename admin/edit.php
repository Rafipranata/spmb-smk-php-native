<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<?php
session_start();

include __DIR__ . '/../DB/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$student_id = $_GET['id'] ?? null;
if (!$student_id) {
    header("Location: verifikasi.php");
    exit;
}
$query = "SELECT * FROM pendaftaran WHERE id = '$student_id'";
$result = mysqli_query($koneksi, $query);
$student = mysqli_fetch_assoc($result);
if (!$student) {
    header("Location: verifikasi.php");
    exit;
}


?>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard | SPMB - SMK PGRI 2 TAMAN</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->


    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!-- Page CSS -->


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
<style>
  .text-justify {
    text-align: justify;
    text-justify: inter-word;
  }
</style>


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include 'sidebar.php'; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include 'navbar.php'; ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Verifikasi Pendaftaran</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                                      <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Isi Form Pendaftaran</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="#">
                            <div class="mb-3">
                                <label>Nama Siswa <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($student['nama']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Asal Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="asal_sekolah" class="form-control" value="<?= htmlspecialchars($student['asal_sekolah']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>NIS <span class="text-danger">*</span></label>
                                <input type="text" name="nis" class="form-control" value="<?= htmlspecialchars($student['nis']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" class="form-control" value="<?= htmlspecialchars($student['nik']) ?>" required pattern="\d{16}" maxlength="16" title="NIK harus terdiri dari 16 digit angka">
                            </div>

                            <div class="mb-3">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($student['email']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>No Telpon <span class="text-danger">*</span></label>
                                <input type="text" name="no_telp" class="form-control" value="<?= htmlspecialchars($student['no_telp']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?= htmlspecialchars($student['tgl_lahir']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="Laki-laki" <?= ($student['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= ($student['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Agama <span class="text-danger">*</span></label>
                                <select name="agama" class="form-select" required>
                                    <option value="Islam" <?= ($student['agama'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                    <option value="Kristen" <?= ($student['agama'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                                    <option value="Katolik" <?= ($student['agama'] == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                                    <option value="Hindu" <?= ($student['agama'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                    <option value="Budha" <?= ($student['agama'] == 'Budha') ? 'selected' : '' ?>>Budha</option>
                                    <option value="Konghucu" <?= ($student['agama'] == 'Konghucu') ? 'selected' : '' ?>>Konghucu</option>
                                </select>
                            </div>

                            <div class="row">
                                <!-- Kolom 1: Status Verifikasi -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Verifikasi Pendaftaran <span class="text-danger">*</span></label>
                                        <select name="verifikasi_status" class="form-select" required>
                                            <option value="Terverifikasi" <?= ($student['status'] == 'Terverifikasi') ? 'selected' : '' ?>>Terverifikasi</option>
                                            <option value="Pending" <?= ($student['status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Kolom 2: Verifikasi Jurusan Pertama -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Verifikasi Jurusan <span class="text-danger">*</span></label>
                                        <select name="verifikasi_jurusan" class="form-select" required>
                                            <option value="PPLG" <?= ($student['jurusan_pertama'] == 'PPLG') ? 'selected' : '' ?>>PPLG</option>
                                            <option value="TJKT" <?= ($student['jurusan_pertama'] == 'TJKT') ? 'selected' : '' ?>>TJKT</option>
                                            <option value="DKV" <?= ($student['jurusan_pertama'] == 'DKV') ? 'selected' : '' ?>>DKV</option>
                                            <option value="AKL" <?= ($student['jurusan_pertama'] == 'AKL') ? 'selected' : '' ?>>AKL</option>
                                            <option value="MPLB" <?= ($student['jurusan_pertama'] == 'MPLB') ? 'selected' : '' ?>>MPLB</option>
                                            <option value="Tata Kecantikan" <?= ($student['jurusan_pertama'] == 'Tata Kecantikan') ? 'selected' : '' ?>>Tata Kecantikan</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Kolom 3: Verifikasi Jurusan yang Dipilih -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Jurusan yang Dipilih</label>
                                        <input type="text" class="form-control" value="<?= $student['jurusan_pertama'] ?> / <?= $student['jurusan_kedua'] ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Alamat Siswa <span class="text-danger">*</span></label>
                                <textarea name="alamat_siswa" class="form-control" rows="3" required><?= htmlspecialchars($student['alamat_siswa']) ?></textarea>
                            </div>

                            <button type="submit" name="simpan" class="btn btn-primary">
                                Simpan
                            </button>
                        </form>
                            <?php
                            // Cek apakah form disubmit
                            if (isset($_POST['simpan'])) {
                                // Mengambil data dari form
                                $verifikasi_status = $_POST['verifikasi_status'];
                                $verifikasi_jurusan = $_POST['verifikasi_jurusan'];
                                

                                // Update data ke database
                                $query = "UPDATE pendaftaran SET status = '$verifikasi_status', verifikasi_jurusan = '$verifikasi_jurusan' WHERE id = '$student_id'";
                                $result = mysqli_query($koneksi, $query);
                                if ($result) {
                                echo '
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    Swal.fire({
                                        icon: "success",
                                        title: "Terverifikasi",
                                        text: "Data pendaftaran berhasil terverifikasi!",
                                        timer: 2000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        window.location.href = "verifikasi.php";
                                    });
                                </script>
                                ';
                            } else {
                                // Jika gagal, tampilkan error dengan SweetAlert
                                $error = mysqli_error($koneksi);
                                echo '
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    Swal.fire({
                                        icon: "error",
                                        title: "Gagal",
                                        text: "'.$error.'",
                                        showConfirmButton: true
                                    });
                                </script>
                                ';
                            }
                            };

                            ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made by
                  <a
                    href="https://smkpgri2taman.sch.id/"
                    target="_blank"
                    class="footer-link fw-bolder">SMK PGRI 2 TAMAN</a>
                </div>
              </div>
            </footer>
                        <!-- / Footer -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
     
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#dataTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 20, 50]
            });

            // Custom search function for Kode Pendaftaran
            $('#searchKode').on('keyup', function() {
                table.column(0).search(this.value).draw();
            });
        });

    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
