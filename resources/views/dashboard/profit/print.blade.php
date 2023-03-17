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
                        <h4 class="mb-sm-0">تفاصيل </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">طباعة</a></li>
                                <li class="breadcrumb-item active">تفاصيل </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row justify-content-center">
                <div class="col-xxl-9">
                    <div class="card" id="demo">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header border-bottom-dashed p-4">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <img src="{{ asset('assets/logo/1-02.png') }}" class="card-logo card-logo-dark" alt="logo dark" height="100">
                                            <img src="{{ asset('assets/logo/1-02.png') }}" class="card-logo card-logo-light" alt="logo light" height="100">

                                        </div>
                                        <div class="flex-shrink-0 mt-sm-0 mt-3">


                                            <h6 class="mb-0"><span class="text-muted fw-normal">التاريخ: </span><span id="contact-no">   <script>document.write(new Date().toLocaleDateString('ar-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) )</script></span></h6>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-header-->
                            </div>
                            <!--end col-->

                            <!--end col-->

                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr class="table-active">
                                                    <th scope="col" style="width: 50px;">#</th>
                                                    <th class="" data-sort="owner" scope="col"> المبلغ

                                                        <th class="" data-sort="industry_type" scope="col"> مستخدم </th>
                                                        <th class="" data-sort="name" scope="col"> ملاحظة / رقم الطلب </th>


                                                        </th>
                                                        <th class="" data-sort="name" scope="col"> التاريخ </th>

                                                </tr>
                                            </thead>
                                            <tbody id="products-list">

                                                @foreach ($profits as $cost)
                                                <tr>

                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="flex-grow-1 ms-2 owner">
                                                            {{ $loop->iteration }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="flex-grow-1 ms-2 owner">
                                                            {{ $cost->amount }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="flex-grow-1 ms-2 industry_type">
                                                                {{ $cost->User->name }}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="flex-grow-1 ms-2 NAME">
                                                                @if ($cost->order_id == 0)
                                                                {{ $cost->note }}
                                                                @else

                                                                {{ $cost->Order->id }}
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
                                                    </td>











                                                </tr>



                                            @endforeach
                                            </tbody>
                                        </table><!--end table-->
                                    </div>
                                    <div class="border-top border-top-dashed mt-2">
                                        <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                            <tbody>

                                                <tr class="border-top border-top-dashed fs-15">
                                                    <th scope="row">المبلغ الاجمالى : </th>
                                                    <th class="text-end">{{ $profits_amount }}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                    </div>

                                    <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                        <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> طباعة</a>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div><!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->


</div><!-- end main content-->
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
