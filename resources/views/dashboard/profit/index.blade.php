@extends('dashboard.include.layout')

@push('style')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


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
                            <h4 class="mb-sm-0">مصاريف الطلبات  </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">مصاريف الطلبات  </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('sweetalert::alert')



                <div class="row">

                    <div class="card">
                        <div class="col-lg-4">
                            <div class="card-header">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <div class="flex-grow-1">

                                        {{-- @can('إضافة مصاريف الطلبات ') --}}
                                            {{-- <a href="{{ route('admin.profits.create') }}" class="btn btn-info add-btn">
                                                <i class="ri-add-fill me-1 align-bottom"></i>اضافة
                                                دفعات لطلبات
                                            </a> --}}
                                            <button class="btn btn-info add-btn" data-bs-toggle="modal"
                                            data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i>اضافة
                                            دفعات لطلبات </button>
                                        {{-- @endcan --}}


                                    </div>

                                </div>


                            </div>
                        </div>



                    </div>

                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card" id="companyList">

                            <div class="card-body">
                                <div>
                                    <div class="table-responsive table-card mb-3">
                                        <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    {{-- <th scope="col" style="width: 50px;">
                                                        #
                                                    </th> --}}
                                                    <th class="sort" data-sort="industry_type" scope="col"> مستخدم </th>

                                                    <th class="sort" data-sort="owner" scope="col"> المبلغ

                                                    {{-- <th class="sort" data-sort="name" scope="col"> ملاحظة / رقم الطلب </th>


                                                    </th>
                                                    <th class="sort" data-sort="name" scope="col"> التاريخ </th> --}}



                                                    <th scope="col">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($profits as $cost)
                                                    <tr>


                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 industry_type">
                                                                    {{ $cost->User->name }}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 owner">
                                                                {{ $cost->amount }}
                                                                </div>
                                                            </div>
                                                        </td>

                                                        {{-- <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 NAME">
                                                                    @if ($cost->order_id == 0)
                                                                    {{ $cost->note }}
                                                                    @else

                                                                    {{ $cost->order_id }}
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">

                                                                <div class="flex-grow-1 ms-2 owner">
                                                                    {{ $cost->created_at->format('Y-m-d') }}

                                                                </div>
                                                            </div>
                                                        </td> --}}










                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">

                                                                {{-- @can('تعديل مصاريف الطلبات ') --}}
                                                                    <li class="list-inline-item text-danger"
                                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                        data-bs-placement="top" title="show">
                                                                        <a class="remove-item-btn text-success"

                                                                            href="{{ route('admin.profits.show', $cost->user_id) }}">
                                                                            <i class="ri-eye-fill fs-16"></i>
                                                                        </a>
                                                                    {{-- @endcan --}}

                                                                    {{-- @can('حذف مصاريف الطلبات ') --}}
                                                                    {{-- <li class="list-inline-item text-danger"
                                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                        data-bs-placement="top" title="Delete">
                                                                        <a class="remove-item-btn text-danger"
                                                                            data-bs-toggle="modal"
                                                                            href="#deleteRecordModal{{ $cost->user_id }}">
                                                                            <i class="ri-delete-bin-5-fill fs-16"></i></i>
                                                                        </a>
                                                                    </li> --}}
                                                                {{-- @endcan --}}
                                                            </ul>
                                                        </td>
                                                    </tr>



                                                    <div class="modal fade zoomIn" id="editRecordModal{{ $cost->user_id }}"
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
                                                                    <h4>تعديل مصاريف الطلبات </h4>
                                                                    <form
                                                                        action="{{ route('admin.profits.edit', $cost->user_id) }}"
                                                                        method="post">
                                                                        @method('put')

                                                                        @csrf

                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="product-title-input">المبلغ
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                name="profits" required
                                                                                id="product-title-input"
                                                                                value="{{ $cost->profits }}"
                                                                                placeholder="ادخل المبلغ">
                                                                        </div>


                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="product-title-input">
                                                                                وصف </label>
                                                                            <textarea name="note" class="form-control" id="" cols="5" rows="5">{{ $cost->note }}
                                                                    </textarea>

                                                                        </div>
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
                                                                                id="delete-record">تعديل !!</button>
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
                                        <div class="modal-content bcost-0">
                                            <div class="modal-header bg-soft-info p-3">
                                                {{-- <h5 class="modal-title" id="exampleModalLabel"></h5> --}}
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form class="{{ route('admin.profits.store') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" id="id-field">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div class="text-center">
                                                                <div class="position-relative d-inline-block">
                                                                    <div class="position-absolute bottom-0 end-0">

                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label for="companyname-field"
                                                                        class="form-label">المبلغ </label>
                                                                    <input type="text" id="companyname-field"
                                                                        name="amount" required class="form-control"
                                                                        placeholder="ادخل المبلغ " required="">
                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div>
                                                                        <label for="location-field" class="form-label">
                                                                         ملاحظات
                                                                        </label>
                                                                       <textarea class="form-control" name="note" id="" cols="5" rows="5"></textarea>


                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="product-title-input">إسم
                                                                        لزبون</label>



                                                                   <select class="form-control"  name="user_id">

                                                                    @if (auth()->user()->role == 2)
                                                                    <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>

                                                                    @else
                                                                    @foreach ($user as $u)
                                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>

                                                                    @endforeach

                                                                    @endif
                                                                </select>


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
<script type="text/javascript">
    $(".myselect").select2();
</script>
    <!-- list.js min js -->
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/crm-companies.init.js') }}"></script>
@endpush
