@extends('layout.index')
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <div class="d-flex flex-column">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Engage widget 6-->
                <div class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color:#020202;background-image:url('{{asset('other/SnK_Original_Soundtrack_Cover.webp')}}'),linear-gradient(90deg, rgba(15,49,75,1) 0%, rgba(45,51,103,1) 100%);">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between flex-column ps-xl-18">
                        <!--begin::Heading-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-11 pt-xl-13">
                                    <!--begin::Title-->
                                    <h3 class="fw-bolder text-white fs-4x mb-7  ms-n1">"Attack on Titan" Original
                                        Soundtrack</h3>
                                    {{-- <h6 class="fw-bolder text-white fs-2x mb-7 ms-n1">Season 1</h6> --}}
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <span class="fw-bolder text-white  mb-8 d-block lh-0">進撃の巨人 オリジナルサウンドトラック
                                        / Shingeki no Kyojin Orijinarusaundotorakku</span>
                                    <!--end::Description-->
                                    <!--begin::Items-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center me-6">
                                            <!--begin::Icon-->
                                            <a href="#" class="me-2">
                                                <i class="fas fa-play-circle text-primary fs-3"></i>
                                                {{-- <i class="fonticon-play text-primary fs-3"></i> --}}
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <span class="fw-bold text-white fs-6">16 Tracks</span>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <a href="#" class="me-2">
                                                <i class="fas fa-headphones-alt text-primary fs-3"></i>
                                                {{-- <i class="fonticon-headset text-primary fs-3"></i> --}}
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <span class="fw-bold text-white fs-6">1:17:21 Hours</span>
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
                        <!--begin::Action-->
                        {{-- <div class="mb-xl-10 mb-3">
                            <a href="/metronic8/demo2/../demo2/dark/apps/support-center/overview.html"
                                class="btn btn-color-white bg-transparent btn-outline fw-bold"
                                style="border: 1px solid rgba(255, 255, 255, 0.3)">xxx tracks</a>
                            <a href="/metronic8/demo2/../demo2/dark/apps/support-center/overview.html"
                                class="btn btn-color-white bg-transparent btn-outline fw-bold"
                                style="border: 1px solid rgba(255, 255, 255, 0.3)">xxx hours</a>
                        </div> --}}
                        <!--begin::Action-->
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
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4"
                                            fill="currentColor" />
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
        <div class="d-flex flex-column flex-xl-row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Composer</div>
                            <div class="text-gray-600">Hiroyuki Sawano</div>
                            <!--end::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Release date</div>
                            <div class="text-gray-600">June 28, 2013</div>
                            <!--end::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5 ">Label</div>
                            <div class="text-gray-600">
                                Pony Canyon</div>
                            <!--end::Details item-->

                            <div class="separator"></div>
                            <div class="fw-bolder mt-5 fs-3 text-primary">Musicians</div>

                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Drums</div>
                            <div class="text-gray-600">Yu "masshoi" Yamauchi</div>
                            <!--end::Details item-->

                        </div>
                    </div>
                </div>

            </div>
            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="card card-flush h-xl-100">
                    <div class="card-header">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-gray-800">Tracks</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        {{-- <div class="card-toolbar">
                            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                class="btn btn-sm btn-light d-flex align-items-center px-4">
                                <!--begin::Display range-->
                                <div class="text-gray-600 fw-bolder">5 Apr 2022 - 4 May 2022</div>
                                <!--end::Display range-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-1 ms-2 me-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path opacity="0.3"
                                            d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Daterangepicker-->
                        </div> --}}
                        <!--end::Toolbar-->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped gy-7 gs-7">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                        <th class="min-w-10px">#</th>
                                        <th class="min-w-400px">title</th>
                                        <th class="min-w-100px">length</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>ətˈæk 0N tάɪtn</td>
                                        <td>4:17</td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>The Reluctant Heroes</td>
                                        <td>4:27</td>
                                    </tr>
                                    <tr>
                                        <td>03</td>
                                        <td>eye-water</td>
                                        <td>3:01</td>
                                    </tr>
                                    <tr>
                                        <td>04</td>
                                        <td>立body機motion</td>
                                        <td>5:43</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Row-->
    </div>
</div>
@endsection
