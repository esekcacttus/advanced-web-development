<html>
    <head>
        <title>Cacttus - @yield("title")</title>
    </head>
    <body>
        @section("sidebar")
            The master sidebar
        @show

        <div class="container">
            @yield("content")
        </div>
    </body>
</html>
