<!--begin::Toolbar wrapper-->
<div class="topbar d-flex align-items-stretch flex-shrink-0">
    <!--begin::Search-->
    <div class="d-flex align-items-stretch ms-1 ms-lg-3">

        <!--layout-partial:partials/search/_dropdown.html-->
        @include('partials.search._dropdown')

    </div>
    <!--end::Search-->
    <!--begin::Activities-->
    <div class="d-flex align-items-center ms-1 ms-lg-3">
        <!--begin::Drawer toggle-->
        <div class="btn btn-icon btn-active-light-primary btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
            id="kt_activities_toggle">
            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
            <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                    <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
                    <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                    <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Drawer toggle-->
    </div>
    <!--end::Activities-->
    <!--begin::Notifications-->
    <div class="d-flex align-items-center ms-1 ms-lg-3">
        <!--begin::Menu- wrapper-->
        <div class="btn btn-icon btn-active-light-primary position-relative btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
            data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
            <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                        fill="currentColor" />
                    <path
                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                        fill="currentColor" />
                    <path opacity="0.3"
                        d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                        fill="currentColor" />
                    <path opacity="0.3"
                        d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>

        <!--layout-partial:partials/menus/_notifications-menu.html-->
        @include('partials.menus._notifications-menu')

        <!--end::Menu wrapper-->
    </div>
    <!--end::Notifications-->
    <!--begin::Chat-->
    <div class="d-flex align-items-center ms-1 ms-lg-3">
        <!--begin::Menu wrapper-->
        <div class="btn btn-icon btn-active-light-primary position-relative btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
            id="kt_drawer_chat_toggle">
            <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
            <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3"
                        d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z"
                        fill="currentColor" />
                    <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor" />
                    <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <span
                class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Chat-->
    <!--begin::Quick links-->
    <div class="d-flex align-items-center ms-1 ms-lg-3">
        <!--begin::Menu wrapper-->
        <div class="btn btn-icon btn-active-light-primary btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
            data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
            <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>

        <!--layout-partial:partials/menus/_quick-links-menu.html-->
        @include('partials.menus._quick-links-menu')

        <!--end::Menu wrapper-->
    </div>
    <!--end::Quick links-->
    <!--begin::Theme mode-->
    <div class="d-flex align-items-center ms-1 ms-lg-3">

        <!--layout-partial:partials/theme-mode/_main.html-->
        @include('partials.theme-mode._main')

    </div>
    <!--end::Theme mode-->
    <!--begin::User-->
    <div class="d-flex align-items-center me-n3 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="btn btn-icon btn-active-light-primary btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
            data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img class="h-30px w-30px rounded" src="assets/media/avatars/300-2.jpg" alt="" />
        </div>

        <!--layout-partial:partials/menus/_user-account-menu.html-->
        @include('partials.menus._user-account-menu')

        <!--end::Menu wrapper-->
    </div>
    <!--end::User -->
    <!--begin::Aside mobile toggle-->
    <!--end::Aside mobile toggle-->
</div>
<!--end::Toolbar wrapper-->
