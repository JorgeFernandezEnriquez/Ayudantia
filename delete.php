<?php
    include("con_db.php");
    if (isset($_GET['id'])){
        if (!empty($_GET['id'])) {
            $id= $_GET['id'];
            $consulta="DELETE FROM Imagenes WHERE id = $id";
            $resultado= mysqli_query($conex,$consulta);
            if ($resultado) {
                header("Location: index.php");              
            }
        }
    }
?>