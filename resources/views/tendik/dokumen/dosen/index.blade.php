@extends('template.panel')

@section('css')

<link rel="stylesheet" type="text/css"
        href="{{ asset('assets/libs/select2/css/select2.min.css') }}">
@endsection
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dokumen Dosen</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row" data-select2-id="11">
            <div class="col-lg-12" data-select2-id="10">
                <div class="card" data-select2-id="9">
                    <div class="card-body border-bottom">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 card-title flex-grow-1">Jobs Lists</h5>
                            <div class="flex-shrink-0">
                                <a href="#!" class="btn btn-primary">Add New Job</a>
                                <a href="#!" class="btn btn-light"><i class="mdi mdi-refresh"></i></a>
                                <div class="dropdown d-inline-block">

                                    <button type="menu" class="btn btn-success" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-bottom">
                        <div class="row g-3">
                            <div class="col-xxl-4 col-lg-6">
                                <input type="search" class="form-control" id="searchInput" placeholder="Search for ...">
                            </div>
                            <div class="col-xxl-2 col-lg-6" data-select2-id="8">
                                <select class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="3">Status</option>
                                    <option value="Active" data-select2-id="13">Active</option>
                                    <option value="New" data-select2-id="14">New</option>
                                    <option value="Close" data-select2-id="15">Close</option>
                                </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 167.828px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-c4r1-container"><span class="select2-selection__rendered" id="select2-c4r1-container" role="textbox" aria-readonly="true" title="Status">Status</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <div class="col-xxl-2 col-lg-4">
                                <select class="form-control select2 select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="6">Select Type</option>
                                    <option value="1">Full Time</option>
                                    <option value="2">Part Time</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 167.828px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-e8hn-container"><span class="select2-selection__rendered" id="select2-e8hn-container" role="textbox" aria-readonly="true" title="Select Type">Select Type</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <div class="col-xxl-2 col-lg-4">
                                <div id="datepicker1">
                                    <input type="text" class="form-control" placeholder="Select date" data-date-format="dd M, yyyy" data-date-autoclose="true" data-date-container="#datepicker1" data-provide="datepicker">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-xxl-2 col-lg-4">
                                <button type="button" class="btn btn-soft-secondary w-100"><i class="mdi mdi-filter-outline align-middle"></i> Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Experience</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Posted Date</th>
                                        <th scope="col">Last Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Magento Developer</td>
                                        <td>Themesbrand</td>
                                        <td>California</td>
                                        <td>0-2 Years</td>
                                        <td>2</td>
                                        <td><span class="badge badge-soft-success">Full Time</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Product Designer</td>
                                        <td>Web Technology pvt.ltd</td>
                                        <td>California</td>
                                        <td>1-2 Years</td>
                                        <td>3</td>
                                        <td><span class="badge badge-soft-danger">Part Time</span></td>
                                        <td>15 June 2021</td>
                                        <td>28 June 2021</td>
                                        <td><span class="badge bg-info">New</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Marketing Director</td>
                                        <td>Creative Agency</td>
                                        <td>Phoenix</td>
                                        <td>-</td>
                                        <td>5</td>
                                        <td><span class="badge badge-soft-success">Full Time</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge bg-danger">Close</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>HTML Developer</td>
                                        <td>Web Technology pvt.ltd</td>
                                        <td>California</td>
                                        <td>0-4 Years</td>
                                        <td>8</td>
                                        <td><span class="badge badge-soft-success">Full Time</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Product Sales Specialist</td>
                                        <td>Skote Technology pvt.Ltd</td>
                                        <td>Louisiana</td>
                                        <td>5+ Years</td>
                                        <td>1</td>
                                        <td><span class="badge badge-soft-danger">Part Time</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge bg-info">New</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Magento Developer</td>
                                        <td>New Technology pvt.ltd</td>
                                        <td>Oakridge Lane Richardson</td>
                                        <td>0-2 Years</td>
                                        <td>2</td>
                                        <td><span class="badge badge-soft-info">Freelance</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge text-bg-info">New</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Business Associate</td>
                                        <td>Web Technology pvt.ltd</td>
                                        <td>California</td>
                                        <td>0-2 Years</td>
                                        <td>2</td>
                                        <td><span class="badge badge-soft-success">Full Time</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge text-bg-success">Active</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Magento Developer</td>
                                        <td>Adobe Agency</td>
                                        <td>California</td>
                                        <td>0-2 Years</td>
                                        <td>2</td>
                                        <td><span class="badge badge-soft-success">Full Time</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge text-bg-danger">Close</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>HTML Developer</td>
                                        <td>Web Technology pvt.ltd</td>
                                        <td>California</td>
                                        <td>0-2 Years</td>
                                        <td>2</td>
                                        <td><span class="badge badge-soft-danger">Part Time</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge text-bg-info">New</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>Marketing Director</td>
                                        <td>Web Technology pvt.ltd</td>
                                        <td>California</td>
                                        <td>0-2 Years</td>
                                        <td>2</td>
                                        <td><span class="badge badge-soft-warning">Internship</span></td>
                                        <td>02 June 2021</td>
                                        <td>25 June 2021</td>
                                        <td><span class="badge text-bg-success">Active</span></td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto me-auto">
                                <p class="text-muted mb-0">Showing <b>1</b> to <b>12</b> of <b>45</b> entries</p>
                            </div>
                            <div class="col-auto">
                                <div class="card d-inline-block ms-auto mb-0">
                                    <div class="card-body p-2">
                                        <nav aria-label="Page navigation example" class="mb-0">
                                            <ul class="pagination mb-0">
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">...</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">12</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div><!--end card-->
            </div><!--end col-->

        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->





@endsection

@section('js')
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>


@endsection