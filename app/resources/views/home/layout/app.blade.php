<!DOCTYPE html>
<html>
@include('home.components.header')
<body>
@include('home.components.navbar')
<main role="main">
  <div class="container">
    <div class="row">
      @yield('content')
    </div>
  </div>
</main>
@include('home.components.footer')
</html>
