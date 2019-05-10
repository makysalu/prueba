<?php
class Trabajador extends Conexion
{
  private $nombre;
  private $apellidos;
  private $precio_hora;
  private $horas;

  function __construct()
  {
  }
  public function comprobarCampos($post){
     $error=null;
     if(!isset($post)||!isset($post["nombre"])||!isset($post["apellidos"])||!isset($post["precio_hora"])||!isset($post["horas"])){
       $error="";
     }elseif($post["nombre"]==""){
       $error="No as introducido el Nombre";
     }elseif($post["apellidos"]==""){
       $error="No has introducido los Apellido";
     }elseif($post["precio_hora"]==""){
       $error="No has introducido el Precio Hora";
     }elseif($post["horas"]==""){
       $error="No has introducido las horas";
     }else{
       $error=false;
       $this->nombre=$post["nombre"];
       $this->apellidos=$post["apellidos"];
       $this->precio_hora=$post["precio_hora"];
       $this->horas=$post["horas"];
     }
     return $error;
   }

   public function insertarTrabajador()
   {
      $consulta="INSERT INTO trabajador (nombre, apellidos, precio_hora)
      VALUES ('$this->nombre', '$this->apellidos', $this->precio_hora)";
      $this->conexion->query($consulta);
    }

    public function ultimoRegistro()
    {
      $consulta="select * from trabajador order by id desc limit 1";
      $resultado=$this->conexion->query($consulta);
      foreach($resultado as $value){
        $idTrabajador=$value["id"];
      }
      return $idTrabajador;
    }

    public function insertarTrabajadorProyecto($trabajador,$proyecto,$horas)
    {
      $consulta="insert into trabajador_proyecto (id_trabajador, id_proyecto, horas)
      values ($trabajador,$proyecto,$horas);";
      $this->conexion->query($consulta);
    }
}
 ?>
