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

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Profil Mahasiswa</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                        <div class="float-end">
    
                            <a href="mahasiswa-profil/edit" class="btn btn-light" aria-expanded="false"><i
                                    class="mdi mdi-pencil me-1"></i> <span class="d-none d-sm-inline-block">Edit Data
                                    Pribadi</span></a>
    
                        </div>
                        <h4 class="card-title mb-4">Informasi Pribadi</h4>
                        <div class="row">
                            <div class="col-sm-auto d-flex justify-content-sm-start justify-content-center">
                                <div class="avatar-xl mb-4 profile-image-container">
                                    @if (!empty($mahasiswa->foto))
                                        <!-- Gunakan gambar profil yang telah diunggah -->
                                        <img src="{{ asset('storage/profile_image/' . $mahasiswa->foto) }}"
                                            alt="Foto Profil" class="img-thumbnail rounded-circle avatar-xl" style="background-size:cover;object-fit:cover !important;">
                                    @else
                                        <!-- Gunakan gambar default -->
                                        <img src="{{ asset('storage/profile_image/avatar.png') }}" alt="Foto Profil"
                                            class="img-thumbnail rounded-circle avatar-xl">
                                    @endif
                                    <div class="overlay img-thumbnail rounded-circle" id="change-image">
                                        <span class="change-image-text">Ganti</span>
                                    </div>
                                    <form action="{{ route('foto.profile.mahasiswa') }}" method="POST"
                                        enctype="multipart/form-data" id="image-upload-form">
                                        @csrf
                                        <input type="file" name="foto" id="profile-image-upload"
                                            style="display: none;">
                                    </form>
                                </div>
                            </div>
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama Lengkap</th>
                                                <td>: {{ auth()->user()->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Program Studi</th>
                                                <td>: {{ optional($mahasiswa)->prodi  }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Angkatan</th>
                                                <td>: {{ optional($mahasiswa)->angkatan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Semester</th>
                                                <td>: {{ optional($mahasiswa)->semester }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kelas</th>
                                                <td>: {{ optional($mahasiswa)->kelas }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>: {{ optional($mahasiswa)->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">No.HP</th>
                                                <td>: {{ optional($mahasiswa)->nohp }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat</th>
                                                <td>: {{ optional($mahasiswa)->alamat }}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- Transaction Modal -->
<div class="modal fade transaction-detailModal" tabindex="-1" role="dialog"
    aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)
                                        </h5>
                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                    </div>
                                </td>
                                <td>$ 255</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                    </div>
                                </td>
                                <td>$ 145</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                </td>
                                <td>
                                    $ 400
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Shipping:</h6>
                                </td>
                                <td>
                                    Free
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Total:</h6>
                                </td>
                                <td>
                                    $ 400
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<script>
    document.getElementById('change-image').addEventListener('click', function() {
        document.getElementById('profile-image-upload').click();
    });

    document.getElementById('profile-image-upload').addEventListener('change', function () {
const form = document.getElementById('image-upload-form');
form.submit();
});



</script>
@endsection