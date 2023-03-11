@extends('dashboard.include.layout')


@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">الصلاحيات</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">الصلاحيات</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('sweetalert::alert')

                {{-- @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
        @include('sweetalert::alert')
    </div>
@endif --}}

                <div class="row">

                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card" id="companyList">

                            <div class="card-body">
                                {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-lg-6">
                                            <label for="companyname-field" class="form-label">الاسم : </label>

                                            {!! Form::text('name', null, ['placeholder' => 'اكتب اسم ', 'class' => 'form-control']) !!}
                                        </div>


                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row form-group">
                                            <label for="companyname-field" class="form-label">  <strong>الصلاحيات : </strong> </label>
                                            <br />

                                            @foreach ($permission as $value)
                                            <div class="col-md-3">
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-label']) }}
                                                {{ $value->name }}</label>
                                            <br />
                                        </div>
                                        @endforeach

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
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
