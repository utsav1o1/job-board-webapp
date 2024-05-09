<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Home' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="mx-auto mt-10 max-w-2xl bg-slate-200 text-slate-800">
    {{ $slot }}
</body>

</html>
