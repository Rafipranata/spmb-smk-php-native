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
      session_start();
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
    <title>Login | SPMB - SMK PGRI 2 TAMAN</title>
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
    <div class="container sticky top-0 z-sticky">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
        </div>
      </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
      <section>
        <div
          class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
          <div class="container z-10">
            <div class="flex flex-wrap mt-0 -mx-3">
              <div
                class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                <div
                  class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                  <div
                    class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                    <h3
                      class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">
                      Login PMB
                    </h3>
                    <p class="mb-0">Masukkan email dan kata sandi Anda untuk masuk</p>
                  </div>
                  <div class="flex-auto p-6">
                    <form method="POST" role="form">
                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                      <div class="mb-4">
                        <input
                          type="email"
                          name="email"
                          required
                          class="text-sm block w-full rounded-lg border border-gray-300 px-3 py-2"
                          placeholder="Email">
                      </div>

                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                      <div class="mb-4">
                        <input
                          type="password"
                          name="password"
                          required
                          class="text-sm block w-full rounded-lg border border-gray-300 px-3 py-2"
                          placeholder="Password">
                      </div>

                      <div class="text-center">
                        <button
                          type="submit"
                          name="login"
                          class="inline-block w-full px-6 py-3 mt-6 font-bold text-white rounded-lg bg-gradient-to-tl from-blue-600 to-cyan-400">
                          Sign in
                        </button>
                      </div>
                    </form>

                  </div>
                  <div
                    class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                    <p class="mx-auto mb-6 leading-normal text-sm">
                      Belum punya akun?
                      <a
                        href="sign-up.php"
                        class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text"
                        >Daftar</a
                      >
                    </p>
                  </div>
                </div>
              </div>
              <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                <div
                  class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                  <div
                    class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10"
                    style="
                      background-image: url('build/assets/img/curved-images/curved6.jpg');
                    "></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
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
if (isset($_POST['login'])) {

    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    $user  = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {

        // SIMPAN SESSION (INI YANG DIPAKAI DI DASHBOARD)
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama']    = $user['nama'];
        $_SESSION['email']   = $user['email'];

        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Login berhasil',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'dashboard.php';
            });
        </script>";
        exit;

    } else {

        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Email atau password salah'
            }).then(() => {
                window.location.href = 'sign-in.php';
            });
        </script>";
        exit;
    }
}
?>

  </body>
  <!-- plugin for scrollbar  -->
  <script src="build/assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script
    src="build/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5"
    async></script>
</html>
