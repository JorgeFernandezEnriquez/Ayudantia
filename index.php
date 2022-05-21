<?php
include("con_db.php");
    if(!$conex){
        echo "error en el servidor";
    }
    $id=1;
    if(!empty($_GET['id'])){
        $idimg=$_GET['id'];
    }else{
        $idimg=$id;
    }
    $consulta = "SELECT id, url FROM Imagenes WHERE id=$idimg";
    $resultado = mysqli_query($conex,$consulta);
    $dato = $resultado->fetch_assoc();
    $imagen = $dato["url"];
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
    <form  method="post">
        <input type="text" name="url">
        <input type="submit" name="crear" value="Guardar Imagen">
        <?php
        include("crear.php")
        ?>
    </form>
   
    
    <table>
        <tr>
            <th>ID</th>
            <th>URL</th>
            <th>MODIFICAR</th>
            <th>ELIMINAR</th>
        </tr>
        <?php 
            $sql="SELECT * FROM Imagenes ORDER BY id";
            $res=mysqli_query($conex,$sql);
            $verFilas = mysqli_num_rows($res);
            while($datos=mysqli_fetch_array($res)){
                echo '
                      <tr>
                      <td><a href="index.php?id='.$datos['id'].'">'.$datos['id'].'</a></td>
                      <td>'.$datos['url'].'</td>
                      <td><a href="update.php?id='.$datos['id'].'">MODIFICAR</a></td>
                      <td><a href="delete.php?id='.$datos['id'].'">ELIMINAR</a></td>  
                      </tr>';
            }
        ?>
    </table>
    <img src="<?php echo $imagen ?>" alt="gato">
</body>
</html>
