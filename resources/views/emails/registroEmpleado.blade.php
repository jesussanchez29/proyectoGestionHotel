<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registro de empleado</title>
</head>
<body>
    <h2>Bienvenido(a) al sistema</h2>
    <p>Estimado(a) empleado(a),</p>
    <p>Tu cuenta de empleado ha sido creada exitosamente. A continuación se muestran tus credenciales de inicio de sesión:</p>
    <ul>
        <li><strong>Correo electrónico:</strong> {{ $email }}</li>
        <li><strong>Contraseña:</strong> {{ $password }}</li>
    </ul>
    <p>Puedes acceder al sistema haciendo clic en el siguiente enlace:</p>
    <p><a href="{{ $url }}">Iniciar sesión</a></p>
    <p>Te recomendamos cambiar tu contraseña una vez que hayas iniciado sesión en el sistema.</p>
    <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nosotros.</p>
    <p>¡Gracias y bienvenido(a) al equipo!</p>
</body>
</html>
