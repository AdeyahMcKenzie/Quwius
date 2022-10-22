<?php
use \PHPUnit\Framework\TestCase;
require 'framework/SessionClass.php';

class SessionClassTest extends TestCase
{
    private $sessionObj;
    

   
    public function setUp(): void{
        $this->sessionObj = new SessionClass();
    
    }
    public function testSessionObjectIsCreated(){
        $this->assertIsObject($this->sessionObj);
        
    }
   
    
    public function testcreate(){
       try{
           $this->sessionObj->create();
       } catch (Exception $e){
           $this->assertTrue( 0," There was an error creating your session");
       }
        
    }

    /**
     * 
     */
    public function testdestroy(){
        try{
            $this->sessionObj->destroy();
        } catch (Exception $e){
            $this->assertTrue( 0," There was an error destroying your session");
        }
       
    }

    /**
     * 
     */
    public function testadd(){
        try{
            $this->sessionObj->add('hello','1234567');
        } catch (Exception $e){
            $this->assertTrue( 0," There was an error adding to your session");
        }
        
        
    }

    /**
     * 
     */
    public function testremove(){

        try{
            $this->sessionObj->remove('hello');
        } catch (Exception $e){
            $this->assertTrue( 0," There was an error removing this user from your session");
        }
        
    }

    /**
     * 
     */
    public function testaccessible(){
        try{
            $this->sessionObj->accessible('hello','mainpage');
        } catch (Exception $e){
            $this->assertTrue( 0," There was an error.");
        }

    }
    
}
