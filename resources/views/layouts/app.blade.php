<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Storefront')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="{{ request()->routeIs('home') ? 'home-page' : '' }}">

    @include('partials.header')

    @include('partials.sidebar')

    @include('partials.mini-cart')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        window.addEventListener('scroll', function () {

            const header = document.getElementById('main-header');

            if (!header) return;

            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

        });
    </script>

</body>
</html>