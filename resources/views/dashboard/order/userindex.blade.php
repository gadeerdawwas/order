@extends('dashboard.include.layout')

@push('style')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
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


                                    <div class="flex-shrink-0">
                                        <div class="hstack text-nowrap gap-2">
                                            <button class="btn btn-danger shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#addmembers"> <i class="ri-printer-line"></i>  <a style="color: #fff" href="{{ route('admin.orders_print',$user_id) }}">طباعة طلبات</a> </button>
                                            <button class="btn btn-success shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#addmembers"><i class="ri-filter-2-line me-1 align-bottom"></i>
                                                 <a class="remove-item-btn "
                                                data-bs-toggle="modal" style="color: #fff"
                                                href="#editRecordModal{{ $user_id }}">

                                                تحويل نوع الشحن
                                            </a>
                                             </button>
                                            <button class="btn btn-info shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#addmembers"><i class="ri-delete-bin-5-fill"></i> <a style="color: #fff" href="{{ route('admin.orders_delete',$user_id) }}">  حذف كل طلبات </a></button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card" id="companyList">
                            <div class="card-header">
                                <div class="row g-2 justify-content-between">
                                    <div class="col-md-3">
                                        <div class="search-box">
                                            <input type="text" class="form-control search"
                                                placeholder="البحث عن الطلب  ...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>

                                        <div class="col-md-3">
                                            <div class="flex-shrink-0">
                                                <div class="hstack text-nowrap gap-2">
                                            <button  class="btn btn-primary delete_all" data-url="{{ url('myproductsDeleteAll') }}"> <i class="ri-delete-bin-5-fill fs-16"></i>  حذف طلبات    </button>

                                        </div>
                                        </div>
                                        </div>



                                </div>

                                {{-- <div class="flex-shrink-0">
                                    <div class="hstack text-nowrap gap-2"> --}}



                            {{-- </div> --}}
                            {{-- </div> --}}
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="table-responsive table-card mb-3">
                                        <table class="table  table-nowrap mb-0" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    {{-- <th scope="col" style="width: 50px;">
                                                        #
                                                    </th> --}}
                                                    <th scope="col" >
                                                        <input type="checkbox" id="master">
                                                    </th>
                                                    <th class="sort" data-sort="name" scope="col"> رقم الفاتورة</th>
                                                    <th class="sort" data-sort="owner" scope="col">تاريخ الطلبية </th>
                                                    <th class="sort" data-sort="industry_type" scope="col">
                                                        اسم لزبون
                                                    </th>
                                                    <th class="sort" data-sort="industry_type" scope="col">
                                                        منتجات
                                                    </th>
                                                    <th class="sort" data-sort="industry_type" scope="col">
                                                        حالة الدفع
                                                    </th>
                                                    <th class="sort" data-sort="industry_type" scope="col">
                                                        اجمالي الطلبية
                                                    </th>

                                                    <th scope="col">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($orders as $order)
                                                    {{-- <tr> --}}
                                                        <tr id="tr_{{$order->id}}">

                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                <input type="checkbox" class="sub_chk" data-id="{{$order->id}}">
                                                            </div>
                                                            </td>
                                                        {{-- <td class="id"><a href="javascript:void(0);"
                                                                class="fw-medium link-primary">
                                                                {{ $loop->iteration }}
                                                                <input type="checkbox" id="master">

                                                            </a>
                                                        </td> --}}

                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">{{ $order->id }}</div>
                                                            </div>
                                                        </td>




                                                        <td class="owner">{{ $order->created_at->format('y-m-d') }}</td>

                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 name">
                                                                    {{ $order->User ? $order->User->name : '' }}</div>
                                                            </div>
                                                        </td>

                                                        <td class="industry_type">
                                                            @foreach ($order->Item as $item)
                                                                <span> - {{ $item->name }}</span> <br>
                                                            @endforeach
                                                        </td>
                                                        <td class="owner">
                                                            @if ($order->state_payment == 0)
                                                                <span class="badge text-bg-danger">غير مدفوعة </span>
                                                            @else
                                                                <span class="badge text-bg-success">مدفوعة</span>
                                                            @endif
                                                        </td>
                                                        <td class="owner">{{ $order->total }}</td>

                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">


                                                                {{-- <li title="show">

                                                                    <a href="{{ url('admin/orders/destroy/',$order->id) }}" class="btn btn-danger btn-sm"
                                                                        data-tr="tr_{{$order->id}}"
                                                                        data-toggle="confirmation"
                                                                        data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                                                        data-btn-ok-class="btn btn-sm btn-danger"
                                                                        data-btn-cancel-label="Cancel"
                                                                        data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                                        data-btn-cancel-class="btn btn-sm btn-default"
                                                                        data-title="Are you sure you want to delete ?"
                                                                        data-placement="left" data-singleton="true">
                                                                         Delete
                                                                     </a>
                                                                </li> --}}
                                                                <li title="show">

                                                                    <a href="{{ route('admin.orders.show', $order->id) }}"><i
                                                                            class="ri-eye-fill fs-16"></i></a>
                                                                </li>
                                                                <li title="edit">

                                                                    <a href="{{ route('admin.orders.edit', $order->id) }}"><i
                                                                            class="ri-edit-box-line fs-16"></i></a>
                                                                </li>
                                                                <li title="print">

                                                                    <a href="{{ route('admin.singleorder_print', $order->id) }}"><i
                                                                            class="bx bx-printer fs-16"></i></a>
                                                                </li>
                                                                @can('تعديل طلبية')
                                                                    <li class="list-inline-item text-danger"
                                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                        data-bs-placement="top" title="edit">
                                                                        <a class="remove-item-btn text-success"
                                                                            data-bs-toggle="modal"
                                                                            href="#editRecordModal{{ $order->id }}">
                                                                            <i class="ri-pencil-fill fs-16"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item text-danger"
                                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                        data-bs-placement="top" title="feedback">
                                                                        <a class="remove-item-btn text-success"
                                                                            data-bs-toggle="modal"
                                                                            href="#feedbackRecordModal{{ $order->id }}">
                                                                            <i class="ri-edit-2-fill"></i>
                                                                        </a>
                                                                    </li>
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

                                                    <div class="modal fade zoomIn" id="editRecordModal{{ $order->id }}"
                                                        tabindex="-1" aria-labelledby="deleteRecordLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        id="deleteRecord-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body p-5 text-center">

                                                                    <form
                                                                        action="{{ route('admin.ordersedit', $order->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="mt-4 text-center">
                                                                            <h4 class="fs-semibold">حالة الطلب </h4>

                                                                            <select class="form-select" name="state"
                                                                                required>
                                                                                <option value="0">غير مدفوعة</option>
                                                                                <option value="1">مدفوعة</option>
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
                                                    <div class="modal fade zoomIn" id="feedbackRecordModal{{ $order->id }}"
                                                        tabindex="-1" aria-labelledby="deleteRecordLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        id="deleteRecord-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body p-5 text-center">

                                                                    <form
                                                                        action="{{ route('admin.orderfeedback', $order->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="mt-4 text-center">
                                                                            <h4 class="fs-semibold">ملاحظات
                                                                            </h4>

                                                                            <textarea name="name" id="" class="form-select" cols="30" rows="10"></textarea>



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
                                                                                    id="delete-record">اضافة !!</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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
                                                                        action="{{ route('admin.orders.destroy', $order->id) }}"
                                                                        method="post">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <div class="mt-4 text-center">
                                                                            <h4 class="fs-semibold">هل أنت متأكد من عملية
                                                                                الحذف ؟ </h4>
                                                                            {{-- <p class="text-muted fs-14 mb-4 pt-1">Deleting your company will remove
                                                                    all of your information from our database.</p> --}}
                                                                            <div
                                                                                class="hstack gap-2 justify-content-center remove">
                                                                                {{-- <button type="button" class="btn-close" aria-label="Close"></button> --}}

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

                                                    <div class="modal fade zoomIn" id="editModal{{ $order->id }}"
                                                        tabindex="-1" aria-labelledby="deleteRecordLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog ">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        id="deleteRecord-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body ">
                                                                    <form class="" method="post"
                                                                        autocomplete="off">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <input type="hidden" id="id-field">
                                                                            <div class="row g-3">
                                                                                <div class="col-lg-12">


                                                                                    <div class="row">
                                                                                        <div class="col-lg-10">
                                                                                            <label for="companyname-field"
                                                                                                class="form-label">الاسم
                                                                                            </label>
                                                                                            <input type="text"
                                                                                                id="companyname-field"
                                                                                                name="name" required
                                                                                                class="form-control"
                                                                                                placeholder="ادخل الاسم "
                                                                                                value="{{ $order->name }}"
                                                                                                required="">
                                                                                        </div>

                                                                                        <div class="col-lg-10">
                                                                                            <div>
                                                                                                <label for="owner-field"
                                                                                                    class="form-label">
                                                                                                    العنوان</label>
                                                                                                <input type="text"
                                                                                                    id="owner-field"
                                                                                                    name="address" required
                                                                                                    class="form-control"
                                                                                                    placeholder="ادخل العنوان"
                                                                                                    value="{{ $order->address }}"
                                                                                                    required="">
                                                                                            </div>
                                                                                        </div>



                                                                                        <div class="col-lg-10">
                                                                                            <div>
                                                                                                <label for="location-field"
                                                                                                    class="form-label">رقم
                                                                                                    الجوال </label>
                                                                                                <input type="text"
                                                                                                    id="location-field"
                                                                                                    name="phone" required
                                                                                                    class="form-control"
                                                                                                    placeholder="ادخل رقم الجوال"
                                                                                                    value="{{ $order->phone }}"
                                                                                                    required="">
                                                                                            </div>
                                                                                        </div>




                                                                                    </div>


                                                                                </div>



                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <div
                                                                                    class="hstack gap-2 justify-content-end">
                                                                                    <button type="button"
                                                                                        class="btn btn-light"
                                                                                        data-bs-dismiss="modal">إغلاق</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-success"
                                                                                        id="add-btn">
                                                                                        تعديل </button>
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
                <div class="modal fade zoomIn"
                id="editRecordModal{{ $user_id }}" tabindex="-1"
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
                                action="{{ route('admin.itemseditshop', $user_id) }}"
                                method="get">

                                @csrf
                                <div class="mt-4 text-center">
                                    <h4 class="fs-semibold">حالة شحن </h4>

                                    <select class="form-select" name="Shipping_type"
                                        required>
                                        <option value="جوي">جوي</option>
                                        <option value="بحري">بحري</option>
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
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
@endsection

@push('script')


<script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });


            if(allVals.length <=0)
            {
                alert("Please select row.");
            }  else {


                var check = confirm("هل انت متاكد من عملية الجذف ؟");
                if(check == true){


                    var join_selected_values = allVals.join(",");


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }
            }
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>

    <!-- list.js min js -->
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/crm-companies.init.js') }}"></script>
@endpush
