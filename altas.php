<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de altas</title>

   
</head>
<body>
    <?php 
        include('conexion.php');
        $nombre = $apellidos = $correo = $genero = $municipio = "";
        $ingles = $frances = $japones = "0";
        $db = new DataBase();
        $query = $db->connect()->prepare("SELECT MAX(ID) AS ID FROM registro");
        $query->execute();
        $row = $query->fetch();
        $numero = $row['ID'];
        $numero++;
    ?>

    <h1>Altas de usuarios</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"
    autocomplete="on">

        <fieldset>
            <legend>Alta de usuarios</legend>
            <label for="id">Folio:</label>
            <input type="text" id="id" name="id" value="<?php echo $numero; ?>" readonly size="5">
            <br><br>
            <label for="nombre">Nombre:</label>
            <input required autofocus type="text" id="nombre" name="nombre" placeholder="SOLO MAYUSCULAS">
            <br /><br />
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Solo letras">
            <br /><br />
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" placeholder="Email">
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
                <option value="Pabellón de Arteaga">Pabellón</option>
                <option value="Rincon de Romos">Rincón de Romos</option>
            </select>
            <br><br>
            <label for="">Selecciona los idiomas:</label><br>
            <input type="checkbox" name="ingles" id="ingles">Inglés
            <input type="checkbox" name="frances" id="frances">Francés
            <input type="checkbox" name="japones" id="japones">Japonés
            <br><br>
            <label for="fechaRegistro">Fecha de registro:</label>
            <input type="date" name="fechaRegistro" id="fechaRegistro">
            <br><br>
            <label for="comentario">Comentario</label>
            <textarea name="comentario" id="comentario" cols="30" rows="5"></textarea>
            <br><br>
            <input type="submit" value="Registrar" name="enviar">
        </fieldset>
    </form>
    <?php 
        if(isset($_REQUEST['enviar'])){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $correo = $_POST['correo'];
            $genero = $_POST['genero'];
            $municipio = $_POST['municipio'];
            $fechaRegistro = $_POST['fechaRegistro'];
            $comentario = $_POST['comentario'];

            if(isset($_REQUEST['ingles'])){ $ingles = "1";}
            if(isset($_REQUEST['frances'])){ $frances = "1";}
            if(isset($_REQUEST['japones'])){ $japones = "1";}

            $query = $db->connect()->prepare('SELECT CORREO FROM registro WHERE CORREO = :correo');
            $query->execute(['correo'=>$correo]);
            $row = $query->fetch(PDO::FETCH_NUM);

            if($query->rowCount()<=0){

                $insert = "INSERT INTO registro(CORREO,NOMBRE,APELLIDOS,GENERO,MUNICIPIO,COMENTARIOS,REGISTRO,INGLES,FRANCES,JAPONES) VALUES (:correo,:nombre,:apellidos,:genero,:municipio,:comentario,:fechaRegistro,:ingles,:frances,:japones)";
                $insert = $db->connect()->prepare($insert);
                $insert->bindParam('correo',$correo,PDO::PARAM_STR,50);
                $insert->bindParam('nombre',$nombre,PDO::PARAM_STR,50);
                $insert->bindParam('apellidos',$apellidos,PDO::PARAM_STR,100);
                $insert->bindParam('genero',$genero,PDO::PARAM_STR,10);
                $insert->bindParam('municipio',$municipio,PDO::PARAM_STR,30);
                $insert->bindParam('ingles',$ingles,PDO::PARAM_STR,1);
                $insert->bindParam('frances',$frances,PDO::PARAM_STR,1);
                $insert->bindParam('japones',$japones,PDO::PARAM_STR,1);
                $insert->bindParam('fechaRegistro',$fechaRegistro,PDO::PARAM_STR);
                $insert->bindParam('comentario',$comentario,PDO::PARAM_STR,150);

                $insert->execute();

                if (!$query) {
                    echo "Error: ",$query->errorInfo();
                }
                echo "Registro agregado";

            }else if($query->rowCount() > 0){
                echo "EL CORREO YA EXISTE!!!";
            }
        }
    ?>
</body>
</html>