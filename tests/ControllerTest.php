<?php 
use \PHPUnit\Framework\TestCase;
require 'framework/Controller.php';
require 'framework/Model.php';
require 'framework/View.php';

 class ControllerTest extends TestCase{

    private $controllerObj;
    private $m ;
    private $v;

    public function setUp(): void{
        $this->controllerObj = $this->getMockForAbstractClass('Controller');;      
        $this->m = $this->
        getMockForAbstractClass('Model');
        $this->v = new View();

        $mtype = gettype($this->m);
        $vtype = gettype($this->v);
        echo "\n v is of type ". $vtype;
        echo "\n m is of type ". $mtype;
    }

    public function testControllerObjectIsCreated(): void{
        $this->assertIsObject($this->controllerObj);
    }

    public function testClassAttributes(){
        //check for model member 
        $this->assertClassHasAttribute('model','Controller',"Sorry, this attribute doesn't exist");
        $this->assertClassHasAttribute('view','Controller',"Sorry, this attribute doesn't exist");
    }

    public function testsetModel(){
        //parameter testing
        try{
         
            $this->controllerObj->setModel($this->m);
        } catch (InvalidArgumentException $iae){
            $this->assertTrue(0,"\n Your parameter was invalid. Please pass an object of type model to this function.");
        }
        

    }

    public function testsetView(){
        //parameter testing
        try {
            $this->controllerObj->setView($this->v);
        } catch (InvalidArgumentException $iae){
            $this->assertTrue(0,"\n Your parameter was invalid. Please pass an object of type view to this method");
        }

    }

   

}