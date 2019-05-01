<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} ">
    
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap-glyphicons.css') }} ">
    <link rel="stylesheet" href=" {{ asset('assets/vendor/bootstrap/css/bootstrap-datetimepicker.min.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/0.4.5/sweet-alert.css">
    
    <link href=" {{ asset('assets/vendor/fonts/circular-std/style.css') }} " rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('assets/libs/css/style.css') }} ">
    <link rel="stylesheet" href=" {{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }} ">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css ">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Schedulix') }}</title>
</head>

<body>

    @include('layouts.header') 
    @include('layouts.sidebar') 
    @yield('content')
    @include('layouts.footer') 
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }} "></script>
    
    <!-- bootstap bundle js -->
    <script src=" {{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/moment.js') }} "></script>
    <script src=" {{ asset('assets/vendor/bootstrap/js/bootstrap-datetimepicker.js') }} "></script>
    <script src="{{asset ('/js/custom.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- sweetalert js -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        var base_url    = "{{ url('/') }}";

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            @if(Session::has('error'))
            swal({
                    title:'',
                    type:'error',
                    text: '{{ Session::get('error') }}'
                });
            @endif
        });
    </script>

    @stack('scripts')

</body>

</html>