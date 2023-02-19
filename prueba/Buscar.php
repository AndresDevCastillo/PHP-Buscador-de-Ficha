<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="id">Ingrese el ID que desea buscar:</label>
        <input type="text"   name="Cedula">
        <input type="submit" name="Buscar" >
        
    </form>

    <?php
    if (isset($_POST['Buscar'])) {
        include('conexion.php');
    
        $Cedula = $_POST['Cedula'];
        $sql = "SELECT * FROM estudiantes WHERE Cedula = $Cedula";
        $resultado = mysqli_query($conexion, $sql);
        while ( $row= mysqli_fetch_array($resultado)){  ?>

            <p><?php echo $row['Cedula']; ?></p>
            <p><?php echo $row['Nombre'];  ?></p>
            <p><?php echo $row['Apellido'];  ?></p>
            <p><?php echo $row['Edad'];   ?></p>
     

        
        <?php    }
    
    
    }  ?>
   

</body>
</html>