<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script>
        window.currentUser = <?= json_encode(auth()->user()); ?>;
    </script>
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app"></div>
</body>

</html>