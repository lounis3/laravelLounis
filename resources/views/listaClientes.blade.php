<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
</head>
<body>
<div>
    <div>
        <h1>Listado de Clientes</h1>
    </div>
    <div>
        @if($clientes->isEmpty())
            <h3>No hay clientes en la Base de Datos</h3>
        @else
            <table class="table" border="1">
                <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>País</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{!! $cliente->dni !!}</td>
                        <td>{!! $cliente->nombre !!}</td>
                        <td>{!! $cliente->apellidos !!}</td>
                        <td>{!! $cliente->direccion !!}</td>
                        <td>{!! $cliente->telefono !!}</td>
                        <td>{!! $cliente->pais !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
</body>
</html>
