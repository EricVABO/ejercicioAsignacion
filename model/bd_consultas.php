<?php
require_once("bd_class.php");
class Consultas extends Conexion
{
    public function __construct()

    {

        parent::__construct();
    }

    function usuario($nombre)
    {
        $db_conexion = $this->getConexion();
        if ($db_conexion) {

            $consulta = "SELECT * FROM usuarios WHERE nombre=:nombre";

            $stmt = $db_conexion->prepare($consulta);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        }
    }
}
