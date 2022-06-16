<?php

class Estado{

    private $idEstadoTarea;
    private $estado;

    
    public function __construct(){ 

    }

    public function setidEstadoTarea($idEstadoTarea){
        $this->idEstadoTarea = $idEstadoTarea;
    }
    public function getidEstadoTarea(){
        return $this->idEstadoTarea;
    }


    public function setestado($estado){
        $this->estado = $estado;
    }
    public function getestado(){
        return $this->estado;
    }

}
?>

