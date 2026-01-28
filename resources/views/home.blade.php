<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Көмек - By Ticket</title>
    @vite(['resources/css/app.css', 'resources/css/reset.css', 'resources/js/app.js'])
</head>
<body>
            @include('components.header')

        <main>
            <section>
                @include('components.poster')
            </section>
        </main>
        @include('components.footer')
</body>
</html>
