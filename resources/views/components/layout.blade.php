<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>Vetenary clinic</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/owners/create">Add a Owner</a>
        <a href="/animals/create">Add a Pet</a>
    </nav>
    <main>
        @include ('components.messages')
    
        {{ $slot }}

    </main>
</body>
</html>