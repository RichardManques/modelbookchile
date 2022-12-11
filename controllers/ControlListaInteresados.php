<?php
//archivo q tomara todas las tareas de la base de datos y las transformara a formato JSON para asi poder ocuparlo

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;


class modelListInteresados{
    public function getAllModelosInteresados(){
        $model = new ModeloModel();
        echo json_encode($model->getAllModelosFavoritos());  //transformar el arreglo asociativo a formato JSON
    }
}



$obj = new modelListInteresados();
$obj->getAllModelosInteresados();