<!--begin::Menu wrapper-->
<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend"
    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">
        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
            class="menu-item here show menu-lg-down-accordion me-lg-1">
            @auth
            <a href="/dashboard">
                <span class="menu-link py-3">
                    <span class="menu-title">Dashboards</span>
                    <span class="menu-arrow d-lg-none"></span>
                </span>
            </a>
            @endauth
        </div>
        {{-- <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-3">
                <span class="menu-title">Explore</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                <div class="menu-item">
                    <a class="menu-link py-3" href="/">
                        </span>
                        <span class="menu-title">main page</span>
                    </a>
                </div>
            </div>
        </div> --}}
        {{-- <div class="menu-item">
            <a class="menu-link py-3" href="/">
                </span>
                <span class="menu-title">main page</span>
            </a>
        </div> --}}

    </div>
    <!--end::Menu-->
</div>
<!--end::Menu wrapper-->
