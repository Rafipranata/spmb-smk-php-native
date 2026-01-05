<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
include __DIR__ . '/../DB/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="build/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="build/assets/img/favicon.png" />
    <title>Daftar | SPMB - SMK PGRI 2 TAMAN</title>
    <!-- Fonts and icons -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="build/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="build/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link
      href="build/assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5"
      rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script
      defer
      data-site="YOUR_DOMAIN_HERE"
      src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  </head>

  <body
    class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <!-- Navbar -->

    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
      <section class="min-h-screen mb-32">
        <div
          class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl"
          style="
            background-image: url('build/assets/img/curved-images/curved14.jpg');
          ">
          <span
            class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-60"></span>
          <div class="container z-10">
            <div class="flex flex-wrap justify-center -mx-3">
              <div
                class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                <h1 class="mt-12 mb-2 text-white">Selamat Datang!</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
            <div
              class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div
                class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div
                  class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                  <h5>Buat Akun PMB</h5>
                </div>
                <div class="flex-auto p-6">
                  <form method="POST" role="form text-left">
                    <div class="mb-4">
                      <input
                        type="text"
                        name="nama"
                        required
                        class="text-sm block w-full rounded-lg border border-gray-300 py-2 px-3"
                        placeholder="Nama Lengkap">
                    </div>

                    <div class="mb-4">
                      <input
                        type="email"
                        name="email"
                        required
                        class="text-sm block w-full rounded-lg border border-gray-300 py-2 px-3"
                        placeholder="Email">
                    </div>

                    <div class="mb-4">
                      <input
                        type="password"
                        name="password"
                        required
                        class="text-sm block w-full rounded-lg border border-gray-300 py-2 px-3"
                        placeholder="Password">
                    </div>

                    <div class="text-center">
                      <button
                        type="submit"
                        name="register"
                        class="inline-block w-full px-6 py-3 mt-6 font-bold text-white rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                        Daftar
                      </button>
                    </div>

                    <p class="mt-4 text-sm">
                      Sudah punya akun?
                      <a href="sign-in.php" class="font-bold text-slate-700">Sign in</a>
                    </p>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
      <footer class="py-12">
        <div class="container">
          <div class="flex flex-wrap -mx-3">
            <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
              <p class="mb-0 text-slate-400">
                Copyright ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
              </p>
            </div>
          </div>
        </div>
      </footer>
      <?php
      if (isset($_POST['register'])) {

    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops!',
                    text: 'Email sudah terdaftar'
                }).then(() => {
                    window.location = 'sign-up.php';
                });
            </script>
            ";
        exit;
    }

    $query = mysqli_query($koneksi, 
        "INSERT INTO users (nama, email, password)
        VALUES ('$nama', '$email', '$password')"
    );

    if ($query) {
        echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Pendaftaran berhasil',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location = 'sign-in.php';
        });
    </script>
    ";
    } 
}

      ?>
      <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>
  </body>
  <!-- plugin for scrollbar  -->
  <script src="build/assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script
    src="build/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5"
    async></script>
</html>
