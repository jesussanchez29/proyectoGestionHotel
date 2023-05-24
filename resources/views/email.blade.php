<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        /* Estilos CSS para el cuerpo del correo */
    </style>
</head>

<body>
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
        <h2 style="margin-top: 0;">Registro Cliente</h2>
        <p>¡Gracias por reservar en nuestro hotel!</p>

        <p>A continuación, te proporcionamos los detalles de tu cuenta:</p>

        <ul>
            <li><strong>Correo electrónico:</strong> {{ $email }}</li>
            <li><strong>Contraseña:</strong> {{ $password }}</li>
        </ul>

        <p>Puedes inicar sesion ya, clicando en el siguiente enlace:</p>
        <a href="{{ $url }}">{{ $url }}</a>

        <p>Te damos la bienvenida y esperamos que disfrutes de tu estancia con nosotros.</p>

        <p>Saludos cordiales,</p>
        <p>El equipo del Hotel</p>
    </div>
</body>

</html>
