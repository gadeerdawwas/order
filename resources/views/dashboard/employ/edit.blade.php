@extends('dashboard.include.layout')


@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">الموظفين</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">الموظفين</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('sweetalert::alert')



                <div class="row">



                    <div class="row">
                            <div class="col-lg-10">

                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <div class="flex-grow-1">
                                               <a href="{{ route('admin.emploies.index') }}" class="btn btn-success waves-effect waves-light">العودة</a>
                                            </div>

                                        </div>
                                    </div>
                                    <form action="{{ route('admin.emploies.update',$user->id) }}" method="post">
                                        @csrf
                                        @method('put')

                                        <div class="card-body">
                                            <div class="row g-3">
                                                <h2>تعديل بيانات </h2>
                                                <div class="col-lg-12">


                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <label for="companyname-field"
                                                                class="form-label">الاسم </label>
                                                            <input type="text" id="companyname-field" name="name" required
                                                                class="form-control" placeholder="ادخل الاسم " value="{{ $user->name }}"
                                                                required="">
                                                        </div>

                                                        <div class="col-lg-10">
                                                            <div>
                                                                <label for="owner-field" class="form-label">
                                                                    العنوان</label>
                                                                <input type="text" id="owner-field" name="address" required
                                                                    class="form-control" placeholder="ادخل العنوان" value="{{ $user->address }}"
                                                                    required="">
                                                            </div>
                                                        </div>



                                                <div class="col-lg-10">
                                                    <div>
                                                        <label for="location-field"
                                                            class="form-label">رقم الجوال </label>
                                                        <input type="text" id="location-field" name="phone" required
                                                            class="form-control" placeholder="ادخل رقم الجوال" value="{{ $user->phone }}"
                                                            required="">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">إغلاق</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">
                                                            تعديل </button>
                                                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end card -->


                                <!-- end card -->


                            </div>
                            <!-- end col -->


                            <!-- end col -->
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
