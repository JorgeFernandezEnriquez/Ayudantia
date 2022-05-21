<?php
    include("con_db.php");
    if (isset($_POST['crear'])){
        if (strlen($_POST['url'])>1) {
            $url= $_POST['url'];
            $consulta="INSERT INTO Imagenes values (null,'$url')";
            $resultado= mysqli_query($conex,$consulta);
            if ($resultado) {
                echo "";                  
            }
        }else{
            echo "Ingrese una url";
        }
    }
?>