<?php
    
    function controllers_autoload($classname){
        include 'controlador/'. $classname . '.php';
    }

    spl_autoload_register('controllers_autoload');
