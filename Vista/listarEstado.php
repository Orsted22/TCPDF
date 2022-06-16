<?php
require_once('../Controlador/ControlaEstado.php');
$controlaEstado = new controlaEstado();
$listarEstado = $controlaEstado->listarEstado();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Mostrar Estado</title>
</head>
<body>
    <br> 
    <a class="btn btn-dark btn-block" href="../Vista/registrarEstado.php">Registrar Estado</a>
    <br> <br>
    <table  id="example" class="table table-dark table-striped-columns" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listarEstado as $Estado){
                    echo "<tr>";
                    echo "<td>".$Estado['idEstadoTarea']."</td>";
                    echo "<td>".$Estado['estado']."</td>";
                    echo "<td>
                    <form method='POST' action='../Controlador/controlaEstado.php'>
                    <input type='hidden' name='idEstadoTarea' value=".$Estado['idEstadoTarea']." />
                    <button type='submit' name='editar'>Editar</button>
                    </form>
                    <a href='#' onclick='validarEliminacion($Estado[idEstadoTarea])' >Eliminar</a>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
<script>
    function validarEliminacion(idEstadoTarea){
        let eliminar = "";
        if(confirm('¿Está seguro de eliminar el estado?')){
            document.location.href = "../Controlador/controlaEstado.php?idEstadoTarea="+idEstadoTarea+"&eliminar";
        }
    }



</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>