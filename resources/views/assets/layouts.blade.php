<html>
<head>
<title>@yield('title')</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
@yield('content')
<footer>
<script src="{{ URL('/') }}/public/assets/js/custom.js"></script>
</footer>
</body>
</html>