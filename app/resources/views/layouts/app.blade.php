<!DOCTYPE html>
<html>
    @include('components.header')
<body>
<header class="navbar navbar-default">
  <nav>
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="/">Laravel App - @yield('title')</a>
  </nav>
  <div class="container">
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/help"><span class="fa fa-help-o"></span> Help</a></li>
        <li><a href="/login"><span class="fa fa-sign-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</header>
<div class="container-fluid">
    <div class="row">

    <div class="col-2">
        <!--Rendering Sidebar -->
        @include('home.components.sidebar', [$sidebar,$sidebarCount])
    </div>
    <div class="col-9">
      @yield('content')
        <div id="cards">
        </div>
    </div>
  </div>
</div>  <!--fluid conatiner --> 

    @include('components.footer')
</html>

