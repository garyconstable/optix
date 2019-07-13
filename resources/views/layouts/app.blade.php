<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="https://www.optixsolutions.co.uk/wp-content/uploads/2018/10/cropped-favicon-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://www.optixsolutions.co.uk/wp-content/uploads/2018/10/cropped-favicon-192x192.png" sizes="192x192" />
    <title>Optix - Dev Test</title>
</head>
<body>
    @include('inc.navbar')
    <main class="container mt-4">
        @yield('content')
    </main>

    <script src="{{asset('js/app.js')}}"></script>

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $(".alert").alert('close');
            }, 3000);
        });
    </script>
</body>
</html>
