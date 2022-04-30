<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI for Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/css/coreui.min.css" rel="stylesheet"  crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
</head>
<body>
@include('layouts.sidebar')
<div class="wrapper d-flex flex-column min-vh-100 bg-light" style="padding-left: var(--cui-sidebar-occupy-start,0);">
    @include('layouts.header')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: CoreUI for Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/js/coreui.bundle.min.js"   crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and CoreUI for Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/js/coreui.min.js" integrity="sha384-85mv4P1wdLGe7AOAJKs31hW8LZHApEb3/mOieV4JbvF2v99+TmYLrpvmlj9edI/C" crossorigin="anonymous"></script>
-->
<script>
    if (document.body.classList.contains('dark-theme')) {
        var element = document.getElementById('btn-dark-theme');
        if (typeof(element) != 'undefined' && element != null) {
            document.getElementById('btn-dark-theme').checked = true;
        }
    } else {
        var element = document.getElementById('btn-light-theme');
        if (typeof(element) != 'undefined' && element != null) {
            document.getElementById('btn-light-theme').checked = true;
        }
    }

    function handleThemeChange(src) {
        var event = document.createEvent('Event');
        event.initEvent('themeChange', true, true);

        if (src.value === 'light') {
            document.body.classList.remove('dark-theme');
        }
        if (src.value === 'dark') {
            document.body.classList.add('dark-theme');
        }
        document.body.dispatchEvent(event);
    }
</script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
</body>
</html>
