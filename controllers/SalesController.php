<?php
require_once "views/SalesView.php";
require_once "models/SalesModel.php";
class SalesController
{
    private $salesView;

    function __construct()
    {
        $this->salesView = new SalesView();
    }

    function showPrdoductSale()
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);

        $product = $salesModel->showProductSale();
        if (!$product) {
            $response = ["message" => 'PRODUCTOS PARA LA VENTA NO DISPONOBLES'];
            exit(json_encode($response));
        }

        $this->salesView->showPrdoductSale($product);

    }
}
?>