<html>

<head>
    <script>
        window.currentUser = <?= json_encode(auth()->user()); ?>;
    </script>
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app"></div>
</body>

</html>