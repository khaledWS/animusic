@extends('layout.index')
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Add new Entry</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="kt_ecommerce_settings_general_form" class="form" method="POST" action="{{route('episode.create-track')}}" autocomplete="off">
                @csrf
                <!--begin::Input group-->
                <div class="row mb-7">
                    <div class="col-md-1">
                        <!--begin::Option-->
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                            <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700 pl-5">active
                            </span>
                            <input class="form-check-input" name="active" type="checkbox" checked="checked"  />
                        </label>
                        <!--end::Option-->
                        @error('active')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <!--begin::Option-->
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                            <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700 pl-5">unknown
                            </span>
                            <input class="form-check-input" name="unknown" isChecked="false" type="checkbox"  />
                        </label>
                        <!--end::Option-->
                        @error('unknown')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <!--begin::Option-->
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                            <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700 pl-5">new
                            </span>
                            <input class="form-check-input" name="new" isChecked="false" type="checkbox"  />
                        </label>
                        <!--end::Option-->
                        @error('new')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <!--end::Input group-->
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">episode</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's email."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="episode_id" aria-label="Select a episode" data-control="select2"
                                data-placeholder="Select episode" class="form-select form-select-solid">
                                <option value=""></option>
                                @isset($episodes)
                                    @foreach ($episodes as $episode)
                                    <option @selected(old('episode_id') == $episode->id) value="{{$episode->id}}"><strong class="">{{$episode->series_number}}:</strong> {{$episode->title}}</option>
                                    @endforeach
                                @endisset
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        @error('episode_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">track</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's email."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="track_id" aria-label="Select a track" data-control="select2"
                                data-placeholder="Select track" class="form-select form-select-solid">
                                <option value=""></option>
                                @isset($tracks)
                                @foreach ($tracks as $track)
                                <option @selected(old('track_id') == $track->id) value="{{$track->id}}">{{$track->title}}</option>
                                @endforeach
                            @endisset
                            </select>
                            <!--end::Input-->
                            @error('track_id')
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
                                <span class="required">start time</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="start" class=" form-control form-control-solid"
                                placeholder="title" value="{{old('start')}}"/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        @error('start')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">end time</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's email."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="end" class=" form-control form-control-solid"
                                placeholder="title" value="{{old('end')}}"/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        @error('end')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>notes</span>
                        {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                            title="Enter the contact's city of residence (optional)."></i> --}}
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <textarea class="form-control form-control-solid" name="notes">{{old('notes')}}</textarea>
                    <!--end::Input-->
                    @error('notes')
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

// $('input[name="unknown"]').on('change', function (){
//     if( $(this).attr('isChecked') == 'true'){
//         $(this).attr('isChecked', 'false')
//         $('select[name="episode_id"]').removeAttr('disabled');
//         $('select[name="track_id"]').removeAttr('disabled');

//     }
//     else{
//         $(this).attr( "isChecked", 'true' );
//         $('select[name="episode_id"]').attr('disabled','disabled');
//         $('select[name="track_id"]').attr('disabled','disabled');
//     }
// });
//     $('input[name="new"]').on('change', function (){
//     if( $(this).attr('isChecked') == 'true'){
//         $(this).attr('isChecked', 'false');
//         enable_disable();
//         // $('select[name="episode_id"]').removeAttr('disabled');
//         // $('select[name="track_id"]').removeAttr('disabled');

//     }
//     else{
//         $(this).attr( "isChecked", 'true' );
//         enable_disable();
//         // $('select[name="episode_id"]').attr('disabled','disabled');
//         // $('select[name="track_id"]').attr('disabled','disabled');
//     }
// });

function enable_disable()
{
    if(($('input[name="new"]').attr('isChecked') == 'false') && ($('input[name="unknown"]').attr('isChecked') == 'false')){
        $('select[name="episode_id"]').removeAttr('disabled');
        $('select[name="track_id"]').removeAttr('disabled');
    }
    else{
        $('select[name="episode_id"]').attr('disabled','disabled');
        $('select[name="track_id"]').attr('disabled','disabled');
    }
    }

</script>
@endsection
