<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenido a nuestro sitio web</title>
</head>
<body>
    <h2>Bienvenido a nuestro sitio web</h2>
    <p>¡Gracias por registrarte en nuestro sitio web!</p>
    <p>A continuación encontrarás los detalles de tu cuenta:</p>
    <ul>
        <li><strong>Correo electrónico:</strong> {{ $email }}</li>
        <li><strong>Contraseña:</strong> {{ $password }}</li>
    </ul>
    <p>Por favor, guarda esta información en un lugar seguro. Puedes utilizar estos datos para iniciar sesión en nuestro sitio web.</p>
    <p>Para acceder a tu cuenta, por favor haz clic en el siguiente enlace:</p>
    <p><a href="{{ $url }}">Iniciar sesión</a></p>
    <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos.</p>
    <p>¡Esperamos que disfrutes de tu experiencia en nuestro sitio!</p>
    <p>Saludos,</p>
    <p>El equipo de nuestro sitio web</p>
</body>
</html>
