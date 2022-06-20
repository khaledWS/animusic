@extends('layout.index')
@section('title')
{{ $track->title}}
@endsection
@section('css')
<link href="{{asset('assets/plugins/custom/datatables/datatables.dark.bundle.css')}}" rel="stylesheet" type="text/css" />
<style>
    @media only screen and (max-width: 500px) {
        #title-card {
            background: linear-gradient(90deg, rgba(15, 49, 75, 1) 0%, rgba(45, 51, 103, 1) 100%);
            background-image: none;
        }
    }
</style>
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <div class="d-flex flex-column">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Engage widget 6-->
                <div id="title-card" class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color:#020202;background-image:url(' @isset($track->album) {{$track->album->first()->getImage()}} @endisset'),linear-gradient(90deg, rgba(15,49,75,1) 0%, rgba(45,51,103,1) 100%);">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between flex-column ps-xl-18">
                        <!--begin::Heading-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-11 pt-xl-13">
                                    <!--begin::Title-->
                                    <h3 class="fw-bolder text-white fs-1 mb-7  ms-n1" value="">{{$track->title}}</h3>
                                    {{-- <h6 class="fw-bolder text-white fs-2x mb-7 ms-n1">Season 1</h6> --}}
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <span class="fw-bolder text-white  mb-8 d-block lh-0"></span>
                                    <!--end::Description-->
                                    <!--begin::Items-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <a href="#" class="me-2">
                                                <i class="fas fa-headphones-alt text-primary fs-3"></i>
                                                {{-- <i class="fonticon-headset text-primary fs-3"></i> --}}
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <span class="sec fw-bold text-white fs-6">{{$track->displayFormat()}}
                                            </span>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <!--end::Heading-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 6-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="d-flex flex-column flex-xl-row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Composer</div>
                            <div class="text-gray-600">
                                @if ($track->composer)
                                <a href="">{{$track->composer->en_name}}</a>
                                @endif
                            </div>
                            <!--end::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Album</div>
                            @isset($track->album)
                            @foreach ($track->album as $album)
                            <div class="text-gray-600 fs-md-6 mb-1">
                                <a href="{{route('album.show',$album->id)}}">
                                    {{$album->title}}</a>
                            </div>
                            @endforeach
                            @endisset
                            <!--end::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Release date</div>
                            <div class="text-gray-600">
                                @isset($track->album){{$track->album->first()->date_released}}@endisset</div>
                            <!--end::Details item-->
                            <div class="separator mb-5"></div>
                            @if ($track->spotify)
                            <div class="mt-5"><a class="link" target="_blank" href="{{$track->spotify}}">
                                    <img width="20"
                                        src="{{asset('assets/media/mine/Spotify_icon-icons.com_66783.svg')}}" alt="">
                                    <span class="">Spotify</span></a>

                            </div>
                            @endif
                            @if ($track->yt_official)
                            <div class="mt-5"><a target="_blank" href="{{$track->yt_official}}">
                                    <img width="20"
                                        src="{{asset('assets/media/mine/Youtube_icon-icons.com_66802.svg')}}" alt="">
                                    <span class="">YT - Official</span></a>

                            </div>
                            @endif
                            @if ($track->yt_unofficial)
                            <div class="mt-5"><a target="_blank" href="{{$track->yt_unofficial}}">
                                    <img width="20"
                                        src="{{asset('assets/media/mine/Youtube_icon-icons.com_66802.svg')}}" alt="">
                                    <span class="">YT - non official</span></a>

                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="card card-flush h-xl-100">
                    <div class="card-header">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-gray-800"></span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <div class="card-body">
                        <div class="justify-content-evenly mb-md-5 mb-xl-10 row">
                            <!--begin::Card widget 4-->
                            <div class="badge-light card card-flush col-md-4 h-md-70 m-1 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Currency-->
                                            <span class="fs-1hx fw-bold text-primary me-1 align-self-start mb-3">Season
                                                1</span>
                                            <!--end::Currency-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class=" text-dark pt-1 fw-bold fs-6">the track was used: @isset($seasonOneData[0][0])
                                            {{ $seasonOneData[0][0]->USECOUNT}} times
                                        @endisset
                                            </span>
                                        <span class=" text-dark pt-1 fw-bold fs-6 mb-3">Total time used for: @isset ($seasonOneData[0][0])
                                            {{$seasonOneData[1][0]->SUM}}
                                        @endisset </span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 4-->

                            <!--begin::Card widget 4-->
                            <div class="badge-light card card-flush col-md-4 h-md-70 m-1 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Currency-->
                                            <span class="fs-1hx fw-bold text-primary me-1 align-self-start mb-3">Season
                                                2</span>
                                            <!--end::Currency-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class=" text-dark pt-1 fw-bold fs-6">the track was used: @isset($seasonTwoData[0][0])
                                            {{ $seasonTwoData[0][0]->USECOUNT}} times
                                        @endisset
                                            </span>
                                        <span class=" text-dark pt-1 fw-bold fs-6 mb-3">Total time used for: @isset ($seasonTwoData[0][0])
                                            {{$seasonTwoData[1][0]->SUM}}
                                        @endisset </span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 4-->

                            <!--begin::Card widget 4-->
                            <div class="badge-light card card-flush col-md-4 h-md-70 m-1 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Currency-->
                                            <span class="fs-1hx fw-bold text-primary me-1 align-self-start mb-3">Season
                                                3 Part 1</span>
                                            <!--end::Currency-->
                                        </div>
                                        <!--end::Info-->
                                       <!--begin::Subtitle-->
                                       <span class=" text-dark pt-1 fw-bold fs-6">the track was used: @isset($seasonThreePartOneData[0][0])
                                        {{ $seasonThreePartOneData[0][0]->USECOUNT}} times
                                    @endisset
                                        </span>
                                    <span class=" text-dark pt-1 fw-bold fs-6 mb-3">Total time used for: @isset ($seasonThreePartOneData[0][0])
                                        {{$seasonThreePartOneData[1][0]->SUM}}
                                    @endisset </span>
                                    <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 4-->

                            <!--begin::Card widget 4-->
                            <div class="badge-light card card-flush col-md-4 h-md-70 m-1 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Currency-->
                                            <span class="fs-1hx fw-bold text-primary me-1 align-self-start mb-3">Season
                                                3 part 2</span>
                                            <!--end::Currency-->
                                        </div>
                                        <!--end::Info-->
                                         <!--begin::Subtitle-->
                                         <span class=" text-dark pt-1 fw-bold fs-6">the track was used: @isset($seasonThreePartTwoData[0][0])
                                            {{ $seasonThreePartTwoData[0][0]->USECOUNT}} times
                                        @endisset
                                            </span>
                                        <span class=" text-dark pt-1 fw-bold fs-6 mb-3">Total time used for: @isset ($seasonThreePartTwoData[0][0])
                                            {{$seasonThreePartTwoData[1][0]->SUM}}
                                        @endisset </span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 4-->


                            <!--begin::Card widget 4-->
                            <div class="badge-light card card-flush col-md-4 h-md-70 m-1 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Currency-->
                                            <span
                                                class="fs-1hx fw-bold text-primary me-1 align-self-start mb-3">Season 4 part 1</span>
                                            <!--end::Currency-->
                                        </div>
                                        <!--end::Info-->
                                       <!--begin::Subtitle-->
                                       <span class=" text-dark pt-1 fw-bold fs-6">the track was used: @isset($seasonFourPartOneData[0][0])
                                        {{ $seasonFourPartOneData[0][0]->USECOUNT}} times
                                    @endisset
                                        </span>
                                    <span class=" text-dark pt-1 fw-bold fs-6 mb-3">Total time used for: @isset ($seasonFourPartOneData[0][0])
                                        {{$seasonFourPartOneData[1][0]->SUM}}
                                    @endisset </span>
                                    <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 4-->
                            <!--begin::Card widget 4-->
                            <div class="badge-light card card-flush col-md-4 h-md-70 m-1 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Currency-->
                                            <span
                                                class="fs-1hx fw-bold text-primary me-1 align-self-start mb-3">Season 4 part 2</span>
                                            <!--end::Currency-->
                                        </div>
                                        <!--end::Info-->
                                       <!--begin::Subtitle-->
                                       <span class=" text-dark pt-1 fw-bold fs-6">the track was used: @isset($seasonFourPartTwoData[0][0])
                                        {{ $seasonFourPartTwoData[0][0]->USECOUNT}} times
                                    @endisset
                                        </span>
                                    <span class=" text-dark pt-1 fw-bold fs-6 mb-3">Total time used for: @isset ($seasonFourPartTwoData[0][0])
                                        {{$seasonFourPartTwoData[1][0]->SUM}}
                                    @endisset </span>
                                    <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 4-->
                            <!--begin::Card widget 4-->
                            <div class="badge-light card card-flush col-md-4 h-md-70 m-1 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Currency-->
                                            <span
                                                class="fs-1hx fw-bold text-primary me-1 align-self-start mb-3">overall</span>
                                            <!--end::Currency-->
                                        </div>
                                        <!--end::Info-->
                                         <!--begin::Subtitle-->
                                         <span class=" text-dark pt-1 fw-bold fs-6">the track was used: @isset($overallData[0][0])
                                            {{ $overallData[0][0]->USECOUNT}} times
                                        @endisset
                                            </span>
                                        <span class=" text-dark pt-1 fw-bold fs-6 mb-3">Total time used for: @isset ($overallData[0][0])
                                            {{$overallData[1][0]->SUM}}
                                        @endisset </span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 4-->
                        </div>
                        <table id="kt_datatable_example_3"
                        class="table responsive  table-striped border rounded gy-5 gs-7">
                    </table>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Row-->
    </div>
</div>
@endsection
@section('js')
<script>
    let track_usage = "{{url('/track/track-usage')}}";
    let track = "{{$track->id}}";
    console.log(track_usage)
</script>
<script src="{{asset('assets/js/trackstat.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@endsection
