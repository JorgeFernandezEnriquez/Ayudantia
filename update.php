<?php
    include("con_db.php");
    if (isset($_GET['id'])){
        if (!empty($_GET['id'])) {
            $id= $_GET['id'];
            $consulta="SELECT url FROM Imagenes WHERE id = $id";
            $resultado= mysqli_query($conex,$consulta);
            if (mysqli_num_rows($resultado) == 1) {
                $row = mysqli_fetch_array($resultado);
                $url=$row['url'];              
            }
        }
    }
    if (isset($_POST['update'])){
        if (!empty($_POST['url'])) {
            $id= $_GET['id'];
            $url= $_POST['url'];
            $consulta="UPDATE Imagenes SET url='$url'  WHERE id = $id";
            $resultado= mysqli_query($conex,$consulta);
            if ($resultado) {
                header("Location: index.php");              
            }
        }else{
            echo "Ingrese una url";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Actividad</title>
</head>
<body>
    <h1>Actividad</h1>
    
    <form  action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <input type="text" name="url" value="<?php echo $url;?>">
        <input type="submit" name="update" value="Guardar Imagen">
    </form>
</body>
</html>
