<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAJAS</title>
</head>
<body>
    <?php
        $correo = isset($_REQUEST['CORREO'])? $_REQUEST['CORREO'] :null;
    ?>

    <h1>ELIMINAR</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"method="post">
    <fieldset>
       <legend>Eliminar registros</legend>
       <label for="correo ">Correo a buscar:</label>
       <input type="text" name="correo" id="correo"
             value="<?php echo $correo; ?>">
       <input type="submit" name="buscar" id="buscar">
       <?php
       include("conexion.php");
       $db = new Database();
       if (isset($_REQUEST['buscar'])){
        $query = $db -> connect()->prepare('SELECT * FROM registro WHERE CORREO = :correo');
        $query -> setFetchMode(PDO::FETCH_ASSOC);
        $query -> execute(['CORREO'=> $correo]);
        $row = $query -> fetch
        if ($query-> rowCount()<=0){
            print "<h5>Registro encontrado: </h5>";
            print "<hr/>";
            print "<table>";
            print "<tr>";
            print "<th>ID</th>";
            print "<td>".$row ['Id']."</td>";
            print "</tr>";
            
            print  "<tr>";
            print "<th>CORREO</th>";
            print "<td>".$row['Correo']."</td>";
            print "</tr>"; 
            
            print  "<tr>";
            print "<th>NOMBRE</th>";
            print "<td>".$row['Nombre']."</td>";
            print "</tr>";

            print  "<tr>";
            print "<th>APELLIDO</th>";
            print "<td>".$row['Apellido']."</td>";
            print "</tr>";

            print  "<tr>";
            print "<th>GENERO</th>";
            print "<td>".$row['Genero']."</td>";
            print "</tr>";

            print  "<tr>";
            print "<th>MUNICIPIO</th>";
            print "<td>".$row['Municipio']."</td>";
            print "</tr>";

            print  "<tr>";
            print "<th>Fecha</th>";
            print "<td>".$row['fechaRegistro']."</td>";
            print "</tr>";

            print "</table>";
            print "<hr/>";
            print "<input type='submit' name='eliminar' 
                  value='Eliminar Registro'>";
        }
       }
       if (isset($_REQUEST['eliminar'])){
        $correo= isse($_REQUEST['correo']) ? $_REQUEST['correo']: null;
        $query  = $db ->connect()->prepare("DELETE FROM registro WHERE CORREO = :correo");
        $query->execute(['correo'=>$correo]);
        if (!$query){
            echo "Error: ".$query->errorInfo(); 
        }
        echo "<h5>Registro eliminado</h5>";

       }
       ?>
    </fieldset>
   </form>
</body>
</html>