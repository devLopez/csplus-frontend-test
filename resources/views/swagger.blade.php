<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@3.27.0/swagger-ui.css">
    </head>
    <body>
        <div id="app">

        </div>
        <script src="https://unpkg.com/swagger-ui-dist@3/swagger-ui-bundle.js"></script>
        <script>
            const ui = SwaggerUIBundle({
                url: "{{ asset('/openapi.yaml') }}",
                dom_id: '#app'
            })
        </script>
    </body>
</html>