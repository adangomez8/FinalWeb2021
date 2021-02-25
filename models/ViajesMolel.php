<?php

class ViajesModel {
    public function __construct() {
        $this->db = $this->createConection();
    }

    Private function createConection(){
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_final';
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function getAllViajes(){
        $sentencia = $this->db->prepare("SELECT * FROM Viaje");
        $sentencia->excecute();
        $viajes= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $viajes;
    }

    public function getViajeById($id){
        $sentencia = $this->db->prepare("SELECT Viaje.id, Viaje.nro_Viaje, Viaje.dia, Viaje.hora, Viaje.empresa, 
        Viaje.id_ciudad_origen, Viaje.id_ciudad_destino FROM Viaje WHERE id=?");
        $sentencia->excecute([$id]);
        $viaje= $sentencia->fetch(PDO::FETCH_OBJ);

        return $viaje;
    }

    public function borrarViaje($id){
        $sentencia= $this->db->preprare("DELETE FROM Viajes WHERE Viajes.id=?");
        $sentencia->excecute([$id]);
    }

    public function getNroViaje($id){
        $sentencia = $this->db->prepare("SELECT Pasaje.nro_viaje FROM Viaje WHERE id=?");
        $sentencia->excecute([$id]);
        $nro_viaje= $sentencia->fetch(PDO::FETCH_OBJ);

        return $nro_viaje;
    }
}