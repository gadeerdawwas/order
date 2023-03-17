@extends('dashboard.include.layout')


@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">ملاحظات </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">ملاحظات </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('sweetalert::alert')



                <div class="row">

                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card" id="companyList">
                            <div class="card-header">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <div class="search-box">
                                            <input type="text" class="form-control search"
                                                placeholder="البحث عن الطلب  ...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="table-responsive table-card mb-3">
                                        <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        #
                                                    </th>
                                                    <th class="sort" data-sort="industry_type" scope="col">
                                                        اسم لزبون
                                                    </th>
                                                    <th class="sort" data-sort="name" scope="col">رقم الطلبية </th>

                                                    <th class="sort" data-sort="industry_type" scope="col">
                                                        ملاحظة
                                                    </th>



                                                    {{-- <th scope="col">العمليات</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($Feedback as $Feedback)
                                                    <tr>

                                                        <td class="id"><a href="javascript:void(0);"
                                                                class="fw-medium link-primary">{{ $loop->iteration }}</a>
                                                        </td>
                                                        {{-- <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ $Feedback->id }}</div>
                                                            </div> --}}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ (($Feedback->User) ? $Feedback->User->name : '')  }}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a  href="{{ route('admin.orders.show',(($Feedback->Order) ? $Feedback->Order->id : '')) }}">{{ (($Feedback->Order) ? $Feedback->Order->id : '') }}</a>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ $Feedback->name }}</div>
                                                            </div>
                                                        </td>





                                                    </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 150+ companies We did
                                                    not find any companies for you search.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <div class="pagination-wrap hstack gap-2" style="display: flex;">
                                            <a class="page-item pagination-prev disabled" href="#">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0">
                                                <li class="active"><a class="page" href="#" data-i="1"
                                                        data-page="8">1</a></li>
                                                <li><a class="page" href="#" data-i="2" data-page="8">2</a>
                                                </li>
                                            </ul>
                                            <a class="page-item pagination-next" href="#">
                                                Next
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!--end add modal-->

                                <div class="modal fade" id="showModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content border-0">
                                            <div class="modal-header bg-soft-info p-3">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form class="{{ route('admin.orders.store') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" id="id-field">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div class="text-center">
                                                                <div class="position-relative d-inline-block">
                                                                    <div class="position-absolute bottom-0 end-0">
                                                                        <label for="company-logo-input" class="mb-0"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="right"
                                                                            aria-label="Select Image"
                                                                            data-bs-original-title="Select Image">
                                                                            <div class="avatar-xs cursor-pointer">
                                                                                <div
                                                                                    class="avatar-title bg-light border rounded-circle text-muted">
                                                                                    <i class="ri-image-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                        <input class="form-control d-none" value=""
                                                                            id="company-logo-input" type="file"
                                                                            accept="image/png, image/gif, image/jpeg">
                                                                    </div>
                                                                    <div class="avatar-lg p-1">
                                                                        <div class="avatar-title bg-light rounded-circle">
                                                                            <img src="{{ asset('assets/images/orders/multi-order.jpg') }}"
                                                                                id="companylogo-img"
                                                                                class="avatar-md rounded-circle object-cover">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label for="companyname-field"
                                                                        class="form-label">الاسم </label>
                                                                    <input type="text" id="companyname-field"
                                                                        name="name" required class="form-control"
                                                                        placeholder="ادخل الاسم " required="">
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div>
                                                                        <label for="owner-field" class="form-label">
                                                                            العنوان</label>
                                                                        <input type="text" id="owner-field"
                                                                            name="address" required class="form-control"
                                                                            placeholder="ادخل العنوان" required="">
                                                                    </div>
                                                                </div>



                                                                <div class="col-lg-6">
                                                                    <div>
                                                                        <label for="location-field" class="form-label">رقم
                                                                            الجوال
                                                                        </label>
                                                                        <input type="text" id="location-field"
                                                                            name="phone" required class="form-control"
                                                                            placeholder="ادخل رقم الجوال" required="">
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-6">
                                                                    <div>
                                                                        <label for="location-field" class="form-label">
                                                                            كلمة المرور
                                                                        </label>
                                                                        <input id="password" type="password"
                                                                            class="form-control" name="password" required
                                                                            autocomplete="new-password">


                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div>
                                                                        <label for="location-field" class="form-label">
                                                                            تاكيد كلمة
                                                                            المرور </label>
                                                                        <input id="password-confirm" type="password"
                                                                            class="form-control"
                                                                            name="password_confirmation" required
                                                                            autocomplete="new-password">

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">إغلاق</button>
                                                            <button type="submit" class="btn btn-success"
                                                                id="add-btn">
                                                                إضافة </button>
                                                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end delete modal -->

                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
@endsection

@push('script')
    <!-- list.js min js -->
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/crm-companies.init.js') }}"></script>
@endpush
