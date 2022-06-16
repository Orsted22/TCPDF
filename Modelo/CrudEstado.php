<?php
require_once('Conexion.php');


class CrudEstado{

    public function __construct(){

    }

    public function listarEstado(){

        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->query('SELECT * FROM estados_tareas ORDER BY idEstadoTarea ASC');
        $sql->execute();
        Conexion::desconectar($baseDatos);
        return($sql->fetchAll()); 
    }

    public function registrarEstado($Estado){

        $mensaje = "";
        $baseDatos = Conexion::conectar();

        $sql = $baseDatos->prepare('INSERT INTO estados_tareas(idEstadoTarea, estado) VALUES (:idEstadoTarea, :estado)');
        $sql->bindValue('idEstadoTarea', '');
        $sql->bindValue('estado', $Estado->getestado());
        try{
            $sql->execute(); 
            $mensaje =  "Registro Exitoso <a href='../Vista/listarEstado.php'>Volver</a>";
        }
        catch(Excepcion $e){
            $mensaje = $e->getMessage(); 
        }
        Conexion::desconectar($baseDatos); 
        return $mensaje;
    }
    
    public function buscarEstado($Estado){

        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->query("SELECT * FROM estados_tareas 
               WHERE idEstadoTarea=".$Estado->getidEstadoTarea());
        $sql->execute();
        Conexion::desconectar($baseDatos);
        return $sql->fetch();

    }

    public function actualizarEstado($Estado){

        $mensaje = "";

        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('UPDATE estados_tareas 
        SET estado =:estado
        WHERE idEstadoTarea=:idEstadoTarea');
        $sql->bindValue('idEstadoTarea', $Estado->getidEstadoTarea());
        $sql->bindValue('estado', $Estado->getestado());
        try{
            $sql->execute(); 
            $mensaje =  "Actualización Exitosa <a href='../Vista/listarEstado.php'>Volver</a>";
        }
        catch(Excepcion $e){
            $mensaje = $e->getMessage();
        }
        Conexion::desconectar($baseDatos);
        return $mensaje;
    }

    public function eliminarEstado($Estado){
        $mensaje = "";
        $baseDatos = Conexion::conectar();

        $sql = $baseDatos->prepare('DELETE FROM estados_tareas 
        WHERE idEstadoTarea=:idEstadoTarea');
        $sql->bindValue('idEstadoTarea', $Estado->getidEstadoTarea());
        try{
            $sql->execute(); 
            $mensaje =  "Eliminación Exitosa";
        }
        catch(Excepcion $e){
            $mensaje = $e->getMessage(); 
        }
        Conexion::desconectar($baseDatos); 
        return $mensaje;
    }
 
}

?>