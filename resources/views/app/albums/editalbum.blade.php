@extends('layout.index')
@section('title')
    Edit Album
@endsection
@section('content')
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Contacts-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Edit Album</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Form-->
                <form id="kt_ecommerce_settings_general_form" class="form" method="POST"
                    action="{{ route('album.update', $album->id) }}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <input type="hidden" name="id" value="{{ $album->id }}">
                    <!--begin::Input group-->
                    <div class="mb-7">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline mb-3" data-kt-image-input="true"
                            style="background-image: url({{ asset('assets/media/svg/files/dark/blank-image-dark.svg') }})">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-150px h-150px"
                                style="background-image: url({{ asset($album->getImage()) }})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Thumbnail">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="thumbnail_remove" />
                                <!--end::Inputs-->
                            </label>
                            @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                            value="{{ $album->title }}" />
                        <!--end::Input-->
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>was made for</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select value="{{ $album->title_id }}" name="title_id" aria-label="Select a title"
                            data-minimum-results-for-search="Infinity" data-control="select2"
                            data-placeholder="Select title" class="form-select form-select-solid">
                            <option value=""></option>
                            @isset($titles)
                                @foreach ($titles as $title)
                                    <option value="{{ $title->id }}" @selected($album->title_id == $title->id)>{{ $title->title }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        <!--end::Input-->
                        @error('title_id')
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
                                    <span>Number of Tracks</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="number_of_tracks" class="form-control form-control-solid"
                                    placeholder="title" value="{{ $album->number_of_tracks }}" />
                                <!--end::Input-->
                                @error('number_of_tracks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span>order on main page</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="order" type="number" name="order" class="form-control form-control-solid"
                                    placeholder="order" autocomplete="off" value="{{ $album->order }}" />
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
                                    <span class="required">Composer</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's email."></i> --}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="composer[]" aria-label="Select a title"
                                    data-minimum-results-for-search="Infinity" data-control="select2"
                                    data-placeholder="Select title" class="form-select form-select-solid"
                                    value="{{ $album->composer }}" multiple="multiple">
                                    <option value=""></option>
                                    <option selected value="">bbbb</option>
                                    @foreach ($composers as $composer)
                                        <option @selected(in_array($composer->id, $album->getComposers())) value="{{ $composer->id }}">
                                            {{ $composer->en_name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                                @error('composer[]')
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
                                    <span class="required">release date</span>
                                </label>
                                <!--end::Label-->
                                <div class="w-100">
                                    <input class="form-control form-control-solid" name="date_released"
                                        placeholder="Pick date rage" id="kt_daterangepicker_3"
                                        value="{{ $album->date_released }}" />
                                </div>
                                @error('date_released')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
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
                                    <span>Album length</span>
                                    <span>in seconds</span>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's company name (optional)."></i> --}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="album_length" class="form-control form-control-solid"
                                    placeholder="album length" value="{{ $album->album_length }}" />
                                <!--end::Input-->
                                @error('album_length')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->

                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Option-->
                        <div class="form-check form-check-custom form-check-solid">
                            <input name="active" class="form-check-input" type="checkbox" @checked($album->isActive())
                                id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Active
                            </label>
                        </div>
                        <!--end::Option-->
                        @error('active')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Input group-->
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
        $("#kt_daterangepicker_3").flatpickr({
            altField: "m/d/Y",
            altFormat: "yyyy-mm-dd"
        });
        $("#kt_daterangepicker_4").flatpickr({
            altField: "m/d/Y",
            altFormat: "yyyy-mm-dd"
        });
        $("#order").keyup(function() {
            var value = $(this).val();
            var textInfo = $('#order').next('.input-info');
            if (value == '') {
                textInfo.html('');
                return;
            };
            timeout = setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "/album/checkorder",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'order': value,
                        'album': $("[name=id]").val()
                    },
                    dataType: "text",
                    success: function(response) {
                        // hide image
                        response = JSON.parse(response);
                        console.log(response.hasOwnProperty('result'));
                        if (response.result == 1) {
                            textInfo.removeClass();
                            textInfo.html('This Order is avilable');
                            textInfo.addClass('text-success');
                            textInfo.addClass('input-info');
                        } else if (response.result == 0) {
                            textInfo.removeClass();
                            textInfo.html('This Order is taken by [ ' + response.data + ' ]');
                            textInfo.addClass('text-info');
                            textInfo.addClass('input-info');
                        } else if (response.result == 2) {
                            textInfo.removeClass();
                            textInfo.html('this order already belong to this');
                            textInfo.addClass('text-success');
                            textInfo.addClass('input-info');
                        } else {
                            textInfo.removeClass();
                            textInfo.html('invalid input');
                            textInfo.addClass('text-danger');
                            textInfo.addClass('input-info');
                        }
                        //   $(#span_result .loader).hide();

                        //   if (value == $(that).val()) {
                        //     $("#span_result").html(html)

                    }
                }, 400);
            });
        });

        var array = [];
        @foreach ($album->getComposersId() as $id)
            array.push("{{ $id }}")
        @endforeach
        $('[name="composer[]"]').val(array);
        $('#mySelect2').trigger('change');
    </script>
@endsection
