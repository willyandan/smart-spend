<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
		<vc-nav></vc-nav>
		@yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
