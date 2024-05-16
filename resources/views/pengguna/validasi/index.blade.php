@extends('template.panel')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Validasi Pengguna</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <h4 class="card-title flex-grow-1">Daftar Pengguna Baru</h4>

                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @error('nidn')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-block-helper me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror


                            <table id="datatable" class="table align-middle table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>

                                        <th>Nama Lengkap</th>
                                        <th>NIM/NIDN</th>
                                        <th>Level</th>

                                        <th>Aksi Validasi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($validasi_user as $user)
                                        <tr>

                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->nidn }}</td>
                                            <td>{{ $user->level }}</td>

                                            <td>

                                                <div class="d-flex gap-1">
                                                    <form action="{{ route('validasi.update', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin memvalidasi pengguna ini?')"
                                                            class="btn btn-sm btn-success waves-effect btn-label waves-light"><i
                                                                class="bx bx-check-double label-icon"></i>Terima</button>

                                                    </form>

                                                    <form action="{{ route('validasi.tolak', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin menolak pengguna ini?')"
                                                            class="btn btn-sm btn-danger waves-effect btn-label waves-light"><i
                                                                class="bx bx-check-double label-icon"></i>Tolak</button>

                                                    </form>






                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->




    <!-- Tombol Terima -->




    <script>
        // Saat tombol Ya di dalam modal ditekan, kirim permintaan ke server
        document.getElementById('confirmAccept').addEventListener('click', function() {
            // Kirim permintaan AJAX ke endpoint dengan metode POST
            console.log('asd');
            var id = $(this).data('user-id');

            $.ajax({
                url: '/validasi/' + id + '/terima',
                method: 'POST',
                data: {
                    // Data tambahan yang mungkin Anda perlu kirim
                    // Misalnya token CSRF
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    updateDataTable();
                },
                error: function(xhr, status, error) {

                    console.log('error');
                }
            });
        });

        // Fungsi untuk memperbarui data tabel (contoh)
        function updateDataTable() {
            // Di sini Anda dapat menambahkan logika untuk memperbarui data tabel
            // Misalnya, memuat ulang halaman atau memperbarui data secara dinamis tanpa memuat ulang
            location.reload(); // Contoh: reload halaman untuk memperbarui tabel
        }
    </script>
@endsection
