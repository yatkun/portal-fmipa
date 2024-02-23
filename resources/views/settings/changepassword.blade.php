@extends('template.panel')

@section('content')
    <style>
        .profile-image-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Ubah sesuai kebutuhan Anda */
            opacity: 0;
            /* Awalnya tidak terlihat */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: opacity 0.3s ease;
            /* Animasi fade selama 0.3 detik */
        }

        .overlay:hover {
            opacity: 1;
            /* Munculkan overlay saat di-hover */
        }

        .change-image-text {
            color: white;
            font-size: 12px;
            /* Ubah sesuai kebutuhan Anda */
            text-transform: uppercase;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                       

                        <form method="POST" action="{{ route('change.password.post') }}">
                            @csrf
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
        

                                <h4 class="card-title">Ganti Password !</h4>

                                <div class="mb-3 row">
                                    <label for="current_password" class="col-md-2 col-form-label">Password saat ini</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="current_password"
                                            id="current_password" required>
                                        @error('current_password')
                                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="new_password" class="col-md-2 col-form-label">Password baru</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" name="new_password" id="new_password"
                                            required>
                                            @error('new_password')
                                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="new_password_confirmation" class="col-md-2 col-form-label">Konfirmasi
                                        password baru</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" name="new_password_confirmation"
                                            id="new_password_confirmation" required>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Ganti</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
        <!-- end row -->



    </div>
    <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
