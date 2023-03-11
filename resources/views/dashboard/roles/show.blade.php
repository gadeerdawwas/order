@extends('dashboard.include.layout')


@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">صلاحيات</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">صلاحيات</li>
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
                <div class="d-flex align-items-center flex-wrap gap-2" >

                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card" id="companyList" style="    padding: 27px;">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="companyname-field" class="form-label">  <strong>الاسم  :</strong></label>

                                    @if ($role->name == 'employ')
                                        <span>موظف</span>
                                    @elseif ($role->name == 'Admin')
                                    <span>ادمن</span>
                                    @elseif ($role->name == 'client')
                                    <span>زبون</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="companyname-field" class="form-label"> <strong>صلاحيات :</strong>  </label>
                                   <div class="row">





                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        {{-- <label class="label label-success">{{ $v->name }},</label> --}}
                                        <div class="col-md-4 col-sm-4">
                                         - <label for="companyname-field" class="form-label">   {{ $v->name }}   </label>
                                        </div>
                                    @endforeach
                                @endif
                                   </div>
                                </div>
                            </div>

                                <!--end delete modal -->

                            </div>
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
