<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta PHP</title>
</head>
<body>
    <h1>Respuesta del servidor.</h1>
    <?php 
        echo "<h2>Datos personales</h2>";
        echo "Nombre: ".$_REQUEST['nombre']."<br/>";
        echo "Apellidos: ".$_REQUEST['apellidos']."<br/>";
        if($_REQUEST['genero'] == 'F'){
            echo "Género: Femenino";
        }else{
            echo "Género: Masculino";
        }
        echo "<br/>Municipio de procedencia: ".$_REQUEST['municipio']."<br/>";
        echo "Idiomas selecionados: <br/>";
      if(isset($_REQUEST['ingles'])){echo "Inglés<br/>";}
      if(isset($_REQUEST['frances'])){echo "Francés<br/>";}
      if(isset($_REQUEST['japones'])){echo "Japonés<br/>";}
      if(isset($_REQUEST['italiano'])){echo "Italiano<br/>";}
     
      echo "Comentarios: <br/>";
      echo "".$_REQUEST['comentarios']."<br/>";

      echo "Fecha de registro: ".$_REQUEST['registro']."<br/>";
    ?>
</body>
</html>