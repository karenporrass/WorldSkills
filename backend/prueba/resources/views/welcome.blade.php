<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <!-- Styles -->
    </head>
    <body >
        <div id="app"></div>
        @vite('resources/js/app.js')

       
    </body>
    <style>
            body{
                margin: 0px;
                padding: 0px;
            }
        </style>
</html>
