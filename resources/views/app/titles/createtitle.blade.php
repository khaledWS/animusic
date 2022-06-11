@extends('layout.index')
@section('title')
New Title
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Add new Title</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="kt_ecommerce_settings_general_form" class="form" method="POST" action="{{route('title.create')}}"
                enctype="multipart/form-data" autocomplete="off">
                @csrf
                <!--begin::Input group-->
                <div class="mb-7">
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                        style="background-image: url({{asset('assets/media/svg/files/dark/blank-image-dark.svg')}})">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Thumbnail">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg .webp" />
                            <input type="hidden" name="thumbnail_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Thumbnail">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Thumbnail">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Remove-->
                        @error('thumbnail')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Image input-->

                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span class="required">Title</span>
                        {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                            title="Enter the contact's name."></i> --}}
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="title" class="form-control form-control-solid" placeholder="title"
                        value="{{old('title')}}" />
                    <!--end::Input-->
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Input group-->
                <!--begin::row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <div class="col">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>number of episodes</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's city of residence (optional)."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" name="number_of_episodes" class="form-control form-control-solid"
                                placeholder="number of episodes" value="{{old('number_of_episodes')}}" />
                            <!--end::Input-->
                            @error('number_of_episodes')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>Order on main Page</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's city of residence (optional)."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="order" type="number" name="order" class="form-control form-control-solid"
                                placeholder="order" autocomplete="off" value="{{old('order')}}" />
                            <!--end::Input-->
                            <span class="input-info"></span>
                            @error('order')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <!--end::row-->
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">Type</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's email."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="type" aria-label="Select a type" data-minimum-results-for-search="Infinity"
                                data-control="select2" data-placeholder="Select type"
                                class="form-select form-select-solid">
                                <option value=""></option>
                                <option @selected(old('type')=='canon' ) value="canon">canon</option>
                                <option @selected(old('type')=='recap' ) value="recap">recap</option>
                                <option @selected(old('type')=='spinoff' ) value="spinoff">spinoff</option>
                                <option @selected(old('type')=='filler' ) value="filler">filler</option>
                                <option @selected(old('type')=='extra' ) value="extra">extra</option>
                            </select>
                            <!--end::Input-->
                            @error('type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>start date</span>
                            </label>
                            <!--end::Label-->
                            <div class="w-100">
                                <input class="form-control form-control-solid" name="start_date" placeholder="Pick date"
                                    id="kt_daterangepicker_3" value="{{old('start_date')}}" />
                            </div>
                        </div>
                        <!--end::Input group-->
                        @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>Format</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's company name (optional)."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="format" aria-label="Select a format"
                                data-minimum-results-for-search="Infinity" data-control="select2"
                                data-placeholder="Select format" class="form-select form-select-solid">
                                <option value=""></option>
                                <option @selected(old('format')=='tv' ) value="tv">TV</option>
                                <option @selected(old('format')=='movie' ) value="movie">movie</option>
                                <option @selected(old('format')=='oda' ) value="oda">ODA</option>
                            </select>
                            <!--end::Input-->
                            @error('format')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>end date</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter any additional notes about the contact (optional)."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" name="end_date" placeholder="Pick date"
                                id="kt_daterangepicker_4" value="{{old('end_date')}}" />
                            <!--end::Input-->
                            @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Option-->
                    <div class="form-check form-check-custom form-check-solid">
                        <input name="active" class="form-check-input" type="checkbox" @checked(old('active'))
                            id="flexCheckDefault" />
                        <label class="form-check-label" for="flexCheckDefault">
                            Active
                        </label>
                    </div>
                    <!--end::Option-->

                </div>
                <!--end::Input group-->
                @error('active')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <!--begin::Separator-->
                <div class="separator mb-6"></div>
                <!--end::Separator-->
                <!--begin::Action buttons-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Cancel</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">Save</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Action buttons-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Contacts-->
</div>
@endsection
@section('js')
<script>
    //     $("#kt_daterangepicker_3").daterangepicker({
//         singleDatePicker: true,
//         showDropdowns: true,
//         minYear: 1901,
//         maxYear: parseInt(moment().format("YYYY"),10)
//     }, function(start, end, label) {
//     }
// );
// $("#kt_daterangepicker_4").daterangepicker({
//         singleDatePicker: true,
//         showDropdowns: true,
//         minYear: 1901,
//         maxYear: parseInt(moment().format("YYYY"),10)
//     }, function(start, end, label) {
//     }
// );
$("#kt_daterangepicker_3").flatpickr({
    dateFormat: "m/d/Y",
});
$("#kt_daterangepicker_4").flatpickr({
    dateFormat: "m/d/Y",
});
$("#order").keyup(function() {
    var value = $(this).val();
    var textInfo = $('#order').next('.input-info');
    if(value == ''){
            textInfo.html('');
            return ;
    };
 timeout = setTimeout(function(){
    $.ajax({
        type: "POST",
        url: "/title/checkorder",
        headers : {
            'X-CSRF-TOKEN' : "{{ csrf_token()}}"
        },
        data: {
          'order': value
        },
        dataType: "text",
        success: function(response) {
          // hide image
          response = JSON.parse(response);
          console.log(response.hasOwnProperty('result'));
          if(response.result == 1){
            textInfo.removeClass();
            textInfo.html('This Order is avilable');
            textInfo.addClass('text-success');
            textInfo.addClass('input-info');
          }
          else if(response.result == 0){
            textInfo.removeClass();
            textInfo.html('This Order is taken by [ '+response.data+' ]');
            textInfo.addClass('text-info');
            textInfo.addClass('input-info');
          }
          else{
            textInfo.removeClass();
            textInfo.html('invalid input');
            textInfo.addClass('text-danger');
            textInfo.addClass('input-info');
          }
        //   $(#span_result .loader).hide();

        //   if (value == $(that).val()) {
        //     $("#span_result").html(html)
          }
        })
    }, 400);
});



</script>
@endsection
