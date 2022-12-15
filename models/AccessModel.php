<?php
class AccessModel
{
private $Connection;

    function __construct($Connection)
    {
        $this->Connection=$Connection;
    }

    function validateFormSession($user,$password)
    {
        $sql = "SELECT * FROM mis_tejidos.acceso WHERE  usuario='$user' AND contrasena='$password'";

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }

    function crearAccess($usuario,$contrasena,$cod_usuario)
    {
        $sql = "INSERT INTO mis_tejidos.acceso (usuario,contrasena,tipo_usuario,cod_usuario ) VALUES ('$usuario','$contrasena','ADMINISTRADOR','$cod_usuario')";
        $this->Connection->query($sql);
    }

    function searchAccess($cod)
    {
        $sql = "SELECT * FROM mis_tejidos.acceso WHERE cod_usuario='$cod'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function searUS($usuario)
    {
        $sql = "SELECT * FROM mis_tejidos.acceso WHERE usuario='$usuario'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateContra($contra,$id){
        $sql = "UPDATE mis_tejidos.acceso SET contrasena='$contra' WHERE cod_login='$id'";
        $this->Connection->query($sql);
    }

}

?>