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

include dirname(__DIR__, 2) . '/DB/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../sign-in.php");
    exit;
}

$id_siswa = $_GET['id_siswa'];

var_dump($id_siswa);
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

    <title>buat pendaftaran | SPMB - SMK PGRI 2 TAMAN</title>

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
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!-- Page CSS -->


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
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


        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include '../navbar.php'; ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Pendaftaran</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Isi Form Data Orang tua</h5>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="#">
                        <div class="mb-3">
                            <label>Nama Bapak <span class="text-danger">*</span></label>
                            <input type="text" name="nama_ayah" class="form-control"
                                 required>
                        </div>

                        

                          <input type="hidden" name="id" value="<?= htmlspecialchars($id_siswa) ?>">
                        <div class="mb-3">
                            <label>Nama Ibu <span class="text-danger">*</span></label>
                            <input type="text" name="nama_ibu" class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Pekerjaan Bapak <span class="text-danger">*</span></label>
                            <select name="pekerjaan_ayah" class="form-control" required>
                                <option value="">-- Pilih Pekerjaan Ayah --</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                <option value="Petani">Petani</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Pedagang">Pedagang</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="PNS">PNS</option>
                                <option value="TNI">TNI</option>
                                <option value="Polri">Polri</option>
                                <option value="Guru/Dosen">Guru / Dosen</option>
                                <option value="Sopir">Sopir</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Pekerjaan Ibu <span class="text-danger">*</span></label>
                                <select name="pekerjaan_ibu" class="form-control" required>
                                    <option value="">-- Pilih Pekerjaan Ibu --</option>
                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Guru/Dosen">Guru / Dosen</option>
                                    <option value="Perawat/Bidan">Perawat / Bidan</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                        </div>

                        <div class="mb-3">
                            <label>Gaji Kedua Orang Tua <span class="text-danger">*</span></label>
                             <select name="gaji_ortu" class="form-control" required>
                                <option value="">-- Pilih Rentang Gaji --</option>
                                <option value="<500000">&lt; Rp500.000</option>
                                <option value="500000-1000000">Rp500.000 – Rp1.000.000</option>
                                <option value="1000000-2000000">Rp1.000.001 – Rp2.000.000</option>
                                <option value="2000000-3000000">Rp2.000.001 – Rp3.000.000</option>
                                <option value="3000000-4000000">Rp3.000.001 – Rp4.000.000</option>
                                <option value="4000000-5000000">Rp4.000.001 – Rp5.000.000</option>
                                <option value=">5000000">&gt; Rp5.000.000</option>
                            </select>
                        </div>

                        <button type="submit" name="simpan" class="btn btn-primary">
                            Simpan
                        </button>
                    </form>



                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <?php
            if (isset($_POST['simpan'])) {

                $student_id = intval($_POST['id']);
                $nama_ayah       = mysqli_real_escape_string($koneksi, $_POST['nama_ayah']);
                $nama_ibu        = mysqli_real_escape_string($koneksi, $_POST['nama_ibu']);
                $pekerjaan_ayah  = mysqli_real_escape_string($koneksi, $_POST['pekerjaan_ayah']);
                $pekerjaan_ibu   = mysqli_real_escape_string($koneksi, $_POST['pekerjaan_ibu']);
                $gaji_ortu       = mysqli_real_escape_string($koneksi, $_POST['gaji_ortu']);


                $query = "
                    UPDATE pendaftaran 
                    SET 
                        nama_ayah = '$nama_ayah',
                        nama_ibu = '$nama_ibu',
                        pekerjaan_ayah = '$pekerjaan_ayah',
                        pekerjaan_ibu = '$pekerjaan_ibu',
                        gaji_ortu = '$gaji_ortu'
                    WHERE id = $student_id
                ";

                if (mysqli_query($koneksi, $query)) {
                    echo '
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: "Data orang tua berhasil diperbarui!",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "list-pendaftaran.php";
                        });
                    </script>
                    ';
                } else {
                    echo '
                    <script>
                        alert("Gagal memperbarui data orang tua!");
                    </script>
                    ';
                }
            }
            ?>

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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
