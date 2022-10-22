<?php
//handles files autoatically
spl_autoload_register(function($class_name){    
    if(file_exists('app/Controllers/' . $class_name . '.php')){
        require 'app/Controllers/' . $class_name . '.php';
    }
    else if(file_exists('app/Mods/' . $class_name . '.php')){
        require 'app/Mods/' . $class_name . '.php';
    }
    else if(file_exists('framework/' . $class_name . '.php')){
        require 'framework/' . $class_name . '.php';
    }
    else{
        trigger_error('Cannot find classes/interface/abstract class: ' . $class_name, E_USER_WARNING);
        debug_print_backtrace();
    }
});


//directories
const ROOT_DIR = '/Applications/XAMPP/xamppfiles/htdocs/Framework1';
const TEMPLATE_DIR = ROOT_DIR . '/tpl';

