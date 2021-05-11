<?php
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Borrar Clientes</title>
</head>
<body>
<div>
    <h3>Borrar Cliente</h3>
    <!-- Validacion Errores-->
    @if($errors->any())
        <ul>
            @foreach($errors->any() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
<div>
    <form action="{{ route('borrar', $clientes->dni) }}" method="POST">
        @csrf
        @method('DELETE')
        <label>Introduce el DNI del cliente a borrar: <input type="text" name="dni" placeholder="Introduzca su DNI"
                           pattern="[0-9]{8}[A-Za-z]{1}" ></label><br />
        <button type="submit">Eliminar</button>
    </form>

    @if(session('borrar'))
        {{session('borrar')}}
    @endif
</div>
</body>
</html>
