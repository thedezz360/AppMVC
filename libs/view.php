<?php

class View{

    function __construct()
    {
        
    }

    function render($nombre, $data=[]){
        $this->d = $data;

        require 'views/' . $nombre . '.php';
    }

    

}

?>