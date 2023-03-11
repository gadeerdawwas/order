@extends('dashboard.include.layout')

@push('style')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



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
                            <h4 class="mb-sm-0"> إضافة طلبية </h4>

                            <div class="page-title-left">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">طلبيةات</a></li>
                                    <li class="breadcrumb-item active">إضافة طلبية </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('sweetalert::alert')
                <form action="{{ route('admin.orders.store') }}" method="POST" enctype="multipart/form-data">

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
                                                                <label class="form-label" for="product-title-input">إسم
                                                                    منتج</label>
                                                                <input type="text" class="form-control" name="name[]"
                                                                    required id="product-title-input"
                                                                    placeholder="ادخل اسم منتج">
                                                            </div>


                                                            <div class="mb-3">
                                                                <label class="form-label" for="product-title-input">رابط
                                                                    الطلبية </label>
                                                                <input type="text" class="form-control" name="link[]"
                                                                    required id="product-title-input"
                                                                    placeholder="ادخل اسم رابط الطلبية ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="product-title-input">صورة
                                                                    الطلبية </label>
                                                                <input type="file" class="form-control" name="image[]"
                                                                    id="product-title-input">
                                                            </div>


                                                            <div class="mb-3">
                                                                <label class="form-label" for="product-title-input">وصف
                                                                    الطلبية </label>
                                                                <textarea name="description[]" class="form-control" required id="" cols="5" rows="5"></textarea>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="form-label" for="product-title-input">
                                                                        العدد</label>
                                                                    <input type="number" class="form-control qty1"
                                                                        name="number[]" required id="product-title-input"
                                                                        placeholder="ادخل  العدد">
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label class="form-label" for="product-title-input">
                                                                        المقاس </label>
                                                                    <input type="text" class="form-control"
                                                                        name="size[]" required id="product-title-input"
                                                                        placeholder="ادخل  المقاس ">
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label class="form-label" for="product-title-input"> نوع
                                                                        الشحن </label>
                                                                    <select class="form-select " name="Shipping_type[]"
                                                                        required>
                                                                        <option value="جوي">جوي</option>
                                                                        <option value="بحري">بحري</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="form-label" for="product-title-input"> سعر
                                                                        طلبية </label>
                                                                    <input type="number qty1" class="form-control"
                                                                        name="price[]" required id="product-title-input"
                                                                        placeholder="ادخل  العدد">
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label class="form-label" for="product-title-input"> سعر
                                                                        الشحن </label>
                                                                    <input type="number qty1" class="form-control"
                                                                        name="price_Shipping[]" required
                                                                        id="product-title-input"
                                                                        placeholder="ادخل  المقاس ">
                                                                </div>

                                                            </div>



                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-3">
                                                                    <div class="form-group">
                                                                        <label>&nbsp;</label>
                                                                        <button type="button" class="btn btn-success btn-sm btn-add">
                                                            <i class="fa fa-plus" aria-hidden="true">+</i>
                                                          </button>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="product-title-input">إسم
                                                                    لزبون</label>



                                                               <select class="myselect" style="width:500px;" name="user_id">

                                                                @if (auth()->user()->role == 2)
                                                                <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>

                                                                @else
                                                                @foreach ($user as $u)
                                                                <option value="{{ $u->id }}">{{ $u->name }}</option>

                                                                @endforeach

                                                                @endif
                                                            </select>


                                                                </div>
                                                                {{-- <script type="text/javascript">
                                                                $(".chosen").chosen();
                                                                </script> --}}
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

<script type="text/javascript">
    $(".myselect").select2();
</script>
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


    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/ecommerce-product-create.init.js') }}"></script>
@endpush
