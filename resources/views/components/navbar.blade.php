  <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
      <div id="kt_header" style="" class="header align-items-stretch">
          <div class="container-fluid d-flex align-items-stretch justify-content-between">
              <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                  <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                      id="kt_aside_mobile_toggle">
                      <span class="svg-icon svg-icon-2x mt-1">
                          <img src="{{ asset('assets/media/icons/duotone/Text/Menu.svg') }}" alt=""
                              width="24px" height="24px">
                      </span>
                  </div>
              </div>
              <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                  <a href="" class="d-lg-none">
                      <img alt="Logo" src="{{ asset('assets/logo-main.png') }}" class="h-30px" />
                  </a>
              </div>
              <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                  <div class="d-flex align-items-center" id="kt_header_nav">
                      <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                          data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}"
                          class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                          <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{ $title }}</h1>
                          <span class="h-20px border-gray-200 border-start mx-4"></span>
                      </div>
                  </div>
                  <div class="d-flex align-items-stretch flex-shrink-0">
                      <div class="d-flex align-items-stretch flex-shrink-0">
                          <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                              <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                                  data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                                  data-kt-menu-flip="bottom">
                                  {{-- <img src="{{ Main::getImageProfile() }}" alt="PBB" /> --}}
                              </div>
                              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                  data-kt-menu="true">
                                  <div class="menu-item px-3">
                                      <div class="menu-content d-flex align-items-center px-3">
                                          <div class="symbol symbol-50px me-5">
                                              <img alt="Logo" src="" />
                                          </div>
                                          <div class="d-flex flex-column">
                                              <div class="fw-bolder d-flex align-items-center fs-5">
                                                  Admin
                                              </div>
                                              <a href="#" class="fw-bold text-muted text-hover-primary fs-7">Admin
                                                  Role</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="separator my-2"></div>

                                  <div class="menu-item px-5 my-1">
                                      <a href="" class="menu-link px-5">Account
                                          Settings</a>
                                  </div>
                                  <div class="menu-item px-5">
                                      <a href="#" onclick="alertConfirm('', 'Apakah anda yakin akan keluar?')"
                                          class="menu-link px-5">Log Out</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      {{ $slot }}
      <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
          <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
              <div class="text-dark order-2 order-md-1">
                  <span class="text-muted fw-bold me-1">&copy; {{ date('Y') }}</span>
                  <a href="#" target="_blank" class="text-gray-800 text-hover-primary">
                      Maulana Mahmuddin
                  </a>
              </div>

          </div>
      </div>
  </div>
