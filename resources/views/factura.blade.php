<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        /* Estilos CSS para la factura */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0;
        }

        section {
            margin-bottom: 40px;
        }

        h2 {
            margin: 0 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        thead th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        footer {
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>Factura</h1>
        <!-- Agrega los detalles de la factura, como el número de factura, fecha, etc. -->
    </header>


    <section>
        <h2>Información del Cliente</h2>
        <table>
            @foreach ($reservas as $reserva)
                <tr>
                    <th>Nombre Completo</th>
                    <td>{{ $reserva->usuario->cliente->nombre }} {{ $reserva->usuario->cliente->apellidos }}</td>
                </tr>
                <tr>
                    <th>Identificacion</th>
                    <td>{{ $reserva->usuario->cliente->tipoIdentificacion }} -
                        {{ $reserva->usuario->cliente->identificacion }}</td>
                </tr>
                <tr>
                    <th>Fecha Nacimiento</th>
                    <td>{{ $reserva->usuario->cliente->fechaNacimiento }}</td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td>{{ $reserva->usuario->cliente->telefono }}</td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td>{{ $reserva->usuario->cliente->direccion }}</td>
                </tr>
            @endforeach
        </table>
    </section>

    <section>
        <h2>Servicios Obtenidos</h2>
        <table>
            <thead>
                <tr>
                    <th>Servicio</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $reservaServicio)
                    <tr>
                        <td>{{ $reservaServicio->servicio->nombre }}</td>
                        <td>{{ $reservaServicio->servicio->precio }}</td>
                        <td>{{ $reservaServicio->fecha }}</td>
                        <td>{{ $reservaServicio->hora }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section>
        <h2>Reserva del Hotel</h2>
        <table>
            <thead>
                <tr>
                    <th>Fecha Entrada</th>
                    <th>Fecha Salida</th>
                    <th>Habitación</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->fechaLLegada }}</td>
                        <td>{{ $reserva->fechaSalida }}</td>
                        <td>{{ $reserva->habitacion->numero }}</td>
                        <td>{{ $reserva->habitacion->tipoHabitacion->nombre }}</td>
                        <td>{{ $reserva->habitacion->tipoHabitacion->precio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <footer>
        <table>
            <tr>
                <th>Total Servicios:</th>
                <td>{{ $totalServicios }}</td>
            </tr>
            <tr>
                <th>Total Reservas:</th>
                <td>{{ $totalReservas }}</td>
            </tr>
            <tr>
                <th>Total Factura:</th>
                <td>{{ $totalServicios + $totalReservas }}</td>
            </tr>
        </table>
    </footer>
</body>

</html>
