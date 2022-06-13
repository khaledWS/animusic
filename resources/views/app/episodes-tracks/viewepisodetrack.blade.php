@extends('layout.index')
@section('title')
view episode track
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>{{'('.$episodeTrack->id.'): '.$episodeTrack->episode_track_title}}</h2>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="tool-bar">
                <a href="{{route('episodeTrack.edit',$episodeTrack->id)}}"><button data-kt-contacts-type="edit"
                        class="btn btn-light me-3 btn-active-info">Edit</button></a>
                <a><button name="delete" data-kt-contacts-type="delete"
                        class="btn btn-light me-3 btn-active-danger">Delete</button></a>
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <div class="col">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>type</span>
                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Enter the contact's email."></i> --}}
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="title"
                            value="{{$episodeTrack->typeString()}}">
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                <div class="col">
                     <!--begin::Input group-->
                     <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>status</span>
                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Enter the contact's email."></i> --}}
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="status"
                            value="{{$episodeTrack->statusString()}}">
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
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
                            <span>Title</span>
                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Enter the contact's email."></i> --}}
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="title"
                            value="{{$episodeTrack->episode_track_title}}">
                        <!--end::Input-->
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
                            <span class="required">episode</span>
                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Enter the contact's email."></i> --}}
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="episode_id"
                            value="{{$episodeTrack->episode->series_number}}: {{$episodeTrack->episode->title}}">
                        <!--end::Input-->
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
                            <span class="required">track</span>
                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Enter the contact's email."></i> --}}
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="track_id"
                        @isset($episodeTrack->track->title)
                        value="{{$episodeTrack->track->title}}"
                        @endisset
                        >
                        <!--end::Input-->
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
                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Enter the contact's email."></i> --}}
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="start" class=" form-control form-control-solid" placeholder="title"
                            value="{{$episodeTrack->displayFormatStart()}}" />
                        <!--end::Input-->
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
                            <span class="required">end time</span>
                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Enter the contact's email."></i> --}}
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="end" class=" form-control form-control-solid" placeholder="title"
                            value="{{$episodeTrack->displayFormatEnd()}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
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
                <textarea class="form-control form-control-solid" name="notes">{{$episodeTrack->notes}}</textarea>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Separator-->
            <div class="separator mb-6"></div>
            <!--end::Separator-->
            <!--begin::Action buttons-->
            <div class="d-flex justify-content-end">
            </div>
            <!--end::Action buttons-->
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

$.each($('input'), function (indexInArray, valueOfElement) {
   $(valueOfElement).addClass('bg-black');
   $(valueOfElement).attr('disabled', 'true');
});
$.each($('input[type=checkbox]'), function (indexInArray, valueOfElement) {
   $(valueOfElement).removeClass('bg-black');
   $(valueOfElement).attr('disabled', 'true');
});

$.each($('textarea'), function (indexInArray, valueOfElement) {
   $(valueOfElement).addClass('bg-black');
   $(valueOfElement).attr('disabled', 'true');
});
</script>
@endsection
