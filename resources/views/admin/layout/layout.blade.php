<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('admin.includes.links')
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
        @include('admin.includes.sidebar')
        <div class="layout-page">
      @include('admin.includes.header')

      @yield('page-content')
    
      @include('admin.includes.footer')
        </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>

    @include('admin.includes.script')
    @stack('extra-scripts')
</body>
</html>