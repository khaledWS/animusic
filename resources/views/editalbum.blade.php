@extends('layout.index')
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
                action="{{route('album.update',$album->id)}}" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <!--begin::Input group-->
                <div class="mb-7">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline mb-3" data-kt-image-input="true"
                        style="background-image: url({{asset('assets/media/svg/files/dark/blank-image-dark.svg')}})">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px"
                            style="background-image: url({{asset($album->getImage())}})"></div>
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
                        value="{{$album->title}}" />
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
                    <select value="{{$album->title_id}}" name="title_id" aria-label="Select a title"
                        data-minimum-results-for-search="Infinity" data-control="select2"
                        data-placeholder="Select title" class="form-select form-select-solid">
                        <option value=""></option>
                        @isset($titles)
                        @foreach ($titles as $title)
                        <option value="{{$title->id}}" @selected($album->title_id == $title->id)>{{$title->title}}
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
                            <input type="text" name="number_of_tracks" class="form-control form-control-solid"
                                placeholder="title" value="{{$album->number_of_tracks}}" />
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
                            <input type="text" name="order" class="form-control form-control-solid" placeholder="title"
                                value="{{$album->order}}" />
                            <!--end::Input-->
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
                            <select name="composer" aria-label="Select a title"
                                data-minimum-results-for-search="Infinity" data-control="select2"
                                data-placeholder="Select title" class="form-select form-select-solid"
                                value="{{$album->composer}}">
                                <option value=""></option>
                                <option value="Hiroyuki Sawano" {{$album->composer=='Hiroyuki Sawano' ? 'selected' : ''
                                    }}>Hiroyuki Sawano</option>
                                <option value="Kohta Yamamoto" {{$album->composer=='Kohta Yamamoto' ? 'selected' : '' }}>
                                    Kohta Yamamoto</option>
                                <option value="Hiroyuki Sawano/Kohta Yamamoto"
                                    {{$album->composer=='Hiroyuki Sawano/Kohta Yamamoto' ? 'selected' : '' }}>Hiroyuki
                                    Sawano/Kohta Yamamoto</option>
                                <option value="Hiroyuki Sawano/Linked Horizon"
                                    {{$album->composer=='Hiroyuki Sawano/Linked Horizon' ? 'selected' : '' }}>Hiroyuki
                                    Sawano/Linked Horizon</option>
                            </select>
                            <!--end::Input-->
                            @error('composer')
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
                                    value="{{$album->date_released}}" />
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
                                placeholder="album length" value="{{$album->album_length}}" />
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
                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700 pl-5">active
                        </span>
                        <input class="form-check-input" name="active" type="checkbox"@checked($album->isActive()) value="{{$album->active}}" />
                    </label>
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
    $("#kt_daterangepicker_3").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"),10)
    }, function(start, end, label) {
    }
);
$("#kt_daterangepicker_4").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"),10)
    }, function(start, end, label) {
    }
);
</script>
@endsection
