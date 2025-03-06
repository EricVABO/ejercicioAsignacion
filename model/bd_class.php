<?php
class Conexion
{
    private $db_conexion;
    public function __construct()
    {
        $this->db_conexion = new PDO('mysql:host=localhost;port=3306;dbname=tareas', 'root', '');
        $this->db_conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getConexion()
    {

        return $this->db_conexion;
    }
}
