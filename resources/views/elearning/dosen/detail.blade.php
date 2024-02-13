@extends('template.panel')



@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $kelas->nama_kelas }} | {{ $kelas->kode_kelas }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 card-title flex-grow-1"><a
                                        href="/e-learning/kelas"
                                        class="btn btn-md btn-info">Kembali</a></h5>
                                <div class="flex-shrink-0">

                                    

                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            @if ($message = Session::get('error'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-book-open"></i></span>
                                        <span class="d-none d-sm-block">Deskripsi Kelas</span>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-file-alt"></i></span>
                                        <span class="d-none d-sm-block">Dokumen</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                        <span class="d-none d-sm-block">Daftar Mahasiswa</span>
                                    </a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active show" id="home1" role="tabpanel">
                                    <p class="mb-0">
                                        @if (optional($deskripsi)->deskripsi)
                                            {{ $deskripsi->deskripsi }}
                                        @else
                                            <div class="alert alert-secondary" role="alert">
                                                Deskripsi kelas tidak tersedia !. <a
                                                    href="{{ route('e-learning.edit', ['kode_kelas' => $kelas->kode_kelas]) }}">Isi
                                                    sekarang !</a>
                                            </div>
                                        @endif
                                    </p>
                                    @if (optional($deskripsi)->deskripsi)
                                        <a href="{{ route('e-learning.edit', ['kode_kelas' => $kelas->kode_kelas]) }}"
                                            class="btn btn-light btn-sm mt-5" aria-expanded="false"><i
                                                class="mdi mdi-pencil me-1"></i> <span class="d-none d-sm-inline-block">Edit
                                                deskripsi
                                            </span></a>
                                    @else
                                    @endif

                                </div>
                                <div class="tab-pane" id="profile1" role="tabpanel">
                                    <p class="mb-0">
                                        
                                    </p>
                                </div>
                                <div class="tab-pane" id="messages1" role="tabpanel">
                                    <p class="mb-0">
                                        
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <h4 class="card-title flex-grow-1">Daftar Tugas</h4>
                                <div class="flex-shrink-0">
                                    <div class="">
                                        <a href="{{ route('e-learning.tugas.buat', ['kode_kelas' => $kelas->kode_kelas]) }}"
                                            class="btn btn-success btn-rounded waves-effect waves-light mb-2"><i
                                                class="mdi mdi-plus me-1"></i> Tambah Tugas</a>

                                    </div>

                                </div>
                            </div>
                            <div id="task-1">
                                <div id="upcoming-task" class="pb-1 task-list">


                                    <!-- end task card -->
                                    <div class="row">

                                        @foreach ($tugas as $item)
                                            <div class="col-lg-4">
                                                <div class="card task-box" id="uptask-1">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end" style="">
                                                                <a class="dropdown-item edittask-details" href="#"
                                                                    id="taskedit" data-id="#uptask-1"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#"
                                                                    data-id="#uptask-1">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">

                                                            @if (now()->format('Y-m-d') <= \Carbon\Carbon::parse($item->tglakhir)->format('Y-m-d'))
                                                                <span
                                                                    class="badge rounded-pill badge-soft-primary font-size-12"
                                                                    id="task-status">Proses</span>
                                                            @else
                                                                <span
                                                                    class="badge rounded-pill badge-soft-success font-size-12"
                                                                    id="task-status">Selesai</span>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a
                                                                    href="{{ route('e-learning.tugas.detail', ['kode_kelas' => $kelas->kode_kelas, 'id' => $item->id]) }}"
                                                                    class="text-dark"
                                                                    id="task-name">{{ $item->judul }}</a>
                                                            </h5>
                                                            <li class="list-inline-item me-3 text-muted">
                                                                <i class="bx bx-calendar me-1"></i>
                                                                {{ \Carbon\Carbon::parse($item->tglakhir)->isoFormat('dddd, D MMM Y') }}
                                                            </li>
                                                        </div>

                                                    </div>

                                                </div>

                                                <!-- end task card -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
