@extends('dashboard.include.layout')

@push('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <link href="{{ asset('assets/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"> إضافة مصاريف </h4>

                            <div class="page-title-left">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">إضافة مصاريف </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('sweetalert::alert')

                <form action="{{ route('admin.costs.store') }}" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-lg-10" data-repeater-list="List_size_prise">
                            @csrf

                            <div class="card">


                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">

                                            <div class="row targetDiv" id="div0">
                                                <div class="col-md-12">

                                                    <div id="group1" class="fvrduplicate">
                                                        <div class="row entry">




                                                            <div class="mb-3">
                                                                <label class="form-label" for="product-title-input">المبلغ
                                                                    </label>
                                                                <input type="text" class="form-control" name="costs"
                                                                    required id="product-title-input"
                                                                    placeholder="ادخل المبلغ">
                                                            </div>


                                                            <div class="mb-3">
                                                                <label class="form-label" for="product-title-input">
                                                                    وصف  </label>
                                                                    <textarea name="note"  class="form-control" id="" cols="5" rows="5"></textarea>

                                                            </div>







                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- end tab-pane -->


                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->
                                </div>
                                <!-- end card body -->

                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-success w-sm">حفظ</button>
                            </div>



                        </div>



                        <!-- end col -->

                    </div>
                    <!-- end row -->
                </form>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
@endsection

@push('script')
    <script>
        $(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();
                var controlForm = $(this).closest('.fvrduplicate'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<i class="fa fa-minus" aria-hidden="true">-</i>');
            }).on('click', '.btn-remove', function(e) {
                $(this).closest('.entry').remove();
                return false;
            });
        });
    </script>

    <script src="{{ asset('assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/ecommerce-product-create.init.js') }}"></script>
@endpush
