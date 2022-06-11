@extends('layout.index')
@section('title')
{{$title->title}}
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>{{$title->id.' :'.$title->title}}</h2>
            </div>
            <!--end::Card title-->
            <div class="tool-bar">
                <a href="{{route('title.edit',$title->id)}}"><button  data-kt-contacts-type="edit" class="btn btn-light me-3 btn-active-info">Edit</button></a>
                <a ><button name="delete" data-kt-contacts-type="delete" class="btn btn-light me-3 btn-active-danger">Delete</button></a>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            {{-- <form id="kt_ecommerce_settings_general_form" class="form" method="POST" action="{{route('title.create')}}" enctype="multipart/form-data">
                @csrf --}}
                <!--begin::Input group-->
                <div class="mb-7">
                    {{-- <!--begin::Image input-->
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
                            <input readonly type="file" name="thumbnail" accept=".png, .jpg, .jpeg, .webp" />
                            <input readonly type="hidden" name="thumbnail_remove" />
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
                    <!--end::Image input--> --}}
                    <img src="{{$title->getImage()}}" width="300" alt="">

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
                    <input readonly value="{{$title->title}}" type="text" name="title" class="form-control form-control-solid bg-black" placeholder="title" />
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
                            <input readonly type="text" name="number_of_episodes" class="form-control form-control-solid bg-black"
                                placeholder="number of episodes" value="{{$title->number_of_episodes}}" />
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
                            <input readonly type="text" name="order" class="form-control form-control-solid bg-black"
                                placeholder="order" value="{{$title->order}}" />
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
                                <span class="required">Type</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's email."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input readonly value="{{$title->type}}" type="text" name="number_of_episodes" class="form-control form-control-solid bg-black"
                        placeholder="number of episodes" />
                            {{-- <select name="type" aria-label="Select a type" data-minimum-results-for-search="Infinity"
                                data-control="select2" data-placeholder="Select type"
                                class="form-select form-select-solid">
                                <option value=""></option>
                                <option value="canon">canon</option>
                                <option value="recap">recap</option>
                                <option value="spinoff">spinoff</option>
                                <option value="filler">filler</option>
                                <option value="extra">extra</option>
                            </select> --}}
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
                                <span >start date</span>
                            </label>
                            <!--end::Label-->
                            <div class="w-100">
                                <input readonly value="{{$title->start_date}}" class="bg-black form-control form-control-solid" name="start_date" placeholder="Pick date rage"/>
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
                            <input readonly value="{{$title->format}}" type="text" name="number_of_episodes" class="bg-black form-control form-control-solid"
                        placeholder="number of episodes" />
                            {{-- <select name="format" aria-label="Select a format"
                                data-minimum-results-for-search="Infinity" data-control="select2"
                                data-placeholder="Select format" class="form-select form-select-solid">
                                <option value=""></option>
                                <option value="tv">TV</option>
                                <option value="movie">movie</option>
                                <option value="oda">ODA</option>
                            </select> --}}
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
                            <input readonly class="bg-black form-control form-control-solid" name="end_date" placeholder="Pick date rage" value="{{$title->end_date}}" />
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
                    <label class="fs-6 fw-bold form-label mt-3" for="active">active: </label>
                    <span class="badge @if ($title->isActive()) badge-success @else badge-danger @endif ">@if ($title->isActive()) yes @else no @endif</span>
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
                    {{-- <!--begin::Button-->
                    <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Cancel</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">Save</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button--> --}}
                    <form id="delete" action="{{route('title.delete',$title->id)}}" method="POST">
                        @csrf
                    </form>
                </div>
                <!--end::Action buttons-->
            {{-- </form> --}}
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
    dateFormat: "m/d/Y",
});
$("#kt_daterangepicker_4").flatpickr({
    dateFormat: "m/d/Y",
});
$('button[name="delete"]').on('click', function(){
    $('#delete').submit();
});
</script>
@endsection
