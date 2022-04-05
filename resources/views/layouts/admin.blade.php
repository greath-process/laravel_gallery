<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin.inc.styles')
    <title>Document</title>
</head>
<body>
    <x-header></x-header>
    <div class="container-fluid">
        <div class="row">
            <x-nav></x-nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                @yield('content')
            </main>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>
