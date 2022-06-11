@extends('layout.index')
@section('title')
New track
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Add new Track</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="kt_ecommerce_settings_general_form" class="form" method="POST" action="{{route('track.create')}}"
                autocomplete="off">
                @csrf
                <!--begin::Input group-->
                <div class="fv-row row mb-7">
                    <div class="col">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span class="required">Title</span>
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
                    <div class="col">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>album</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="album_id" aria-label="Select an album" data-minimum-results-for-search="Infinity"
                            data-control="select2" data-placeholder="Select album"
                            class="form-select form-select-solid">
                            <option value=""></option>
                            @isset($albums)
                            @foreach ($albums as $album)
                            <option @selected($album->id == old('album_id')) value="{{$album->id}}">{{$album->title}}
                            </option>
                            @endforeach
                            @endisset
                        </select>
                        @error('album_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row row mb-7">
                    <div class="col">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>composer</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="composer_id" aria-label="Select an album"
                            data-minimum-results-for-search="Infinity" data-control="select2"
                            data-placeholder="Select album" class="form-select form-select-solid">
                            <option value=""></option>
                            @isset($composers)
                            @foreach ($composers as $composer)
                            <option @selected($composer->id==old('composer_id')) value="{{$composer->id}}">
                                {{$composer->en_name}}</option>
                            @endforeach
                            @endisset
                        </select>
                        @error('composer_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>length</span>
                                {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Enter the contact's email."></i> --}}
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="length" class="form-control form-control-solid"
                                placeholder="track length" value="{{old('length')}}" />
                            <!--end::Input-->
                            @error('length')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <div class="col">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>disk</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" name="disk" class="form-control form-control-solid" placeholder="disk"
                            value="{{old('disk')}}" />
                        @error('disk')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">Order in Album</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="order" type="number" name="order" class="form-control form-control-solid"
                                placeholder="order" autocomplete="off" value="{{ old('order') }}" />
                            <!--end::Input-->
                            <span class="input-info"></span>
                            @error('order')
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
                    <div class="col-md-3">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>spotify</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="spotify" class="form-control form-control-solid" placeholder="spotify"
                            value="{{old('spotify')}}" />
                        @error('spotify')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-3">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>YT - official</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="yt_official" type="text" name="yt_official" class="form-control form-control-solid"
                                placeholder="yt_official" autocomplete="off" value="{{ old('yt_official') }}" />
                            <!--end::Input-->
                            @error('yt_official')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-md-3">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>YT - un official</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="yt_unofficial" type="text" name="yt_unofficial" class="form-control form-control-solid"
                                placeholder="yt_official" autocomplete="off" value="{{ old('yt_unofficial') }}" />
                            <!--end::Input-->
                            @error('yt_unofficial')
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
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>notes</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <textarea class="form-control form-control-solid" name="notes"
                        value="{{old('notes')}}">{{old('notes')}}</textarea>
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
                        'order': value
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
                })
            }, 400);
        });
</script>
@endsection
