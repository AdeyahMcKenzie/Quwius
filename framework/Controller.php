<?php 

abstract class Controller{
    private $model = null;
    private $view = null;

    


    public function setModel(Model $m): void{
        if ($m != NULL){
            //$type = new Model();
            if ($m instanceof Model){
                $this->model= $m;
            }else {
                throw new InvalidArgumentException(); 
            }
        } else {
            throw new Exception();
        }    
    }

    public function setView(View $v): void{
        if ($v != NULL){
            
            if ($v instanceof View){
                $this->view = $v;
                
            }else {
                throw new InvalidArgumentException(); 
            }
        } else {
            throw new Exception();
        } 
    }

    abstract public function run();
}