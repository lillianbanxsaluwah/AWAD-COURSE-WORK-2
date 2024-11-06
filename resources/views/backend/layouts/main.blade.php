<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="http://www.urbanui.com/" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @yield('content')


    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>

    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->

    {{--  <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/avgrund.js') }}"></script>
    <script src="{{ asset('js/bt-maxLength.js') }}"></script>
    <script src="{{ asset('js/c3.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/chartist.js') }}"></script>
    <script src="{{ asset('js/clipboard.js') }}"></script>
    <script src="{{ asset('js/codeEditor.js') }}"></script>
    <script src="{{ asset('js/context-menu.js') }}"></script>
    <script src="{{ asset('js/db.js') }}"></script>
    <script src="{{ asset('js/desktop-notification.js') }}"></script>
    <script src="{{ asset('js/dragula.js') }}"></script>
    <script src="{{ asset('js/dropify.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/editorDemo.js') }}"></script>

    <script src="{{ asset('js/flot-chart.js') }}"></script>
    <script src="{{ asset('js/form-addons.js') }}"></script>
    <script src="{{ asset('js/form-repeater.js') }}"></script>
    <script src="{{ asset('js/form-validation.js') }}"></script>
    <script src="{{ asset('js/formpickers.js') }}"></script>
    <script src="{{ asset('js/google-charts.js') }}"></script>
    <script src="{{ asset('js/google-maps.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/ion-range-slider.js') }}"></script>
    <script src="{{ asset('js/jq.tablesort.js') }}"></script>
    <script src="{{ asset('js/jquery-file-upload.js') }}"></script>
    <script src="{{ asset('js/js-grid.js') }}"></script>
    <script src="{{ asset('js/just-gage.js') }}"></script>
    <script src="{{ asset('js/light-gallery.js') }}"></script>
    <script src="{{ asset('js/mapeal.js') }}"></script>
    <script src="{{ asset('js/mapeal_example_1.js') }}"></script>
    <script src="{{ asset('js/mapeal_example_2.js') }}"></script>
    <script src="{{ asset('js/maps.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/modal-demo.js') }}"></script>
    <script src="{{ asset('js/morris.js') }}"></script>
    <script src="{{ asset('js/no-ui-slider.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/paginate.js') }}"></script>
    <script src="{{ asset('js/popover.js') }}"></script>
    <script src="{{ asset('js/profile-demo.js') }}"></script>
    <script src="{{ asset('js/progress-bar.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/sparkline.js') }}"></script>
    <script src="{{ asset('js/tablesorter.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>
    <script src="{{ asset('js/tight-grid.js') }}"></script>
    <script src="{{ asset('js/toastDemo.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/tooltips.js') }}"></script>
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/wizard.js') }}"></script>
    <script src="{{ asset('js/x-editable.js')}}"></script>  --}}
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" ></script>
    <Script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileUploadInput = document.querySelector('.file-upload-default');
            const fileUploadButton = document.querySelector('.file-upload-browse');
            const fileUploadInfo = document.querySelector('.file-upload-info');

            fileUploadButton.addEventListener('click', function () {
                fileUploadInput.click();
            });

            fileUploadInput.addEventListener('change', function () {
                const files = Array.from(fileUploadInput.files).map(file => file.name).join(', ');
                fileUploadInfo.value = files || 'No files selected';
            });
        });

    </Script>
</body>


  </html>
