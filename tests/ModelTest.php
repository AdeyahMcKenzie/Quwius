<?php 
use \PHPUnit\Framework\TestCase;
require 'framework/Model.php';

class ModelTest extends TestCase{
    
    private $modelObj;

    public function setUp(): void{
        $this->modelObj= $this->getMockForAbstractClass('Model');    
    }
    
    /**
     * Ensure a valid model object is created
     */
    public function testModelObjectIsCreated(): void{

        $this->assertIsObject($this->modelObj);
    }

    public function testFileExists(): void{
        $this->assertFileExists('./data/courses.json');
    }

    /**
     * Tests that the getAll function actually returns a multidimensional array
     */
    public function testgetAll(): void{
       
        $arr = $this->modelObj->getAll();
        //check if getall() returns array
        $this->assertIsArray($arr,"Sorry, no array returned!");
    }

    public function testgetRecord(): void{
       
        //assert if array returned
        $check = $this->modelObj->getRecord('1');
        $this->assertIsArray($check); 
        //check if returned record matches record requested
        $this->assertSame($check['course_id'],'1');
        //this should fail because it is not the same therefore catch with exception so program does not crash
        try{
            $this->assertSame($check['course_id'],'10');
        }catch (Exception $e){
           echo "\n Sorry, these numbers do not match.";
        }

        //test for invalid parameters

        
       
    }
}