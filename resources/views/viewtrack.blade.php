@extends('layout.index')
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>{{'('.$track->id.'): '.$track->title}}</h2>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="tool-bar">
                <a href="{{route('track.edit',$track->id)}}"><button data-kt-contacts-type="edit"
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
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold form-label mt-3">
                    <span>Title</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input readonly type="text" name="title" class="form-control form-control-solid"
                    value="{{$track->title}}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row row mb-7">
                <div class="col">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>album</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input readonly type="text" name="album_id" class="form-control form-control-solid"
                        value="{{$track->getAlbum()}}" />
                    <!--end::Input-->
                </div>
                <div class="col">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>disk</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="disk" class="form-control form-control-solid" placeholder="disk"
                        value="{{$track->disk}}" />
                    @error('disk')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <!--end::Input-->
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
                            <span>length in seconds</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input readonly type="text" name="length" class="form-control form-control-solid"
                            value="{{$track->length}}" />
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
                            <span>Order in Album</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input readonly type="text" name="order" class="form-control form-control-solid"
                            value="{{$track->order}}" />
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
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea readonly class="form-control form-control-solid" name="notes">{{$track->notes}}</textarea>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Option-->
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700 pl-5">active
                    </span>
                    <input readonly class="form-check-input" name="active" type="checkbox" @checked($track->isActive())
                    value="{{$track->active}}" />
                </label>
                <!--end::Option-->

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
    $.each($('input'), function (indexInArray, valueOfElement) {
   $(valueOfElement).addClass('bg-black');
});
$.each($('input[type=checkbox]'), function (indexInArray, valueOfElement) {
   $(valueOfElement).removeClass('bg-black');
});
$.each($('textarea'), function (indexInArray, valueOfElement) {
   $(valueOfElement).addClass('bg-black');
});
</script>
@endsection
