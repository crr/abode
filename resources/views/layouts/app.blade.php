<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Corsair Abode</title>
    <meta name="description" content="{{ $abode->getDescription() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel='stylesheet' type='text/css'>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Dosis", sans-serif;
            background: url('{{ $abode->getBackground() }}') fixed #111;
            padding-top: 80px;
            margin-bottom: 40px;
        }

        p, h1, h2, h3, h4, .display-4, pre {
            color: #F1F1F1;
            text-shadow: 1px 2px 5px rgba(0,0,0,0.4);
        }

        .card-title {
            margin-bottom: 0px;
        }

        .card-block {
            padding: 0.75rem;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .navbar-brand {
            font-family: "Dosis", sans-serif;
            font-weight: 300;
            position: absolute;
            top: -15px;
            font-size: 50px;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.6);
        }

        .bg-primary {
            background: url('{{ $abode->getNavBackground() }}') center center repeat rgba(2,117,216,0.7) !important;
            border-bottom: 3px solid rgba(0,0,0,0.3);
        }

        input[type=text], input[type=password], input[type=email] {
            background: #333;
            border: 3px solid #000;
            margin-bottom: 5px;
        }
        .list-group-item {
            background: #555;
            color: #FFF;
            border-top: 0px;
            border-bottom: 3px solid #000 !important;
            width: 100%;
            display: block;
        }
    </style>
</head>
<body id="app-layout">

<nav class="navbar navbar-dark bg-primary navbar-fixed-top">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ $abode->getName() }}
    </a>
  <ul class="nav navbar-nav pull-right">
    @if (Auth::guest())
        <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Resident/Guest Login</a></li>
    @else
        <li class="nav-item"><a class="nav-link" href="/tasks">Tasks</a></li>
    @if (Auth::User()->isAdmin())
        <li class="nav-item"><a class="nav-link" href="/panel/users">Residents</a></li>
        <li class="nav-item"><a class="nav-link" href="/panel/logs">Logs</a></li>
    @endif
        <li class="nav-item"><a href="{{ url('/logout') }}" class="nav-link">Logout</a></li>
    @endif
  </ul>
</nav>
    <div class="container">
    @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
