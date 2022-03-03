<!DOCTYPE html>
<html>
  <head>
  <title>HTML5 Skeleton</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="HTML5 skeleton index.html">
  <meta name="keywords" content="html5,skeleton,index,homepage,jquery,bootstrap">
  <meta name="author" content="Arul John">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" rel="stylesheet">
  </head>
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
<main role="main">
  <div class="container">
    <div class="row">
      @yield('content')
    </div>
  </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
//<![CDATA[
window.jQuery || document.write(unescape('%3Cscript src="/jquery.min.js">%3C/script>'))
//]]>
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
//<![CDATA[
typeof $().modal == 'function'  || document.write(unescape('%3Cscript src="/bootstrap.min.js">%3C/script>'))
//]]>
</script>
</body>

