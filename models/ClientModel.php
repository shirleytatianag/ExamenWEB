<?php
class ClientModel
{
    private $Conection;

    function __construct($Connection)
    {
        $this->Conection=$Connection;
    }

    function tipoDoc()
    {
        $sql = "SELECT * FROM mis_tejidos.tipo_documento";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function listPais()
    {
        $sql = "SELECT * FROM mis_tejidos.pais";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function listDepartamento($pais)
    {
        $sql = "SELECT * FROM mis_tejidos.departamento WHERE cod_pais='170'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function listCiudad($depar)
    {
        $sql = "SELECT * FROM mis_tejidos.ciudad WHERE cod_departamento='$depar'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function sharchDocumento($doc)
    {
        $sql = "SELECT * FROM mis_tejidos.cliente WHERE documento_cliente='$doc'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function addCliente($nombre1,$nombre2,$apellido1,$apellido2,$documento,$sexo,$tipo_docu,$telefono,$correo,$direccion,$departamento,$ciudad)
    {
        $sql = "INSERT INTO mis_tejidos.cliente(
            documento_cliente, tipo_documento, nombre1_cliente, nombre2_cliente, apellido1_cliente, apellido2_cliente, sexo_cliente, telefono_cliente, correo_cliente, direccion_cliente, cod_pais, cod_departamento, cod_ciudad)
            VALUES ('$documento','$tipo_docu','$nombre1','$nombre2','$apellido1','$apellido2','$sexo','$telefono','$correo','$direccion','170', '$departamento','$ciudad');";
            $this->Conection->query($sql);
    }

    function listClient()
    {
        $sql = "SELECT c.*,ci.nombre_ciudad
                FROM mis_tejidos.cliente c INNER JOIN mis_tejidos.ciudad ci ON (c.cod_ciudad=ci.cod_ciudad)";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }
    
    function filtroBusqueda($filtro,$busqueda)
    {
        $sql = "SELECT c.*,ci.nombre_ciudad
        FROM mis_tejidos.cliente c INNER JOIN mis_tejidos.ciudad ci ON (c.cod_pais=ci.cod_pais)
        AND (c.cod_departamento=ci.cod_departamento) AND (c.cod_ciudad=ci.cod_ciudad)
        WHERE c.$filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function filtroBusquedaCiu($filtro,$busqueda)
    {
        $sql = "SELECT c.*,ci.nombre_ciudad
        FROM mis_tejidos.ciudad ci  INNER JOIN mis_tejidos.cliente c ON (c.cod_pais=ci.cod_pais)
        AND (c.cod_departamento=ci.cod_departamento) AND (c.cod_ciudad=ci.cod_ciudad)
        WHERE ci.$filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function showCient($id)
    {
        $sql = "SELECT c.*,ci.nombre_ciudad,d.nombre_departamento,td.nombre_documento
        FROM  mis_tejidos.tipo_documento td
        INNER JOIN mis_tejidos.cliente c ON (td.cod_documento=c.tipo_documento) INNER JOIN mis_tejidos.ciudad ci  ON (c.cod_pais=ci.cod_pais)
        AND (c.cod_departamento=ci.cod_departamento) AND (c.cod_ciudad=ci.cod_ciudad)
        INNER JOIN mis_tejidos.departamento d ON(ci.cod_pais=d.cod_pais) AND (ci.cod_departamento=d.cod_departamento)
        WHERE c.documento_cliente='$id'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function updateClient($nombre1,$nombre2,$apellido1,$apellido2,$documento,$sexo,$tipo_docu,$telefono,$correo,$direccion,$departamento,$ciudad,$doc)
    {
        $sql = "UPDATE mis_tejidos.cliente SET documento_cliente='$documento', tipo_documento='$tipo_docu', nombre1_cliente='$nombre1'
        , nombre2_cliente='$nombre2', apellido1_cliente='$apellido1', apellido2_cliente='$apellido2', sexo_cliente='$sexo', telefono_cliente='$telefono'
        , correo_cliente='$correo', direccion_cliente='$direccion', cod_pais='170', cod_departamento='$departamento', cod_ciudad='$ciudad'
        WHERE documento_cliente='$doc'";
        $this->Conection->query($sql);
    }
}
?>