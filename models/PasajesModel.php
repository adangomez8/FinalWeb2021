<?php

class PasajesModel {
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

    public function getPasajesDelViaje($id){
        $sentencia = $this->db->prepare("SELECT Pasaje.id AS idPasaje, Pasaje.dni, Pasaje.cantidad, Pasaje.cancelado
        Pasaje.id_viaje, Viaje.id FROM Pasaje JOIN Viaje ON Pasaje.id_viaje=Viaje.id WHERE Pasaje.id_viaje=?");
        $sentencia->excecute([$id]);
        $pasajes= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $pasajes;
    }

    public function cancelarVuelo($id){
        $sentencia= $this->db->prepare("UPDATE Pasaje SET cancelado=1 WHERE Pasaje.id=?");
        $sentencia->excecute([$id]);
    }

    public function getDNIDepasaje($id){
        $sentencia = $this->db->prepare("SELECT Pasaje.dni, Pasaje.id_viaje, Viaje.id FROM Pasaje 
        JOIN Viaje ON Pasaje.id_viaje=Viaje.id WHERE Pasaje.id_viaje=?");
        $sentencia->excecute([$id]);
        $dni= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $dni;
    }
}