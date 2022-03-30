<!DOCTYPE html>
<html class="loading dark-layout" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="dark-layout"
    data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('dev-master.description') }}">
    <meta name="keywords" content="{{ config('dev-master.keywords') }}">
    <meta name="author" content="{{ config('dev-master.author') }}">
    <title>@yield('header-title') - {{ env('APP_NAME') }}</title>
    <link rel="apple-touch-icon" href="{{ asset(config('dev-master.apple_touch_icon')) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('dev-master.shortcut_icon')) }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/forms/select/select2.min.css') }}">
    @yield('styles')

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/bordered-layout.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/extensions/ext-component-sweet-alerts.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    @yield('style-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    @include('includes.header-navbar')


    @include('includes.main-menu')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">@yield('title')</h2>
                            <div class="breadcrumb-wrapper">
                                @yield('breadcrumb')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        @yield('content-header-right')
                    </div>
                </div>
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->


    @if (config('dev-master.customizer'))
        @include('includes.customizer')
    @endif

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('includes.footer')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    @yield('scripts')
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin/app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.min.js') }}"></script>
    @if (config('dev-master.customizer'))
        <script src="{{ asset('admin/app-assets/js/scripts/customizer.min.js') }}"></script>
    @endif
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->

    //Toast notification
    <script>
        @if (Session::has('message') && Session::get('type') == 'toast')
            var type_message = "{{ Session::get('alert-type','info') }}";
            var o = "rtl" === $("html").attr("data-textdirection");
            $(function () {
                "use strict";

                switch (type_message) {
                    case 'info':
                        toastr.info(
                            "{{ Session::get('message') }}",
                            "{{ __(env('APP_NAME')) }}",
                            { closeButton: !0, tapToDismiss: !1, progressBar: !0, timeOut: 5000, rtl: o }
                        );
                        break;
                    case 'success':
                        toastr.success(
                            "{{ Session::get('message') }}",
                            "{{ __(env('APP_NAME')) }}",
                            { closeButton: !0, tapToDismiss: !1, progressBar: !0, timeOut: 5000, rtl: o }
                        );
                        break;
                    case 'warning':
                        toastr.warning(
                            "{{ Session::get('message') }}",
                            "{{ __(env('APP_NAME')) }}",
                            { closeButton: !0, tapToDismiss: !1, progressBar: !0, timeOut: 5000, rtl: o }
                        );
                        break;
                    case 'error':
                        toastr.error(
                            "{{ Session::get('message') }}",
                            "{{ __(env('APP_NAME')) }}",
                            { closeButton: !0, tapToDismiss: !1, progressBar: !0, timeOut: 5000, rtl: o }
                        );
                        break;
                }
            })
        @endif
    </script>

    //sweet-alert confirm deletion

    <script>
        $(function() {
            var $confirmColor = $(".deleteElement");
            if ($confirmColor.length) {
                $confirmColor.on('click', function(e) {
                    e.preventDefault();

                    // console.log(e.currentTarget.attributes.id.nodeValue);

                    Swal.fire({
                        title: '{{ __(env("APP_NAME")) }}',
                        text: '{{ Session::get("message") }}',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "{{ __('Yes, delete it!') }}",
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: 'btn btn-outline-danger ms-1'
                        },
                        buttonsStyling: false
                    }).then(function (result) {
                        if (result.value) {
                            /* Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                }
                            }); */
                            $("#"+e.currentTarget.attributes.id.nodeValue).closest('form').submit();
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                title: "Cancelled",
                                text: "{{ __('Your data is safe :)') }}",
                                icon: 'error',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                }
                            });
                        }
                    });
                })
            }
        })
    </script>

    //sweet-alert notification
    <script>
        @if (Session::has('message') && Session::get('type') == 'sweet')
            var type_message = "{{ Session::get('alert-type','info') }}";
            var o = "rtl" === $("html").attr("data-textdirection");
            $(function () {
                "use strict";

                switch (type_message) {
                    case 'info':
                        Swal.fire({
                            title: '{{ __(env("APP_NAME")) }}',
                            text: '{{ Session::get("message") }}',
                            icon: "info",
                            // type: 'info',
                            showCancelButton: false,
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-danger",
                            },
                            timer: 5000
                        })
                        break;
                    case 'success':
                        Swal.fire({
                            title: '{{ __(env("APP_NAME")) }}',
                            text: '{{ Session::get("message") }}',
                            icon: "success",
                            // type: 'info',
                            showCancelButton: false,
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-danger",
                            },
                            timer: 5000
                        })
                        break;
                    case 'warning':
                        Swal.fire({
                            title: '{{ __(env("APP_NAME")) }}',
                            text: '{{ Session::get("message") }}',
                            icon: "warning",
                            // type: 'info',
                            showCancelButton: false,
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-danger",
                            },
                            timer: 5000
                        })
                        break;
                    case 'error':
                        Swal.fire({
                            title: '{{ __(env("APP_NAME")) }}',
                            text: '{{ Session::get("message") }}',
                            icon: "error",
                            // type: 'info',
                            showCancelButton: false,
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-danger",
                            },
                            timer: 5000
                        })
                        break;
                }
            })
        @endif
    </script>

    //Datatable
    <script>
        @if (config('app.locale')== 'fr')
            $(function () {
                'use strict';
                var dt_basic_table = $('.datatables-basic'),
                dt_filter_table = $('.dt-column-search');

                if(dt_basic_table.length){
                    dt_basic_table.DataTable({
                        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        orderCellsTop: true,
                        language: {
                            url: "/datatable/fr-FR.json"
                        }
                    })
                }

                if (dt_filter_table.length) {
                    // Setup - add a text input to each footer cell
                    $('.dt-column-search thead tr').clone(true).appendTo('.dt-column-search thead');
                    $('.dt-column-search thead tr:eq(1) th').each(function (i) {
                    var title = $(this).text();
                    $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

                    $('input', this).on('keyup change', function () {
                        if (dt_filter.column(i).search() !== this.value) {
                        dt_filter.column(i).search(this.value).draw();
                        }
                    });
                    });

                    var dt_filter = dt_filter_table.DataTable({
                        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        orderCellsTop: true,
                        language: {
                            url: "/datatable/fr-FR.json"
                        }
                    });
                }
            })
        @else
            $(function () {
                'use strict';
                var dt_basic_table = $('.datatables-basic'),
                dt_filter_table = $('.dt-column-search');

                if(dt_basic_table.length){
                    dt_basic_table.DataTable({
                        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        orderCellsTop: true,
                        language: {
                            url: "/datatable/en-GB.json"
                        }
                    })
                }

                if (dt_filter_table.length) {
                    // Setup - add a text input to each footer cell
                    $('.dt-column-search thead tr').clone(true).appendTo('.dt-column-search thead');
                    $('.dt-column-search thead tr:eq(1) th').each(function (i) {
                    var title = $(this).text();
                    $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

                    $('input', this).on('keyup change', function () {
                        if (dt_filter.column(i).search() !== this.value) {
                        dt_filter.column(i).search(this.value).draw();
                        }
                    });
                    });

                    var dt_filter = dt_filter_table.DataTable({
                        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        orderCellsTop: true,
                        language: {
                            url: "/datatable/en-GB.json"
                        }
                    });
                }
            })
        @endif
    </script>

    //Select2
    <script>
        (function (window, document, $) {
            'use strict';

            $('.select2').each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%',
                dropdownParent: $this.parent()
                });
            });
        })(window, document, jQuery);
    </script>
    @yield('script-custom')
    <!-- END: Page JS-->
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
