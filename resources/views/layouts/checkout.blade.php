
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF- 8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @stack('addon-style')

  @include('includes.style')
</head>

<body>
  @include('includes.navbar-alternate')

  @yield('content')

  @include('includes.footer')

  @include('includes.script')
  
  @stack('addon-script')
</body>
</html>