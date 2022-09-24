<?php 
    class Controller{
        function __construct(){
            //con este controlador vamos a cargar el modelo y la vista 
            //que necesitemos presentar
            //controlador base del cual todos los controladores hererdaran

            $this->view = new View();
        }
        function loadModel($model){
            //se encargara de cargar el archivo del modelo del controlador
            //asociado
            //primero creamos la url
            $url = 'models/' . $model . 'model.php';
            //validamos que exista el archivo
            if (file_exists($url)) {
                //si existe llamamos el archivo he inicializamos un nuevo objeto
                require_once $url;

                $modelName = $model.'Model';
                //creamos una variable model con el nombre del modelo
                $this->model = new $modelName();
            }
        }
    }
?>