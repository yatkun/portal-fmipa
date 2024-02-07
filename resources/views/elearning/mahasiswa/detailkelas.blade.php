@extends('template.panel')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $kelas->nama_kelas }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#deskripsi" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Deskripsi Kelas</span>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#dokumen" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Dokumen</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active show" id="deskripsi" role="tabpanel">
                                    <p class="mb-0">
                                        @if (optional($deskripsi)->deskripsi)
                                            {{ $deskripsi->deskripsi }}
                                        @else
                                            <div class="alert alert-secondary" role="alert">
                                                Deskripsi kelas tidak tersedia !
                                            </div>
                                        @endif
                                    </p>
                                </div>
                                <div class="tab-pane" id="dokumen" role="tabpanel">
                                    <p class="mb-0">
                                        @if (optional($deskripsi)->deskripsi)
                                            {{ $deskripsi->deskripsi }}
                                        @else
                                            <div class="alert alert-secondary" role="alert">
                                                Deskripsi kelas tidak tersedia !
                                            </div>
                                        @endif
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


                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div id="task-1">
                                <div id="upcoming-task" class="pb-1 task-list">


                                    <!-- end task card -->
                                    <div class="row">

                                        @foreach ($tugass as $item)
                                            <div class="col-lg-4">
                                                <div class="card task-box" id="uptask-1">
                                                    <div class="card-body">

                                                        <div class="float-end ms-2">
                                                            @if ($item->tugas_user_id && $item->tgl_kirim <= $item->tglakhir)
                                                                <span class="badge badge-soft-success">Tepat Waktu</span>
                                                            @elseif ($item->tugas_user_id && $item->tgl_kirim > $item->tglakhir)
                                                                <span class="badge badge-soft-warning">Terlambat</span>
                                                            @else
                                                                <span class="badge badge-soft-danger">Belum
                                                                    dikerjakan</span>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a
                                                                    href="{{ route('kelas.tugas.detail', ['kode_kelas' => $kelas->kode_kelas, 'id' => $item->tugas_tugas_id]) }}"
                                                                    class="text-dark" id="task-name">{{ $item->judul }}</a>
                                                            </h5>
                                                            <li class=" me-3 text-muted">
                                                                Batas waktu :
                                                                {{ \Carbon\Carbon::parse($item->tglakhir)->isoFormat('dddd, D MMM Y') }}
                                                            </li>
                                                            @if ($item->tgl_kirim)
                                                                <li class=" me-3 text-muted">
                                                                    Pengiriman :
                                                                    {{ \Carbon\Carbon::parse($item->tgl_kirim)->isoFormat('dddd, D MMM Y') }}
                                                                </li>
                                                            @else
                                                                <li class=" me-3 text-muted">
                                                                    Pengiriman : -
                                                                </li>
                                                            @endif




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
