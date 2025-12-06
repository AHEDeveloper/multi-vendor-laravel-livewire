@push('productLinks')
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/dark/table/datatable/dt-global_style.css">
@endpush
<div class="widget-content widget-content-area br-8">
    <div class="alert alert-light-success alert-dismissible fade show border-0" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg>
        </button>وبلاگ جدید با موفیقت ساخته شد</button>
    </div>
    <div id="blog-list_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
        <div class="dt--top-section">
            <div class="row">
                <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                    <div class="dataTables_length" id="blog-list_length"><label>Results : <select
                                name="blog-list_length" aria-controls="blog-list" class="form-control">
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select></label></div>
                    <button class="btn btn-success mb-2 me-4 mt-1 ms-2">ساخت وبلاگ جدید</button>
                </div>
                <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                    <div id="blog-list_filter" class="dataTables_filter"><label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>

                            <input type="search" class="form-control" placeholder="Search..." aria-controls="blog-list"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="form-check form-check-primary">
                            <input class="form-check-input custom_mixed_child" type="checkbox">
                        </div>
                    </td>
                    <td>
                        <div class="media">
                            <div class="avatar me-2">
                                <img alt="avatar" src="/admin/src/assets/img/profile-7.jpeg" class="rounded-circle">
                            </div>
                            <div class="media-body align-self-center">
                                <h6 class="mb-0">Shaun Park</h6>
                                <span>shaun.park@mail.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="mb-0">CEO</p>
                        <span class="text-success">Management</span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-light-success">Online</span>
                    </td>
                    <td class="text-center">
                        <div class="action-btns">
                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2"
                               data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-edit-2">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip"
                               data-placement="top" title="" data-bs-original-title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>

