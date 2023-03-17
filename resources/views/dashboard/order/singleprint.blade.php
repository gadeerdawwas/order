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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">طباعة</a></li>
                                <li class="breadcrumb-item active">طلبات </li>
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
                                        <table class="table align-middle " id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    {{-- <th scope="col" style="width: 50px;">
                                                        #
                                                    </th> --}}
                                                    <th  data-sort="name" scope="col">رقم الطلب </th>
                                                    <th  data-sort="name" scope="col">رقم الفاتورة </th>

                                                    <th  data-sort="name" scope="col"> نوع الشحن </th>
                                                    <th  data-sort="name" scope="col"> وصف </th>
                                                    <th  data-sort="name" scope="col"> المقاس </th>
                                                    <th  data-sort="name" scope="col"> العدد </th>

                                                    <th  data-sort="industry_type" scope="col"> السعر </th>
                                                    <th  data-sort="name" scope="col"> سعر الشحن </th>
                                                    <th  data-sort="name" scope="col"> اجمالى الطلب </th>
                                                    <th  data-sort="owner" scope="col"> حالة </th>


                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($orders as $order)
                                                    {{-- @foreach ($order->Item as $order) --}}


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




                                                    </tr>



                                                {{-- @endforeach --}}
                                                @endforeach



                                            </tbody>
                                        </table>
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
