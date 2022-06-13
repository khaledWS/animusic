@extends('layout.index')
@section('title')
New Episode
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Add new Episode</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="kt_ecommerce_settings_general_form" class="form" method="POST"
                action="{{route('episode.create')}}">
                @csrf
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span class="required">English Title</span>
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
                <!--begin::Input group-->
                <div class="fv-row mb-7 row">
                    <div class="col">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>romaji Title</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="romaji_title" class="form-control form-control-solid"
                            placeholder="title" value="{{old('romaji_title')}}" />
                        <!--end::Input-->
                        @error('romaji_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>JP title</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="jp_title" class="form-control form-control-solid"
                            placeholder="jp title" value="{{old('romaji_title')}}" />
                        <!--end::Input-->
                        @error('jp_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>part of </span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="title_id" aria-label="Select a title" data-minimum-results-for-search="Infinity"
                        data-control="select2" data-placeholder="Select title" class="form-select form-select-solid">
                        <option value=""></option>
                        @foreach ($titles as $title)
                        <option @selected($title->id == old('title_id')) value="{{$title->id}}">{{$title->title}}
                        </option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                    @error('title_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row row mb-7">
                    <div class="col-md-4">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>episode number in this season</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" name="season_number" class="form-control form-control-solid"
                            placeholder="season number" value="{{old('season_number')}}" />
                        <!--end::Input-->
                        @error('season_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">episode series number</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's email."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" name="series_number" class="form-control form-control-solid"
                                placeholder="series number" value="{{old('series_number')}}" />
                            <!--end::Input-->
                            @error('series_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">episode length</span>
                            </label>
                            <!--end::Label-->
                            <input type="numner" name="episode_length" class="form-control form-control-solid"
                                placeholder="episodelength" value="{{old('episode_length')}}" />
                            @error('episode_length')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->

                </div>
                <!--end::Input group-->
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
