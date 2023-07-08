<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elementos de formulario</title>
    <style>
        body {
            font-family: sistem-ui;
        }
    </style>
</head>

<body>
    <h1>Elementos de formulario</h1>
    <form action="programa2_resp.php" method="post">
        <fieldset>
            <legend>Datos personales</legend>
            <label for="nombre">Nombre:</label>
            <input required autofocus type="text" id="nombre" name="nombre" placeholder="SOLO MAYUSCULAS">
            <br /><br />
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="SOLO MAYUSCULAS" readonly value="Guardado Galindo">
            <br /><br />
            <label for="radio">Género:</label>
            <input type="radio" checked name="genero" value="F" id="genero">Femenino
            <input type="radio" name="genero" value="M" id="genero">Masculino
            <br /><br />
            <label for="municipio">Selecciona tu municipio:</label>
            <select name="municipio" id="municipio">
                <option value="Aguascalientes" selected>Aguascalientes</option>
                <option value="Asientos">Asientos</option>
                <option value="Cosio">Cosío</option>
                <option value="Pabellon">Pabellón</option>
                <option value="Rincon">Rincón de Romos</option>
            </select>
            <br /><br />
            <label for="">Selecciona los idiomas:</label><br>
            <input type="checkbox" name="ingles" id="ingles">Inglés
            <input type="checkbox" name="frances" id="frances">Francés
            <input type="checkbox" name="japones" id="japones">Japonés
            <input type="checkbox" name="italiano" id="italiano">Italiano
            <br><br>
            <label for="comentarios">Comentarios:</label>
            <textarea name="comentarios" id="comentarios" cols="30" rows="5"></textarea>
            <br><br>
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo">
            <br><br>
            <label for="registro">Fecha de registro:</label>
            <input type="date" name="registro" id="registro">
            <br><br>
            <input type="submit" name="enviar" id="enviar">
        </fieldset>
    </form>
</body>

</html>