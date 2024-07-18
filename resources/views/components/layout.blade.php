<!DOCTYPE html>
<html lang="en">

<head>
    <title>Maulana Mahmuddin | {{ $title }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Maulana Mahmuddin">
    <meta name="keywords" content="keranjang AI">
    <meta name="author" content="Maul">
    <meta property="og:site_name" content="Aplikasi Maulana Mahmuddin" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ URL::to('/') }}" />
    <meta property="og:title" content="Aplikasi Maulana Mahmuddin" />
    <meta property="og:description" content="Aplikasi Maulana Mahmuddin" />
    <meta property="og:image" content="{{ asset('assets/logo-main.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo-main.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @stack('css')
    <style>
        /* skeleton css */
        .skeleton-loader:empty {
            width: 100%;
            height: 15px;
            display: block;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0),
                    rgba(255, 255, 255, 0.5) 50%,
                    rgba(255, 255, 255, 0) 80%),
                lightgray;
            background-repeat: repeat-y;
            background-size: 50px 500px;
            background-position: 0 0;
            animation: shine 1s infinite;
        }

        @keyframes shine {
            to {
                background-position: 100% 0;
            }
        }

        .select2-container {
            z-index: 99;
        }

        .select2-container {
            position: relative;
            /* or position: absolute; */
            z-index: 99;
            /* Adjust the z-index value as needed */
        }

        .select2-container--open {
            z-index: 9999999
        }
    </style>
</head>
<!--begin::Body-->

<body id="kt_body"
    data-kt-aside-minimize="{{ request()->is('admin/dashboard-pembayaran-qris', 'admin/dashboard-pembayaran', 'admin/dashboard-nop') ? 'on' : null }}"
    class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            {{ $slot }}

            <x-modal id="modalGeneral">
                @slot('title', '')
                @slot('size', 'modal-xl')
                @slot('body')
                @endslot
                @slot('footer')
                    <div class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">Close</span>
                    </div>
                @endslot
            </x-modal>

            <x-modal-child id="modalGeneralChild">
                @slot('title', '')
                @slot('size', 'modal-xl')
                @slot('body')
                @endslot
                @slot('footer')
                    <div class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">Close</span>
                    </div>
                @endslot
                </x-modal>
        </div>
        <!--end::Page-->
    </div>

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    @include('vendor/sweetalert/alert')
    @stack('js')
    <script src="{{ asset('assets/js/helpers.js?ver=') . rand(100, 900) }}"></script>
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script>
        const showModalGeneral = (url) => {
            showLoading();
            $.get(url)
                .done(function(res) {
                    Swal.close();
                    $('.modal-body').html(res)
                    $('#modalGeneral').modal('show');

                    const modalElement = document.getElementById('modalGeneral');

                    modalElement.addEventListener('wheel', handleModalWheel, {
                        passive: false
                    });

                    function handleModalWheel(event) {
                        const isScrollable = modalElement.scrollHeight > modalElement.clientHeight;
                        if (!isScrollable) {
                            return;
                        }

                    };
                })
                .fail(function(err) {
                    alertError(err.message);
                })
        }

        const showModalGeneralChild = (url) => {
            showLoading();
            $.get(url)
                .done(function(res) {
                    Swal.close();
                    $('.modal-body-child').html(res)
                    $('#modalGeneralChild').modal('show');

                    const modalElement = document.getElementById('modalGeneralChild');

                    modalElement.addEventListener('wheel', handleModalWheel, {
                        passive: false
                    });

                    function handleModalWheel(event) {
                        const isScrollable = modalElement.scrollHeight > modalElement.clientHeight;
                        if (!isScrollable) {
                            return;
                        }

                    };
                })
                .fail(function(err) {
                    alertError(err.message);
                })
        }
        const loadIndicator = () => {
            return Swal.fire({
                title: 'Tunggu sebentar ya!',
                html: 'Sistem sedang memperoses permintaan Kamu',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                },
            });
        }
    </script>
    <script>
        $(document).ready(() => {
            $('#modalGeneral').on('shown.bs.modal', function() {
                $('.select-clear').select2({
                    placeholder: "Select an option",
                    allowClear: true
                });
            });

            $('#modalGeneralChild').on('shown.bs.modal', function() {
                $('.select-clear').select2({
                    placeholder: "Select an option",
                    allowClear: true
                });
            });
            $('[data-toggle=confirm-remove]').click(function() {
                address = $(this).attr('data-address');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function(result) {
                    if (result.value) {

                        let load = loadIndicator();
                        $.ajax({
                            type: "GET",
                            url: address,
                            success: function(data) {
                                load.close();
                                if (data.status == 1) {
                                    Swal.fire({
                                        title: "Proses Berhasil",
                                        html: data.message,
                                        icon: "success",
                                        customClass: {
                                            confirmButton: "btn btn-success"
                                        }
                                    }).then((value) => {
                                        if (data.return_url != '#') {
                                            window.location.replace(data
                                                .return_url);
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Proses Gagal",
                                        html: data.message,
                                        icon: "error",
                                        customClass: {
                                            confirmButton: "btn btn-danger"
                                        }
                                    });
                                }
                            },
                            error: function(data) {
                                load.close();
                                Swal.fire({
                                    title: "Proses Gagal",
                                    html: 'Permintaan tidak dapat dilakukan!',
                                    icon: "error",
                                    customClass: {
                                        confirmButton: "btn btn-danger"
                                    }
                                });
                            }
                        })
                    }
                });
            });
        });
    </script>
</body>
<!--end::Body-->

</html>
