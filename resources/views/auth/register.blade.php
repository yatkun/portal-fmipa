<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Daftar | Portal FMIPA Unsulbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


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
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Get your free Skote account now.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="index.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.png" alt="" class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">

                                <form method="POST" action="{{ route('register') }}" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukkan nama lengkap" required value="{{ old('nama') }}">
                                        <div class="invalid-feedback">
                                            Silahkan masukkan nama lengkap
                                        </div>
                                    
                                    </div>

                                    <div class="mb-3">
                                        <label for="nidn" class="form-label">NIDN</label>
                                        <input type="text" class="form-control" id="nidn" name="nidn"
                                            placeholder="Masukkan NIDN" required>
                                        <div class="invalid-feedback">
                                            Silahkan masukkan NIDN
                                        </div>
                                    
                                        @error('nidn')
                                        <span  style="width: 100%;
                                        margin-top: 0.25rem;
                                        font-size: 80%;
                                        color: #f46a6a;">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror


                                    </div>


                                    <div class="mb-3">
                                        <label for="passowrd" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan password" required>
                                        <div class="invalid-feedback">
                                            Silahkan masukkan password
                                        </div>
                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Daftar</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Sudah punya akun ? <a href="/masuk" class="fw-medium text-primary">
                                    Masuk</a> </p>
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