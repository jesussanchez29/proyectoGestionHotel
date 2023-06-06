<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        thead {
            background-color: #b3c8e6;
            /* Color azul oscuro */
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e6e6e6;
        }
    </style>
</head>

<body>
    <h1>Reporte de Reservas de Habitaciones</h1>
    <table>
        <thead>
            <tr>
                <th>Fecha de Llegada</th>
                <th>Fecha de Salida</th>
                <th>Abonado</th>
                <th>Cliente</th>
                <th>Nº Habitacion</th>
                <th>Empleado Encargado</th>
            </tr>
        </thead>
        <tbody>
            @if (count($reportesReserva) > 0)
                @foreach ($reportesReserva as $reserva)
                    <tr>
                        <td>{{ $reserva->fechaLLegada }}</td>
                        <td>{{ $reserva->fechaSalida }}</td>
                        <td>{{ $reserva->abonado }}€</td>
                        <td>{{ $reserva->usuario->cliente->nombre }} {{ $reserva->usuario->cliente->apellidos }}</td>
                        <td>{{ $reserva->habitacion->numero }}</td>
                        <td>
                            @if ($reserva->usuario->empleado)
                                {{ $reserva->usuario->empleado->nombre }} {{ $reserva->usuario->empleado->apellidos }}
                            @else
                                Sin asignar
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Sin Reservas Disponibles</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>

</html>
