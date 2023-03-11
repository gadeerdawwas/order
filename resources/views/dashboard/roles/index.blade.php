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



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    @can('إضافة صلاحيات')
                                        <div class="flex-grow-1">
                                            <a href="{{ route('admin.roles.create') }}" class="btn btn-info add-btn">إضافة
                                                صلاحية</a>
                                        </div>
                                    @endcan


                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->


                    <div class="col-xxl-7">
                        <div class="card" id="companyList">

                            <div class="card-body">
                                <div>
                                    <div class="table-responsive table-card mb-3">
                                        <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        #
                                                    </th>
                                                    <th class="sort" data-sort="name" scope="col">الاسم</th>


                                                    <th scope="col">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">

                                                @foreach ($roles as $key => $role)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>
                                                            @if ($role->name == 'employ')
                                                                <span>موظف</span>
                                                            @elseif ($role->name == 'Admin')
                                                                <span>ادمن</span>
                                                            @elseif ($role->name == 'client')
                                                                <span>زبون</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @can('تعديل صلاحيات')
                                                                <a href="{{ route('admin.roles.show', $role->id) }}"><i
                                                                        class="ri-eye-fill fs-16"></i></a>

                                                                <a class="edit-item-btn text-success"
                                                                    href="{{ route('admin.roles.edit', $role->id) }}"
                                                                    title="edit"><i class="ri-pencil-fill fs-16"></i></a>
                                                            @endcan
                                                            @can('حذف صلاحيات')
                                                                <a class="remove-item-btn text-danger" data-bs-toggle="modal"
                                                                    href="#deleteRecordModal{{ $role->id }}">
                                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                </a>
                                                            @endcan
                                                            <div class="modal fade zoomIn"
                                                                id="deleteRecordModal{{ $role->id }}" tabindex="-1"
                                                                aria-labelledby="deleteRecordLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close"
                                                                                id="deleteRecord-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body p-5 text-center">
                                                                            {{-- <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                trigger="loop"
                                                                colors="primary:#405189,secondary:#f06548"
                                                                style="width:90px;height:90px"></lord-icon> --}}
                                                                            <form
                                                                                action="{{ route('admin.roles.destroy', $role->id) }}"
                                                                                method="post">
                                                                                @method('delete')
                                                                                @csrf
                                                                                <div class="mt-4 text-center">
                                                                                    <h4 class="fs-semibold">هل أنت متأكد من
                                                                                        عملية
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
                                                                                            id="delete-record">بتأكيد
                                                                                            !!</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            {{-- {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                 {!! Form::submit('Delete', ['class' => 'edit-item-btn']) !!}
                                             {!! Form::close() !!} --}}




                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $roles->render() !!}
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
                                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content border-0">
                                            <div class="modal-header bg-soft-info p-3">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form class="{{ route('admin.emploies.store') }}" method="post"
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
                                                                            <img src="{{ asset('assets/images/users/multi-user.jpg') }}"
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
