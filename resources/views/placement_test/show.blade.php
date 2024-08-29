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

</head>

<body>
    <div class="account-pages my-md-2 my-5 pt-sm-5">
        <div class="container">
           
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8 col-xl-7">
              
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
                        
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">

                              
                                        <tbody>
                                            <tr>
                                                <td>NIM</td>
                                                <td>: {{ $data->nim }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>: {{ $data->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nilai</td>
                                                <td>: <b>{{ $data->nilai }}</b></td>
                                            </tr>
                                           
                                            
                                        
                                        </tbody>
                                    </table>

                                   @if ($data->keterangan == 'Lulus')
                                   <div class="alert alert-success mt-2" role="alert">
                                    Selamat! Anda dinyatakan <b>LULUS</b> placement test.
                                </div>

                                <button type="button" class="btn btn-soft-info waves-effect waves-light">Unduh Sertifikat (PDF)</button>
                                   @else
                                   <div class="alert alert-secondary mt-2" role="alert">
                                    A simple success alert—check it out!
                                </div>
                                   @endif
                                </div>
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