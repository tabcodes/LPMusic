<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
<body>
    <div id="app">
        @include('partials.nav')

        <main class="">
            <div class="container-fluid py-3">
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
