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
                            {{-- {{ $role->id }} --}}
                            <div class="card-body">
                                {!! Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
           <h3> <strong>اسم :</strong>
            {{-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} --}}
            @if ($role->name == 'employ')
            <span>موظف</span>
        @elseif ($role->name == 'Admin')
        <span>ادمن</span>
        @elseif ($role->name == 'client')
        <span>زبون</span>
        @endif
</h3>

        </div>
    </div>
    <br>
    <br>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row form-group">
            <h3><strong>صلاحيات:</strong></h3>
            <br/>
            @foreach($permission as $value)
               <div class="col-md-3">
                <h6>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                    <strong> {{ $value->name }}</strong> </h6>
               </div>
            <br/>
            @endforeach
        </div>
    </div>
    <br>
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
