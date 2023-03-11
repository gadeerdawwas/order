@extends('dashboard.include.layout')


@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">



                <div class="row">

                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card mt-xxl-n5">

                            <div class="card-body p-4">
                                <div class="tab-content">
                                    <div class="flex-grow-1">
                                        <h2 class="">تغير كلمة المرور     </h2>
                                    </div>
                                    <br>
{{--
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                @include('sweetalert::alert')

                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                            <form action="{{ route('admin.passwordupdate') }}" method="post">


                                            <div class="row">

                                                    @csrf
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="project-title-input">كلمة المرور
                                                            </label>
                                                            <input type="text" class="form-control @error('password') is-invalid @enderror"
                                                                id="project-title-input" name="password" required
                                                                placeholder="ادخل كلمة المرور ">


                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="project-title-input">تأكيد كلمة المرور
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="project-title-input" name="password_confirmation" required
                                                                placeholder="تأكيد كلمة المرور">

                                                        </div>
                                                    </div>



                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="submit" class="btn btn-primary">تغير  كلمة المرور </button>

                                                        </div>
                                                    </div>

                                            </div>
                                            <!--end row-->


                                        </form>
                                    </div>
                                    <!--end tab-pane-->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div><!-- End Page-content -->


    </div>
@endsection
