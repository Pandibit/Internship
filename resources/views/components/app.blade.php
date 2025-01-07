<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>

<body class="box-border font-body">

<div class="flex flex-col">
    <x-header.header/>
    {{ $slot }}
    <x-footer.footer/>
</div>
</body>

</html>
