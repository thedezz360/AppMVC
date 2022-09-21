<?php
//para rutear las solicitudes
class App{
    function __construct(){
        //validamos que existe una url
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        //borramos el ultimo / de la cadena si lo tiene
        $url = rtrim($url, '/');
        //dividimos la url en donde haya / 
        $url = explode('/',$url);
        //example               user/updatePhoto
        //          0 =controlador     1= metodo    2=argumentos/parametros
        //si no tenemos un controllador especificado
        //cargamos por defecto el controlador login
        if (empty($url[0])){
            //agregamos mensaje 
            //clase::metodo -> mensaje
            error_log('APP::construct-> no hay controlador especificado');
            $archivoController = 'controllers/login.php';
            //llamamos al controlador
            require_once $archivoController;
            //cargamos modelo del controlador
            //osea la clase en este caso la clase login
            $controller= new Login();
            $controller -> loadModel('login');
            //renderizamos la vista
            $controller -> render();
            $prueba='daniel';
            $prueba2='daniel';
            return false;
        }
        //si tenemos un controlador especificado
        $archivoController = 'controllers/' . url[0] . '.php';

        //confirmamos si existe el nombre del archivo
        if (file_exists($archivoController)) {
            require_once $archivoController;
            //cargamos modelo del controlador
            //osea la clase
            $controller = new $url[0];
            $controller -> loadModel($url[0]);

            //comprobamos si existe algun metodo
            if (isset($url[1])) {
                //validamos si este metodo existe dentro de la clase
                if (method_exists($controller, $url[1])) {
                    //validamos si existe un tercer parametro
                    if (isset($url[2])) {
                        // numero de parametros
                        //restamos dos ya que uno seria el controlador, y dos el metodo
                        $nparam = count($url)-2;
                        //arreglo de parametros
                        $params =[];

                        for ($i=0; $i < $nparam ; $i++) { 
                            //recogemos los parametros
                            array_push($params, $url[$i] +2 );
                        }
                        //cargamos el controlador con parametros
                        $controller->{$url[1]($params)};

                    }else {
                        // no tenemos mas parametros, se manda a llamar
                        // el metodo tal cual
                        $controller -> {$url[1]}();
                    }
                }else {
                    // error, no existe metodo
                }
            }else {
                // no tenemos metodo a cargar, cargamos metodo por default
                $controller -> render(); 
            }
        }else {
            //no existe archivo, manda error
        }
        

    }
}

?>