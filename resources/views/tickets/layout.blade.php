<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <title>LS Tickets</title>
</head>
<body>
    <div class="container">
        <header id="main-header">
            <a href="{{ route('tickets.index') }}">
                <img id="header-home-icon" src="{{ asset('img/home-filled.svg') }}" alt="Home icon">
            </a>
            @yield('header')
            <a id="header-create-ticket-a" href="{{ route('tickets.create') }}">Create a new ticket</a>
        </header>
        <section id="main-content">
            @yield('content')
        </section>
    </div>
</body>
</html>