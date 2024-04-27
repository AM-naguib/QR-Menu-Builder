<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.layouts.head')
</head>

<body>
    {{-- mobile nav --}}
    @include('dashboard.layouts.mobile-nav')
    {{-- sidenav --}}
    @include('dashboard.layouts.sidenav')

    <main class="content">

        {{-- nav --}}
        @include('dashboard.layouts.nav')

        @yield('content')

        {{-- footer --}}
        @include('dashboard.layouts.footer')

    </main>
    {{-- scripts --}}
    @include('dashboard.layouts.scripts')
</body>

</html>
