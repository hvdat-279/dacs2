<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DSport</title>
    <link rel="icon" href="{{ asset('/image/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .custom-link {
            opacity: 0.7;
            text-decoration: none;
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .custom-link:hover {
            opacity: 1;
            /* font-weight: bold; */
            text-decoration: underline;
            color: #393f81;
        }
    </style>

</head>

<body>
    <section class="vh-100"
        style="background-image: url({{ asset('/image/6.png') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
        @yield('content')
    </section>
    {{-- @yield('content') --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>