<?php
class SalesModel
{
    private $Conection;

    function __construct($Connection)
    {
        $this->Conection=$Connection;
    }

    function showProductSale()
    {
        $sql = "SELECT * FROM mis_tejidos.producto_terminado
        WHERE estado='DISPONIBLE'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll(); 
    }
}

?>