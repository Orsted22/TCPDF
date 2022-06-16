<?php
if(isset($_REQUEST['reporte'])){
    require_once('../../../Modelo/Estado.php');
    require_once('../../../Modelo/CrudEstado.php');
} else {
    require_once('../Modelo/Estado.php');  
    require_once('../Modelo/CrudEstado.php');
}

class controlaEstado{
    
    public function __construct(){

    }

    public function listarEstado(){

        $crudEstado = new CrudEstado();
        return $crudEstado->listarEstado();
    }

    public function registrarEstado($estado){

        $crudEstado = new crudEstado();
        $Estado = new Estado();
        $Estado->setestado($estado);
        $mensaje = $crudEstado->registrarEstado($Estado);
        echo $mensaje;
        
    }

    public function buscarEstado($idEstadoTarea){

        $crudEstado = new CrudEstado();
        $Estado = new Estado();
        $Estado->setidEstadoTarea($idEstadoTarea);

        $datosEstado = $crudEstado->buscarEstado($Estado);
        $Estado->setestado($datosEstado['estado']);

        return $Estado;
    }

    public function actualizarEstado($idEstadoTarea,$estado){

        $crudEstado = new CrudEstado();
        $Estado = new Estado();
        $Estado->setidEstadoTarea($idEstadoTarea);
        $Estado->setestado($estado);

        $mensaje = $crudEstado->actualizarEstado($Estado);
        echo $mensaje;
    }

    public function eliminarEstado($idEstadoTarea){

        $crudEstado = new crudEstado();
        $Estado = new Estado();
        $Estado->setidEstadoTarea($idEstadoTarea);
        $Estado->setestado('');

        $mensaje = $crudEstado->eliminarEstado($Estado);

        echo "<script>
            alert('$mensaje');
            document.location.href='../Vista/listarEstado.php';
        </script>";
    }

    public function desplegarVista($pagina){
        header("Location:../Vista/".$pagina);
    }
}

$controlaEstado = new controlaEstado();
if (isset($_POST['registrar'])){
    $estado = $_POST['estado'];
    
    $controlaEstado->registrarEstado($estado);
}
else if(isset($_REQUEST['editar'])){
    
    $idEstadoTarea = base64_encode($_REQUEST['idEstadoTarea']);
    $idEstadoTarea = base64_encode($idEstadoTarea);

    $controlaEstado->desplegarVista('editarEstado.php?idEstadoTarea='.$idEstadoTarea);
}
else if (isset($_POST['actualizar'])){ 
    $idEstadoTarea = $_POST['idEstadoTarea'];
    $estado = $_POST['estado'];

    $controlaEstado->actualizarEstado($idEstadoTarea,$estado);

}
else if(isset($_GET['eliminar'])){
    $idEstadoTarea = $_REQUEST['idEstadoTarea'];
    $controlaEstado->eliminarEstado($idEstadoTarea);
}
elseif(isset($_REQUEST['vista'])){
    $controlaEstado->desplegarVista($_REQUEST['vista']);
}

?>