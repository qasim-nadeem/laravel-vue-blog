<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Vue Blog</title>
    <!-- Admin template dependencies -->
    <link href="{{asset('vendor/view-design/dist/styles/ionicons.svg')}}" />
    <link href="{{asset('vendor/view-design/dist/styles/ionicons.ttf')}}" />
    <link href="{{asset('vendor/view-design/dist/styles/ionicons.woff')}}" />
    <link href="{{asset('vendor/view-design/dist/styles/ionicons.woff2')}}" />

    <link href="{{asset('css/admin-template/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <!-- custom styling -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Loading icon for iview ui -->
    <style>
    @font-face {
      font-family: "ionicons";
      src: url("{{asset('fonts/vendor/view-design/dist/styles/ionicons.woff2')}}") format("woff2");
      font-weight: normal;
      font-style: normal;
    }
    </style>
    <script>

        (function () {
            window.Laravel = {
                csrfToken: '{{ csrf_token() }}'
            };
        })();

    </script>
</head>
<body>
    <div id="app">
        <admin></admin>
    </div>
    <!-- admin template js dependencies-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/admin-template/scripts.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="{{asset('js/admin-template/chart-area-demo.js')}}"></script> -->
    <!-- <script src="{{asset('js/admin-template/chart-bar-demo.js')}}"></script> -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/admin-template/datatables-demo.js')}}"></script>
    <!-- Main vue app -->
    <script type="text/javascript"  src="{{asset('js/app.js')}}"></script>
</body>
</html>
