<?php
require_once "views/MenuView.php";
class MenuController
{
    function showMenu()
    {
        $Menuview = new MenuView();
        $Menuview->showMenu();
    }
}
?>