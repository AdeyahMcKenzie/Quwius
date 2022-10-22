<?php 
use \PHPUnit\Framework\TestCase;
require 'framework/View.php';

class ViewTest extends TestCase{

    //view object 
    private $viewObj; 
    
    
    public function setUp(): void{
        $this->viewObj = new View();      
    }

    /**
     * Test that a valid view object is created
     */
    public function testViewObjectIsCreated(): void{
        $this->assertIsObject($this->viewObj);
    }

    /**
     * tests that the setTemplate method acts as expected
     */
    public function testsetTemplate(): void{
        //check for tpl member 
        $this->assertClassHasAttribute('tpl','View',"Sorry, this attribute doesn't exist");
        //$filename="Hello";

        //testing for filename variable
       try{
           $obj= $this->viewObj->setTemplate('index.tpl.php'); 
        }
        catch(InvalidArgumentException $iae){
            
         $this->assertTrue(0,"\n Your parameter was invalid. Please pass a string to this function.");

         
        } catch (Exception $e){
            $this->assertTrue(0, "\n Sorry, the file you have entered does not exist.");
        }
    }

    public function testdisplay(): void{
        //store results of display method
        $store = $this->viewObj->display();
        //checks that display returns a string
        $this->assertIsString($store,"There seems to be a problem returning the string.");
    }

    public function testaddVar(): void{
        try{
            $this->viewObj->addVar('name','');
        }catch (Execption $e){
            $this->assertTrue(0, "\n Sorry, there seems to be an error adding these variables. Please try again.");
        }
    }
    
}
