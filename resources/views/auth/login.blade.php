<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Masuk | Portal FMIPA Unsulbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    @vite(['resources/css/app.min.css', 'resources/css/bootstrap.min.css', 'resources/css/icons.min.css'])
    <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/app.min.css') }}">

</head>

<body>
    <div class="account-pages my-md-2 my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Selamat Datang !</h5>
                                        <h5 class="text-primary">PORTAL FMIPA UNSULBAR</h5>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="/" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.png" alt="" class="rounded-circle"
                                                height="50">
                                        </span>
                                    </div>
                                </a>
                                
                                <a href="/" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.png" alt="" class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif


                                <form id="loginForm" method="post" action="{{ route('login') }}" class="needs-validation"
                                novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">ID Pengguna (NIDN/NIP/NIM)</label>
                                        <input type="text" class="form-control" id="username" name="nidn"
                                            placeholder="Masukkan ID pengguna" required>
                                            <div class="invalid-feedback">
                                                ID Pengguna harus diisi
                                            </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kata Sandi</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Masukkan kata sandi" aria-label="Password"
                                                aria-describedby="password-addon" required>
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                                    <div class="invalid-feedback">
                                                        Password harus diisi
                                                    </div>
                                                </div>
                                        
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Masuk</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Belum punya akun ? <a href="/daftar" class="fw-medium text-primary"> Daftar </a> </p>
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Portal FMIPA Unsulbar. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                by Yatkun.Studio</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <script src="{{ asset ('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset ('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset ('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset ('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset ('assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset ('assets/js/app.js') }}"></script>
    <script src="{{ asset ('assets/js/pages/validation.init.js') }}"></script>

</body>

</html>