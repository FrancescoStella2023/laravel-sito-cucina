<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield("title")
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light bg-gradient min-vh-100 d-flex flex-column">
    <header class=" d-flex justify-content-center bg-dark text-white p-2">
        <h1>
            @yield("title")
        </h1>
    </header>
    <div class="conainer  m-4">
        @yield("content")
    </div>
    <footer class="d-flex justify-content-center flex-grow-1 bg-dark text-white pt-2">
        <p>2026 - Cucina</p>
    </footer>
</body>

</html>