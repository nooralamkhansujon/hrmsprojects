<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>HRMS</title>
    <link rel="apple-touch-icon" href="{{asset('images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/toastr.min.css')}}"> --}}
    <!-- END: Vendor CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/components.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors.min.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/wizard/bs-stepper.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/form-wizard.css')}}">


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/charts/chart-apex.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/extensions/ext-component-toastr.css')}}"> --}}
    <!-- END: Page CSS-->

     <!-- BEGIN: Page CSS-->
     <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/form-validation.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-auth.css')}}">

     <!-- END: Page CSS-->

     {{-- for date picker  --}}
     <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

     <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/pickers/form-flat-pickr.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/pickers/form-pickadate.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <script src="{{asset('vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/feather.min.js')}}"></script>



</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <div id="app"></div>



    {{-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> --}}
    <script src="{{asset('vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    {{-- for datatables  --}}
    {{-- <script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script> --}}
    {{--
    <script src="{{asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script> --}}

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    {{-- for date time picker  --}}
    <script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

    <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    {{-- custom app js  --}}
    {{-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> --}}
    <script  src="{{asset('js/app.js')}}"></script>

    <!-- BEGIN: Page JS-->
    <script src="{{asset('js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <!-- END: Page JS-->


<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
 {{-- <script  src="{{asset('js/scripts/forms/pickers/form-pickers.js')}}"></script> --}}
 <script src="{{asset('js/scripts/forms/form-select2.js')}}"></script>
 <!-- BEGIN: Page Vendor JS-->

 <!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->


<!-- END: Page JS-->
{{-- <script src="{{asset('js/scripts/tables/table-datatables-basic.js')}}"></script> --}}
<!-- BEGIN: Theme JS-->
{{-- <script  src="{{asset('js/core/app-menu.js')}}"></script> --}}
{{-- <script  src="{{asset('js/core/app.js')}}"></script> --}}
<!-- END: Theme JS-->
{{-- <script src="{{asset('js/scripts/components/components-modals.js')}}"></script> --}}
{{-- <script  src="{{asset('js/scripts/forms/form-wizard.js')}}"></script> --}}

 <script>
        // $(window).on('load', function () {
            // if (feather) {

            // }
        // })
    </script>
</body>
<!-- END: Body-->

</html>
