@extends('layout.index')
@section('title')
add track to episode
@endsection
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
            <form id="kt_ecommerce_settings_general_form" class="form" method="POST"
                action="{{route('episode.create-track')}}" autocomplete="off">
                @csrf
                <!--begin::Input group-->
                <div class="row">
                    <div class="col">
                        <h5 class="mb-5">track type</h5>
                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" @checked(old('type')) name="type" type="radio" value="0"
                                    id="soundtrack" />
                                <label class="form-check-label" for="soundtrack">
                                    soundtrack
                                </label>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" @checked(old('type')) name="type" type="radio" value="1"
                                    id="Openning" />
                                <label class="form-check-label" for="Openning">
                                    Openning
                                </label>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" @checked(old('type')) name="type" type="radio" value="2"
                                    id="Ending" />
                                <label class="form-check-label" for="Ending">
                                    Ending
                                </label>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" @checked(old('type')) name="type" type="radio" value="3"
                                    id="Preview" />
                                <label class="form-check-label" for="Preview">
                                    Preview
                                </label>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" @checked(old('type')) name="type" type="radio" value="4"
                                    id="midcard" />
                                <label class="form-check-label" for="midcard">
                                    Mid card
                                </label>
                            </div>
                        </div>


                    </div>
                    <div class="col">
                        <h5 class="mb-5">track status</h5>
                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" @selected(old('status')) name="status" type="radio"
                                    value="0" id="known" />
                                <label class="form-check-label" for="known">
                                    Known track
                                </label>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" @selected(old('status')) name="status" type="radio"
                                    value="1" id="unknown" />
                                <label class="form-check-label" for="unknown">
                                    Unknown Track
                                </label>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" @selected(old('status')) name="status" type="radio"
                                    value="2" id="new" />
                                <label class="form-check-label" for="new">
                                    New Track
                                </label>
                            </div>
                        </div>
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
                                data-placeholder="Select episode" class="form-select form-select-solid" data-allow-clear="true">
                                <option value=""></option>
                                @isset($episodes)
                                @foreach ($episodes as $episode)
                                <option @selected(old('episode_id')==$episode->id) value="{{$episode->id}}"><strong
                                        class="">{{$episode->series_number}}:</strong> {{$episode->title}}</option>
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
                                data-placeholder="Select track" class="form-select form-select-solid" data-allow-clear="true">
                                <option value=""></option>
                                @isset($tracks)
                                @foreach ($tracks as $track)
                                <option @selected(old('track_id')==$track->id)
                                    value="{{$track->id}}">{{$track->title}}
                                </option>
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
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="like this   24:12"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="start" class=" form-control form-control-solid" placeholder="title"
                                value="{{old('start')}}" />
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
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="like this   24:12"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="end" class=" form-control form-control-solid" placeholder="title"
                                value="{{old('end')}}" />
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
