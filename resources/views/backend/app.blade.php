<!DOCTYPE html>
<html>
<head>
    <title>Backend Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">Backend Panel</span>
    <a href="{{ route('home') }}" class="btn btn-sm btn-light">Back to Site</a>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
