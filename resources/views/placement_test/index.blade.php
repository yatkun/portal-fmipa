<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Pengumuman Placement Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


    <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/css/app.min.css') }}">
    <style>
      #loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    display: none;
}
#loader {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #3498db;
    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
   
}
 
#loader:before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #e74c3c;
    -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
      animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    
}
 
#loader:after {
    content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #f9c922;
    -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
      animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */

    }
 
@-webkit-keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(0deg);  /* IE 9 */
        transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
    }
    100% {
        -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(360deg);  /* IE 9 */
        transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
    }
}
@keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(0deg);  /* IE 9 */
        transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
    }
    100% {
        -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(360deg);  /* IE 9 */
        transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
    }
}
    </style>
</head>

<body>
    <div class="account-pages my-md-2 my-5 pt-sm-5">
        <div class="container">
           
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
              
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-primary p-4">
                                        <h1 class="text-primary font-bold">PENGUMUMAN HASIL PLACEMENT TEST 2024</h1>
                                        <h5 class="text-secondary">PROGRAM STUDI STATISTIKA</h5>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            
                            <div class="p-2 mt-3">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif

                                @if ($message = Session::get('is_active'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif

                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif


                                <form id="cekdata" method="post" action="{{ route('checkpengumuman') }}" class="needs-validation"
                                >
                                @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                                        <input type="text" class="form-control" id="nim" name="nim"
                                            placeholder="Masukkan NIM" required>
                                            <div class="invalid-feedback">
                                                ID Pengguna harus diisi
                                            </div>
                                    </div>

                                  

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-lg btn-primary waves-effect waves-light" type="submit" id="submitBtn">Lihat hasil</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    
                    <div class="mt-5 text-center">

                        <div>
                            
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
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!-- end account-pages -->
    <script>
        // Add event listener to the form submission
        document.getElementById("cekdata").addEventListener("submit", function() {
            // Show the loader
            document.getElementById("loader").style.display = "block";
            document.getElementById("loader-wrapper").style.display = "block";

            // Disable the submit button to prevent multiple submissions
            document.getElementById("submitBtn").disabled = true;
        });
    </script>
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