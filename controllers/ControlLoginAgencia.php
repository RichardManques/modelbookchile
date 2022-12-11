<?php

namespace controllers;

require_once("../models/UsuarioModel.php");

use models\UsuarioModel as UsuarioModel;

class ControlLoginAgencia{
    public $email;
    public $password;

    public function __construct(){
        $this->email = $_POST['email'];
        $this->password = $_POST['clave'];
    }
    
    public function iniciarSesionAgencia(){
        session_start();
        if($this->email=="" || $this->password==""){
            $_SESSION['errorLoginAdmin']="Complete los campos";
            header("Location:../views/loginAgencia.php");
            return;
        }
        $modelo = new UsuarioModel();
        $array = $modelo->iniciarSesionAgencia($this->email,$this->password);
        
        if(count($array)==0){
            $_SESSION['errorLoginAdmin']="Datos incorrectos, intente nuevamente";
            header("Location:../views/loginAgencia");
            return;
        }
        
        $_SESSION['agencia']=$array[0];
        header("Location:../views/agencia/inicioAgencia.php");

    }
}
$obj = new ControlLoginAgencia();
$obj->iniciarSesionAgencia();