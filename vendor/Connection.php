<?php
require_once "Archivos_Privados/setting_connection.php";

class Connection{
    private $link;
    private $result;

    function __construct($opcion)
    {
        $ip=IP;
        $data_base = DATA_BASE;
        
        if($opcion =='sel')
        {
            $user=USER_SEL;
            $password=PASSWORD_SEL;
        }
        else if($opcion=='all')
        {
            $user=USER_ALL;
            $password=PASSWORD_ALL;
        }
        else
        {
            exit('Falta la opciòn de conexiòn');
        }

        try
        {
            $this->link=new PDO("pgsql:host=$ip;dbname=$data_base",$user,$password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $ex){
            exit($ex->getMessage()."error");
        }
    }

    function query($sql)
    {
        $this->result=$this->link->query($sql) or exit('Consulta mal estructurada');
    }

    function fetchAll()
    {
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }
}
?>