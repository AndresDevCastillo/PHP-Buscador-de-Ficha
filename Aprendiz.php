<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="background: #1D976C;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #93F9B9, #1D976C);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #93F9B9, #1D976C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
<div style="width: 400px; margin:  26px auto auto;">
    <form method="POST"> <!-- No se te olvide el metodo POST que no me enviaba y era que no puse el metodo jajajja -->
        <div class="form-group">
            <label for="ExampleCedula">Cedula</label>
            <input type="" class="form-control" id="ExampleCedula" aria-describedby="emailHelp" placeholder="Ej: 123456789" name="Cedula"> <!-- Especificar el name=Cedula  -->
            <small id="emailHelp" class="form-text text-muted">Por favor comfirme su cedula antes de ingresarla</small>
        </div>
        <div class="form-group">
            <label for="ExampleFicha">Ficha</label>
            <input type="" class="form-control" id="ExampleFicha" placeholder="Ej: 2562360" name="Ficha"> <!-- Especificar el name=Ficha  -->
        </div>
        <div style="margin: 15px 0;">
        <button type="submit" class="btn btn-success" role="button" aria-pressed="true" name="Consultar">Consultar</button>
        </div>
    </form>
    
    <?php
    if (isset($_POST['Consultar'])) {  // esto se va ejecutar solo si se presiona el boton consultar
        include('cn.php'); // incluyo la conexion a la base de datos
    
        $Cedula = $_POST['Cedula'];  // con el metodo post guardo el valor de la casilla cedula en la variable $cedula
        $Ficha = $_POST['Ficha'];   // repito el proceso de la casilla

        $sql = "SELECT * FROM Aprendiz WHERE Cedula = $Cedula AND Ficha = $Ficha";  // realizo la consulta donde se especifica los dos campos se tienen que cumplir
        $resultado = mysqli_query($conexion, $sql);   // creo una variable que ejecuta la consulta, $ resultado quedan los datos recibidos
        while ( $row= mysqli_fetch_array($resultado)){  ?>   <!-- Se crea un arreglo con cada resultado y se recorre con while -->
         
            <div class="card" style="width: 18rem;" >
                <img class="card-img-top" src= "<?php echo $row['Foto']; ?>"  alt="Card image cap" height="270px">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['Nombre'];  ?></li>  <!-- Imprimo los datos -->
                        <li class="list-group-item"><?php echo $row['Apellido'];  ?></li>
                        <li class="list-group-item"><?php echo $row['Cedula']; ?></li>
                        <li class="list-group-item"><?php echo $row['Ficha'];   ?></li>
                        <li class="list-group-item"><?php echo $row['Programa'];   ?></li>
                    </ul>
                </div>
        <?php    }
    
    mysqli_close($conexion); // Cierra simpre la conexion para evitar Ataques
    }  ?>
</div>
</body>
</html>