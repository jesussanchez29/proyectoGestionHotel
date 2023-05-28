<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulario de contacto</title>
</head>
<body>
    <h1>Formulario de contacto</h1>
    <p>Has recibido un mensaje de contacto:</p>
    <ul>
        <li><strong>Nombre:</strong> {{ $nombre }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
    </ul>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $mensaje }}</p>
</body>
</html>
