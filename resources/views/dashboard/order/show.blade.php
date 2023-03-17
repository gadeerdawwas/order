@extends('dashboard.include.layout')

@push('style')
    <style>
        .zoom {
            /* padding: 100px; */
            background-color: #fff;
            transition: transform .2s;
            /* Animation */
            width: 50px;
            height: 50px;
            margin: 0 auto;
        }

        .zoom:hover {
            transform: scale(4);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
@endpush
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">طلبات </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">طلبات </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('sweetalert::alert')



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <div class="flex-grow-1">

                                        @can('إضافة طلبية')
                                            <a href="{{ route('admin.orders.create') }}" class="btn btn-info add-btn">
                                                <i class="ri-add-fill me-1 align-bottom"></i>اضافة
                                                طلب
                                            </a>
                                        @endcan


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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
                                                    {{-- <th scope="col" style="width: 50px;">
                                                        #
                                                    </th> --}}
                                                    <th class="sort" data-sort="name" scope="col">رقم الطلب </th>
                                                    <th class="sort" data-sort="name" scope="col">رقم الفاتورة </th>
                                                    <th class="sort" data-sort="name" scope="col"> صورة </th>
                                                    <th class="sort" data-sort="name" scope="col"> رابط </th>
                                                    <th class="sort" data-sort="name" scope="col"> نوع الشحن </th>
                                                    <th class="sort" data-sort="name" scope="col"> وصف </th>
                                                    <th class="sort" data-sort="name" scope="col"> المقاس </th>
                                                    <th class="sort" data-sort="name" scope="col"> العدد </th>

                                                    <th class="sort" data-sort="industry_type" scope="col"> السعر </th>
                                                    <th class="sort" data-sort="name" scope="col"> سعر الشحن </th>
                                                    <th class="sort" data-sort="name" scope="col"> اجمالى الطلب </th>
                                                    <th class="sort" data-sort="owner" scope="col"> حالة </th>


                                                    <th scope="col">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($orders->Item as $order)
                                                    <tr>

                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ $order->id }}</div>
                                                            </div>
                                                        </td>


                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">
                                                                    <a
                                                                        href="{{ route('admin.orders.show', $order->Order ? $order->Order->id : '') }}">{{ $order->Order ? $order->Order->id : '' }}</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">
                                                                    <img class="zoom"
                                                                        src="{{ asset('upload/order/' . $order->image) }}"
                                                                        alt="" width="50px">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">
                                                                    @if ($order->link)
                                                                    <a
                                                                    href="{{ $order->link }}">اضغط على رابط</a>
                                                                    @else
                                                                    <span>لا يوجد رابط</span>
                                                                    @endif
                                                                    </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">
                                                                    {{ $order->Shipping_type }}</div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ $order->description }}
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ $order->size }}</div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ $order->number }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ $order->price }}
                                                                </div>
                                                            </div>
                                                        </td>


                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 industry_type">
                                                                    {{ $order->price_Shipping }}</div>
                                                            </div>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 industry_type">
                                                                    {{ $order->number * $order->price + $order->price_Shipping }}
                                                                </div>
                                                            </div>
                                                        </td>


                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 owner">

                                                                    @if ($order->state == 0)
                                                                        <span class="badge text-bg-primary"> قيد الانتظار
                                                                        </span>
                                                                    @elseif ($order->state == 1)
                                                                        <span class="badge text-bg-secondary"> تم الشراء
                                                                        </span>
                                                                    @elseif ($order->state == 2)
                                                                        <span class="badge text-bg-warning"> تم الشحن
                                                                        </span>
                                                                    @elseif ($order->state == 3)
                                                                        <span class="badge text-bg-info"> جاري التسليم
                                                                        </span>
                                                                    @elseif ($order->state == 4)
                                                                        <span class="badge text-bg-success"> تم التسليم
                                                                        </span>
                                                                    @elseif ($order->state == 5)
                                                                        <span class="badge text-bg-dark"> مرجع </span>
                                                                    @endif


                                                                </div>
                                                            </div>
                                                        </td>




                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">

                                                                @can('تعديل طلبية')
                                                                    <li class="list-inline-item text-danger"
                                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                        data-bs-placement="top" title="edit">
                                                                        <a class="remove-item-btn text-success"
                                                                            data-bs-toggle="modal"
                                                                            href="#editRecordModal{{ $order->id }}">
                                                                            <i class="ri-pencil-fill fs-16"></i>
                                                                        </a>
                                                                    @endcan

                                                                    @can('حذف طلبية')
                                                                    <li class="list-inline-item text-danger"
                                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                        data-bs-placement="top" title="Delete">
                                                                        <a class="remove-item-btn text-danger"
                                                                            data-bs-toggle="modal"
                                                                            href="#deleteRecordModal{{ $order->id }}">
                                                                            <i class="ri-delete-bin-5-fill fs-16"></i></i>
                                                                        </a>
                                                                    </li>
                                                                @endcan
                                                            </ul>
                                                        </td>
                                                    </tr>


                                                    <div class="modal fade zoomIn"
                                                        id="deleteRecordModal{{ $order->id }}" tabindex="-1"
                                                        aria-labelledby="deleteRecordLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        id="deleteRecord-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body p-5 text-center">
                                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                        trigger="loop"
                                                                        colors="primary:#405189,secondary:#f06548"
                                                                        style="width:90px;height:90px"></lord-icon>
                                                                    <form
                                                                        action="{{ route('admin.items.destroy', $order->id) }}"
                                                                        method="post">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <div class="mt-4 text-center">
                                                                            <h4 class="fs-semibold">هل أنت متأكد من عملية
                                                                                الحذف ؟ </h4>

                                                                            <div
                                                                                class="hstack gap-2 justify-content-center remove">
                                                                                <button
                                                                                    class="btn btn-link link-success fw-medium text-decoration-none"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i
                                                                                        class="ri-close-line me-1 align-middle"></i>
                                                                                    إغلاق
                                                                                </button>
                                                                                <button class="btn btn-danger"
                                                                                    id="delete-record">بتأكيد !!</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade zoomIn"
                                                        id="editRecordModal{{ $order->id }}" tabindex="-1"
                                                        aria-labelledby="deleteRecordLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        id="deleteRecord-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body p-5 text-center">

                                                                    <form
                                                                        action="{{ route('admin.itemsedit', $order->id) }}"
                                                                        method="post">

                                                                        @csrf
                                                                        <div class="mt-4 text-center">
                                                                            <h4 class="fs-semibold">حالة الطلب </h4>

                                                                            <select class="form-select" name="state"
                                                                                required>
                                                                                <option value="0">قيد الانتظار
                                                                                </option>
                                                                                <option value="1">تم الشراء </option>
                                                                                <option value="2">تم الشحن </option>
                                                                                <option value="3">جاري التسليم
                                                                                </option>
                                                                                <option value="4">تم التسليم </option>
                                                                                <option value="5">مرجع</option>
                                                                            </select>
                                                                            <br>
                                                                            <br>
                                                                            <br>

                                                                            <div
                                                                                class="hstack gap-2 justify-content-center remove">
                                                                                <button
                                                                                    class="btn btn-danger  btn-link link-success fw-medium text-decoration-none"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i
                                                                                        class="ri-close-line me-1 align-middle"></i>
                                                                                    إغلاق
                                                                                </button>
                                                                                <button class="btn btn-info"
                                                                                    id="delete-record">تعديل !!</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
