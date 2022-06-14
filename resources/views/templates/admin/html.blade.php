<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <title>Eviluck Admin</title>
</head>

<body>

@yield('admin-content')

<script src="/scripts/jquery.js"></script>
<script src="/scripts/main.js"></script>
<script src="/scripts/bootstrap.bundle.min.js"></script>
</body>

</html>
