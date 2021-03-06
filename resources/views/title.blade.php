@extends('layout.index')
@section('title')
Attack on Titan Music
@endsection
@section('css')
<style>

</style>
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Engage widget 6-->
            <div class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                style="background-color:#020202;background-image:url('{{asset('other/AOT-banner.jpg')}}')">
                <!--begin::Body-->
                <div class="card-body d-flex justify-content-between flex-column ps-xl-18">
                    <!--begin::Heading-->
                    <div class="mb-20 pt-xl-13">
                        <!--begin::Title-->
                        <h3 class="fw-bolder text-white fs-4x mb-5 ms-n1">Attack On Titan</h3>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <span class="fw-bolder text-white fs-4 mb-8 d-block lh-0">Shingeki no Kyojin</span>
                        <!--end::Description-->
                        <!--begin::Items-->
                        <div class="d-flex align-items-center mt-12">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center me-6">
                                <!--begin::Icon-->
                                <a href="#" class="me-2">
                                    <i class="fas fa-play-circle text-primary fs-3"></i>
                                </a>
                                <!--end::Icon-->
                                <!--begin::Info-->
                                <span class="fw-bold text-white fs-6">{{$tracksSum}} Tracks</span>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <a href="#" class="me-2">
                                    <i class="fas fa-headphones-alt text-primary fs-3"></i>
                                </a>
                                <!--end::Icon-->
                                <!--begin::Info-->
                                <span class="fw-bold text-white fs-6">{{$lengthSum}}</span>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Heading-->
                    {{--
                    <!--begin::Action-->
                    <div class="mb-xl-10 mb-3">
                        <a href="/metronic8/demo2/../demo2/dark/apps/support-center/overview.html"
                            class="btn btn-color-white bg-transparent btn-outline fw-bold"
                            style="border: 1px solid rgba(255, 255, 255, 0.3)">xxx tracks</a>
                        <a href="/metronic8/demo2/../demo2/dark/apps/support-center/overview.html"
                            class="btn btn-color-white bg-transparent btn-outline fw-bold"
                            style="border: 1px solid rgba(255, 255, 255, 0.3)">xxx hours</a>
                    </div>
                    <!--begin::Action--> --}}
                </div>
                <!--end::Body-->
            </div>
            <!--end::Engage widget 6-->
        </div>
        <!--end::Col-->
        {{--
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Video widget 2-->
            <div class="card card-flush h-xl-100" id="kt_player_widget_2">
                <!--begin::Header-->
                <div class="card-header bg-black">
                    <!--begin::Title-->
                    <h3 class="card-title fw-bolder text-white">Player</h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                            data-kt-menu-overflow="true">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
                                    <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                                    <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                                    <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 2-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick
                                    Actions</div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator mb-3 opacity-75"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Ticket</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Customer</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                data-kt-menu-placement="right-start">
                                <!--begin::Menu item-->
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">New Group</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--end::Menu item-->
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Admin Group</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Staff Group</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Member Group</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Contact</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator mt-3 opacity-75"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content px-3 py-3">
                                    <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                        Reports</a>
                                </div>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 2-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body bg-black pt-0">
                    <!--begin::Image-->
                    <div class="mx-auto mb-6 bgi-no-repeat bgi-size-contain bgi-position-center rounded-circle w-125px h-125px"
                        style="background-image:url('/metronic8/demo2/assets/media/stock/600x600/img-59.jpg')">
                    </div>
                    <!--end::Image-->
                    <!--begin::Section-->
                    <div class="text-center mb-5">
                        <!--begin::Title-->
                        <h1 class="text-white fw-bolder">Strange Friends</h1>
                        <!--end::Title-->
                        <!--begin::Title-->
                        <span class="text-white opacity-75 fw-bold">Theresa Webb</span>
                        <!--end::Title-->
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Card body-->
                <!--begin::Card Footer-->
                <div class="card-footer bg-primary p-0 pb-9">
                    <div class="mt-n10">
                        <!--begin::Progress-->
                        <div class="mb-5">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack px-4 text-white opacity-75">
                                <span class="current-time" data-kt-element="current-time">0:00</span>
                                <span class="duration" data-kt-element="duration">0:00</span>
                            </div>
                            <!--end::Time-->
                            <input type="range" class="form-range" data-kt-element="progress" min="0" max="100"
                                value="0" step="0.01" />
                        </div>
                        <!--end::Progress-->
                        <!--begin::Toolbar-->
                        <div class="d-flex flex-center">
                            <button class="btn btn-icon mx-1" data-kt-element="replay-button">
                                <i class="fonticon-repeat fs-2 text-white"></i>
                            </button>
                            <button class="btn btn-icon mx-1" data-kt-element="play-prev-button">
                                <i class='fonticon-back fs-2 text-white'></i>
                            </button>
                            <button class="btn btn-icon mx-6 play-pause" data-kt-element="play-button">
                                <i class="fonticon-play text-white fs-4x" data-kt-element="play-icon"></i>
                                <i class="fonticon-pause text-white fs-4x d-none" data-kt-element="pause-icon"></i>
                            </button>
                            <button class="btn btn-icon mx-1 next" data-kt-element="play-next-button">
                                <i class='fonticon-next fs-2 text-white'></i>
                            </button>
                            <button class="btn btn-icon mx-1" data-kt-element="shuffle-button">
                                <i class="fonticon-shuffle fs-2 text-white"></i>
                            </button>
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Tracks-->
                        <audio data-kt-element="audio-track-1">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-5.mp3"
                                type="audio/mpeg" />
                        </audio>
                        <!--end::Tracks-->
                    </div>
                </div>
                <!--end::Card Footer-->
            </div>
            <!--end::Video widget 2-->
        </div>
        <!--end::Col--> --}}
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Player widget 1-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">Lists</span>
                        {{-- <span class="text-gray-400 mt-1 fw-bold fs-6">Updated 37 minutes ago</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                            <li class="nav-item">
                                <a class="nav-link active btn btn-sm btn-active-light-primary" data-bs-toggle="tab"
                                    href="#kt_tab_seasons">Seasons</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-active-light-primary" data-bs-toggle="tab"
                                    href="#kt_tab_albums">Albums</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body pt-7">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-9 mb-5 mb-xl-9 tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_seasons" role="tabpanel">
                            <div class="container">
                                <div class="row">
                                    @foreach ($titles as $title)
                                    <!--begin::Col-->
                                    <div class="col-sm-3 mb-3 mb-sm-0 mb-lg-10">
                                        <!--begin::Player card-->
                                        <div class="m-0">
                                            <!--begin::User pic-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                                href="{{route('title.show',$title->id)}}">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7"
                                                    style="height: 266px;background-image:url('{{$title->getImage()}}')">
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--end::User pic-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Title-->
                                                <a href="{{route('title.show',$title->id)}}"
                                                    class="text-gray-800 text-hover-primary fs-3 fw-bolder d-block mb-2">{{$title->title}}</a>
                                                <!--end::Title-->
                                                <span
                                                    class="fw-bolder fs-6 text-gray-400 d-block lh-1">{{$title->number_of_episodes}}
                                                    Episodes</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Player card-->
                                    </div>
                                    <!--end::Col-->
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_albums" role="tabpanel">
                            <div class="row">
                                @isset($albums)
                                @foreach ($albums as $album)
                                <!--begin::Col-->
                                <div class="col-sm-3 mb-3 mb-sm-0 mb-lg-10">
                                    <!--begin::Player card-->
                                    <div class="m-0">
                                        <!--begin::User pic-->
                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                            href="{{route('album.show',$album->id)}}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7"
                                                style="height: 266px;background-image:url('{{$album->getImage()}}')">
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::User pic-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <a href="{{route('album.show',$album->id)}}"
                                                class="text-gray-800 text-hover-primary fs-3 fw-bolder d-block mb-2">{{$album->title}}</a>
                                            <!--end::Title-->
                                            <span
                                                class="fw-bolder fs-6 text-gray-400 d-block lh-1">{{$album->number_of_tracks}}
                                                tracks</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Player card-->
                                </div>
                                <!--end::Col-->
                                @endforeach
                                @endisset

                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Player widget 1-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</div>
@endsection
