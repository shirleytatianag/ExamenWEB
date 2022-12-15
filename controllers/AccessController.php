<?php
require_once "models/AccessModel.php";
require_once "views/AccessView.php";

define('METHOD','AES-256-CBC');
define('SECRET_KEY','$CARLOS@2016');
define('SECRET_IV','101712');

class AccessController
{
    function validateUser()
    {
        $AccessView = new AccessView();
        $AccessView->showFormSession();
    }

    function validateFromSession()
    {
        $Conexion = new Connection('sel');

        $user = $_POST['usuario'];
        $password = $_POST['password'];

        $password1 = $this->encryption($password);

        if(empty($user)){exit("!! DEBE INGRESAR EL USUARIO ¡¡");}
        if(empty($password)){exit("!! DEBE INGRESAR UNA CONTRASEÑA ¡¡");}

        $AccessModel = new AccessModel($Conexion);
        $array_access = $AccessModel->validateFormSession($user,$password1);

        if($array_access){
            $_SESSION['cod_usuario'] = $array_access[0]->cod_usuario;
            $_SESSION['usuario'] = $array_access[0]->usuario;
            $_SESSION['auth'] = 'OK';
            $response['message']="USUARIO LOGEADO CORRECTAMENTE";
            exit(json_encode($response));
        }
        

    }

    function closeSession()
    {
        $response=array();

        session_unset();
        session_destroy();
        $_SESSION = array();

        $response['message']="Cerrando Session";
        exit(json_encode($response));
    }

    function encryption($string){
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }
    function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }
}
