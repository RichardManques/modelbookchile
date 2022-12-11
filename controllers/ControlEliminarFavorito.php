<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlEliminarFavorito{
    public $idModelo;
    public $favorito;

    public function __construct(){
        $this->idModelo = $_POST["bt_delselec"];
        $this->favorito = 0;
    }

    public function editar(){
        session_start();
        $_SESSION["perfil"] = "ON";

        $model = new ModeloModel();
        $modelo = $model->buscarModelo2($this->idModelo);

        $count = $model->eliminarFavorito($this->idModelo, 0);
        $_SESSION["modelo"] = $modelo[0];

        if ($count == 1) {
            $_SESSION["ansInterested"] = "Modelo dejó de interesarte";
        } else {
            $_SESSION["errorEstado"] = "Error en la BD";
        }
        header("Location:../views/agencia/seccionSeleccionados.php");
    }
}

$obj = new ControlEliminarFavorito();
$obj->editar();