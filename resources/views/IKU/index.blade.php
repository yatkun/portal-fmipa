@extends('template.panel')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dokumen IKU</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        {{-- <h4 class="card-title">Custom Tabs</h4>
                    <p class="card-title-desc">Example of custom tabs</p> --}}

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#iku1" role="tab"
                                    aria-selected="true">
                                    <span class="d-block d-sm-none">1</span>
                                    <span class="d-none d-sm-block">IKU 1</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#iku2" role="tab" aria-selected="false"
                                    tabindex="-1">
                                    <span class="d-block d-sm-none">2</span>
                                    <span class="d-none d-sm-block">IKU 2</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#iku3" role="tab" aria-selected="false"
                                    tabindex="-1">
                                    <span class="d-block d-sm-none">3</span>
                                    <span class="d-none d-sm-block">IKU 3</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#iku4" role="tab" aria-selected="false"
                                    tabindex="-1">
                                    <span class="d-block d-sm-none">4</span>
                                    <span class="d-none d-sm-block">IKU 4</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#iku5" role="tab" aria-selected="false"
                                    tabindex="-1">
                                    <span class="d-block d-sm-none">5</span>
                                    <span class="d-none d-sm-block">IKU 5</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#iku6" role="tab" aria-selected="false"
                                    tabindex="-1">
                                    <span class="d-block d-sm-none">6</span>
                                    <span class="d-none d-sm-block">IKU 6</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#iku7" role="tab" aria-selected="false"
                                    tabindex="-1">
                                    <span class="d-block d-sm-none">7</span>
                                    <span class="d-none d-sm-block">IKU 7</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#iku8" role="tab" aria-selected="false"
                                    tabindex="-1">
                                    <span class="d-block d-sm-none">8</span>
                                    <span class="d-none d-sm-block">IKU 8</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3">
                            <div class="tab-pane active show" id="iku1" role="tabpanel">
                                <div class="alert alert-info mb-0 d-flex align-items-center flex-column flex-md-row" role="alert">
                                    <div class="flex-grow-1"><h5 class="alert-heading">Lulusan Mendapat Pekerjaan yang Layak:</h5>
                                    <span class="">
                                        Persentase lulusan S1 dan D4/D3/D2/D1 yang berhasil memiliki pekerjaan, melanjutkan
                                        studi, atau menjadi wiraswasta.
                                    </span></div>
                                    <div class="flex-shrink-0 mt-3 mt-md-0">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#iku1Modal"
                                            class="btn btn-success btn-rounded waves-effect waves-light"><i
                                                class="mdi mdi-plus me-1"></i> Tambah Dokumen</button>
                                        
                                    </div>
                                </div>
                                
                                <div class="">
                                    <div class="">

                                        <div class="d-flex align-items-center mb-3">

                                            <div class="flex-shrink-0">
                                                

                                            </div>
                                        </div>





                                        <table id="datatable"
                                            class="table align-middle table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                   
                                                    <th>Nama Dokumen</th>
                                                    <th>Keterangan</th>
                                                    <th>Tanggal Upload</th>
                                                    <th>Pengguna</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($iku1 as $i)
                                                    
                                                
                                                <tr>
                                    
                                                    <td>{{ $i->nama_dokumen }}</td>
                                                    <td>{{ $i->keterangan }}</td>
                                                    <td>{{ $i->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $i->user->nama }}</td>
                                                    <td>

                                                        <div class="d-flex gap-1">
                                                            <a href="/" class="btn btn-sm btn-outline-success waves-effect waves-light">Edit</a>
                                                            <a href="/" class="btn btn-sm btn-outline-success waves-effect waves-light">Download</a>


                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="iku1Modal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah
                                                            Dokumen IKU 1</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('dokumen.iku1.store') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="nama_dokumen"
                                                                    class="col-form-label">Nama Dokumen:</label>
                                                                <input type="text" name="nama_dokumen"
                                                                    class="form-control" id="nama_dokumen"
                                                                    placeholder="Masukkan nama dokumen">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="keterangan"
                                                                    class="col-form-label">Keterangan:</label>
                                                                <input type="text" name="keterangan"
                                                                    class="form-control" id="keterangan"
                                                                    placeholder="Masukkan keterangan">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="link"
                                                                    class="col-form-label">Link Dokumen:</label>
                                                               
                                                                    <textarea class="form-control" name="link" id="link" cols="10" rows="3"></textarea>
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                            <div class="tab-pane" id="profile1" role="tabpanel">
                                <p class="mb-0">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                    single-origin coffee squid. Exercitation +1 labore velit, blog
                                    sartorial PBR leggings next level wes anderson artisan four loko
                                    farm-to-table craft beer twee. Qui photo booth letterpress,
                                    commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                    vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                    aesthetic magna delectus.
                                </p>
                            </div>
                            <div class="tab-pane" id="messages1" role="tabpanel">
                                <p class="mb-0">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                    sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                    farm-to-table readymade. Messenger bag gentrify pitchfork
                                    tattooed craft beer, iphone skateboard locavore carles etsy
                                    salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                    Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                    mi whatever gluten-free carles.
                                </p>
                            </div>
                            <div class="tab-pane" id="settings1" role="tabpanel">
                                <p class="mb-0">
                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                    art party before they sold out master cleanse gluten-free squid
                                    scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                    art party locavore wolf cliche high life echo park Austin. Cred
                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                    farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                    mustache readymade keffiyeh craft.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
