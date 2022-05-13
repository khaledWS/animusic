@extends('layout.index')
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>{{'('.$album->id.'): '.$album->title}}</h2>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="tool-bar">
                <a href="{{route('album.edit',$album->id)}}"><button data-kt-contacts-type="edit"
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
            <div class="mb-7">
                <img src="{{$album->getImage()}}" width="300" alt="">
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold form-label mt-3">
                    <span>Title</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input readonly type="text" name="title" class="form-control form-control-solid" placeholder="title"
                    value="{{$album->title}}" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold form-label mt-3">
                    <span>made for</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input readonly type="text" name="title_id" class="form-control form-control-solid" placeholder="title"
                    value="{{$album->parentTitle->title}}" />
                <!--end::Input-->
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
                        <input readonly type="text" name="number_of_tracks" class="form-control form-control-solid"
                            placeholder="title" value="{{$album->number_of_tracks}}" />
                        <!--end::Input-->
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
                        <input readonly type="text" name="order" class="form-control form-control-solid"
                            placeholder="title" value="{{$album->order}}" />
                        <!--end::Input-->
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
                            <span>Composer</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input readonly type="text" name="composer" class="form-control form-control-solid"
                            placeholder="composer" value="{{$album->composer}}" />
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
                            <span>release date</span>
                        </label>
                        <!--end::Label-->
                        <div class="w-100">
                            <input class="form-control form-control-solid" name="date_released"
                                placeholder="Pick date rage" value="{{$album->composer}}" />
                        </div>
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
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="album_length" class="form-control form-control-solid"
                            placeholder="album length" value="{{$album->album_length}}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Option-->
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700 pl-5">active
                    </span>
                    <input readonly class="form-check-input" name="active" type="checkbox" @checked($album->isActive())
                    value="{{$album->active}}" />
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
</script>
@endsection
