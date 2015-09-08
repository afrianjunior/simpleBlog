<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>handry blog</title>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- <div class="navbar-header"> -->
    <div class="nav navbar-nav navbar-left">
        <li><a href="/">Home</a></li>
        <li><a href="/admin/article">Article</a></li>
        <li><a href="">About</a></li>
    </div>
    <div class="nav navbar-nav navbar-right">
    	<!-- <li><a href="/auth/login">Login</a></li> -->
    </div>
  </div>
</nav>

<main>
    <div class="container">

      @if(session()->has('flash_message'))
        <div class="alert alert-success">
          {{ session('flash_message') }}
        </div>
      @endif

      <h1>WELCOME TO MY BLOG</h1>
    </div>
</main>

</body>
</html>
