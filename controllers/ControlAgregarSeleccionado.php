<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlAgregarFavorito{
    public $idModelo;

    public $favorito;

    public function __construct(){
        $this->idModelo = $_POST["bt_seleccionado"];

        $this->favorito = 1;
    }

    public function editar(){
        session_start();
        $_SESSION["agencia"] = "ON";

        $model = new ModeloModel();
        $modelo = $model->buscarModelo2($this->idModelo);



        $count = $model->agregarFavorito($this->idModelo, 1);
        $_SESSION["modelo"] = $modelo[0];

        if ($count == 1) {
            $_SESSION["respuestaEstado"] = "Estado Actualizado";
        } else {
            $_SESSION["errorEstado"] = "Error en la BD";
        }
        header("Location:../views/agencia/perfilModeloAgencia.php");
    }
}

$obj = new ControlAgregarFavorito();
$obj->editar();