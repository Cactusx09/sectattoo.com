<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sectattoo</title>

    <link href="{{ mix('css/app.css') }}" />
</head>


<body>

    <div id="app"></div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
