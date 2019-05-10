<?php
class Proyecto extends Conexion
{
  private $nombre;
  function __construct()
  {
  }

   public function listarProyectos()
   {
      $consulta="select * from proyecto";
      $resultado=$this->conexion->query($consulta);
      return $resultado;
    }
}
 ?>
