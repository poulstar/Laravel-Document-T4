<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="SwaggerUI" />
    <title>SwaggerUI</title>
    <link rel="stylesheet" href="{{ asset('swagger/swagger-ui.css') }}" />
    <script src="{{ asset('swagger/swagger-ui-bundle.js') }}" defer></script>
    <script defer>
        window.onload = () => {
            window.ui = SwaggerUIBundle({
                url: '{{ asset('swagger/api.yaml') }}',
                dom_id: '#swagger-ui',
                persistAuthorization: true
            });
        };
    </script>
</head>

<body>
    <div id="swagger-ui"></div>
</body>

</html>
